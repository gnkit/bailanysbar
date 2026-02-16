<?php

namespace App\Http\Middleware\Role;

use Closure;
use Domain\Account\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response|RedirectResponse
    {
        /** @var User|null $user */
        $user = auth()->user();

        if ($user === null || ! $user->hasRole($role)) {
            abort(404);
        }

        return $next($request);
    }
}
