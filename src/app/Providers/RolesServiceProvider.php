<?php

namespace App\Providers;

use Domain\Account\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('role', function (string $role): bool {
            /** @var User|null $user */
            $user = auth()->user();

            return $user !== null && $user->hasRole($role);
        });
    }
}
