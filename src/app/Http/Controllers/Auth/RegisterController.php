<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Domain\Account\Actions\Role\GetBySlugRoleAction;
use Domain\Account\Actions\User\UpsertUserAction;
use Domain\Account\DataTransferObjects\UserData;
use Domain\Account\Enums\User\UserStatus;
use Domain\Account\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
            'status' => ['string', new Enum(UserStatus::class)],
            'role_id' => ['integer'],
            'g-recaptcha-response' => ['required', function (string $attribute, mixed $value, \Closure $fail) {
                $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);
                if (! $response->json('success')) {
                    $fail("The {$attribute} is invalid");
                }
            }],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \Domain\Account\Models\User
     */
    protected function create(array $data)
    {
        $role = GetBySlugRoleAction::execute('customer');

        $userData = UserData::from([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => UserStatus::ACTIVE,
            'role_id' => $role->id,
        ]);

        return UpsertUserAction::execute($userData);
    }
}
