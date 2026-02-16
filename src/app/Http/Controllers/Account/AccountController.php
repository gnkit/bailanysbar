<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\User\DeleteUserAction;
use Domain\Account\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    public function dashboard(): View
    {
        return view('pages.account.dashboard.index');
    }

    public function settings(): View
    {
        $account = auth()->user();

        return view('pages.account.settings.index', compact('account'));
    }

    public function destroy(User $user): RedirectResponse
    {
        DeleteUserAction::execute($user);

        return redirect()->route('home')->with('success', __('messages.deleted_successfully'));
    }
}
