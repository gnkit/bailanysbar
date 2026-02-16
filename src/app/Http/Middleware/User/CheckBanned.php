<?php

namespace App\Http\Middleware\User;

use Closure;
use Domain\Account\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckBanned
{
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        /** @var User|null $user */
        $user = auth()->user();

        if ($user !== null && ($user->isBanned())) {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', __('messages.check_user_ban'));
        }

        return $next($request);
    }
}
