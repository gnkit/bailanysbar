<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Domain\Account\Actions\Role\GetBySlugRoleAction;
use Domain\Account\Actions\User\UpsertUserAction;
use Domain\Account\DataTransferObjects\UserData;
use Domain\Account\Enums\User\UserStatus;
use Domain\Account\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle(): RedirectResponse
    {
        /** @var AbstractProvider $driver */
        $driver = Socialite::driver('google');

        return $driver->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        /** @var AbstractProvider $driver */
        $driver = Socialite::driver('google');
        $googleUser = $driver->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (! $user) {
            $role = GetBySlugRoleAction::execute('customer');

            $userData = UserData::from([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => Hash::make((string) rand(100000, 999999)),
                'status' => UserStatus::ACTIVE,
                'role_id' => $role->id,
            ]);

            $user = UpsertUserAction::execute($userData);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
