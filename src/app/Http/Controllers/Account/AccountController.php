<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\User\DeleteUserAction;
use Domain\Account\Models\User;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        return view('pages.account.dashboard.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function settings()
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
