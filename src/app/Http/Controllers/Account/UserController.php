<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\Role\GetAllRolesAction;
use Domain\Account\Actions\User\DeleteUserAction;
use Domain\Account\Actions\User\GetAllUsersPaginationAction;
use Domain\Account\Actions\User\UpsertUserAction;
use Domain\Account\DataTransferObjects\UserData;
use Domain\Account\Models\User;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 10;

        $users = GetAllUsersPaginationAction::execute($rows);

        return view('pages.user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = GetAllRolesAction::execute();

        return view('pages.user.create', compact('roles'));
    }

    /**
     * @param UserData $userData
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserData $userData)
    {
        UpsertUserAction::execute($userData);

        return redirect()->route('users.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        $roles = GetAllRolesAction::execute();

        return view('pages.user.show', compact('roles', 'user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $roles = GetAllRolesAction::execute();

        return view('pages.user.edit', compact('roles', 'user'));
    }

    /**
     * @param UserData $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserData $data)
    {
        UpsertUserAction::execute($data);

        return redirect()->route('users.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        DeleteUserAction::execute($user);

        return redirect()->route('users.index')->with('success', __('messages.deleted_successfully'));
    }
}
