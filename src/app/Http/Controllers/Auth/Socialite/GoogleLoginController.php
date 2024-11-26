<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Domain\Account\Actions\Role\GetBySlugRoleAction;
use Domain\Account\Enums\User\UserStatus;
use Domain\Account\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->email)->first();
        if (! $user) {
            $role = GetBySlugRoleAction::execute('customer');
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make(rand(100000, 999999)),
                'status' => UserStatus::ACTIVE,
                'role_id' => $role->id,
            ]);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
