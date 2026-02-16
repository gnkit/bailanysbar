<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\Role\GetAllRolesAction;
use Domain\Account\Actions\User\DeleteUserAction;
use Domain\Account\Actions\User\GetAllUsersPaginationAction;
use Domain\Account\Actions\User\UpsertUserAction;
use Domain\Account\DataTransferObjects\UserData;
use Domain\Account\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $rows = 10;

        $users = GetAllUsersPaginationAction::execute($rows);

        return view('pages.user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    public function create(): View
    {
        $roles = GetAllRolesAction::execute();

        return view('pages.user.create', compact('roles'));
    }

    public function store(UserData $userData): RedirectResponse
    {
        UpsertUserAction::execute($userData);

        return redirect()->route('users.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    public function show(User $user): View
    {
        $roles = GetAllRolesAction::execute();

        return view('pages.user.show', compact('roles', 'user'));
    }

    public function edit(User $user): View
    {
        $roles = GetAllRolesAction::execute();

        return view('pages.user.edit', compact('roles', 'user'));
    }

    public function update(UserData $data): RedirectResponse
    {
        UpsertUserAction::execute($data);

        return redirect()->route('users.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    public function destroy(User $user): RedirectResponse
    {
        DeleteUserAction::execute($user);

        return redirect()->route('users.index')->with('success', __('messages.deleted_successfully'));
    }
}
