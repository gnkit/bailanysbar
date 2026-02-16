<?php

namespace App\Http\Controllers\Account\Role;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\Permission\GetAllPermissionsAction;
use Domain\Account\Actions\Role\DeleteRoleAction;
use Domain\Account\Actions\Role\GetAllRolesAction;
use Domain\Account\Actions\Role\UpsertRoleAction;
use Domain\Account\DataTransferObjects\RoleData;
use Domain\Account\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    public function index(): View
    {
        $rows = 10;

        $roles = GetAllRolesAction::execute();

        return view('pages.role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    public function create(): View
    {
        $permissions = GetAllPermissionsAction::execute();

        return view('pages.role.create', compact('permissions'));
    }

    public function store(RoleData $data): RedirectResponse
    {
        UpsertRoleAction::execute($data);

        return redirect()->route('roles.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    public function edit(Role $role): View
    {
        $permissions = GetAllPermissionsAction::execute();

        return view('pages.role.edit', compact('permissions', 'role'));
    }

    public function update(RoleData $data): RedirectResponse
    {
        UpsertRoleAction::execute($data);

        return redirect()->route('roles.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    public function destroy(Role $role): RedirectResponse
    {
        DeleteRoleAction::execute($role);

        return redirect()->route('roles.index')->with('success', __('messages.deleted_successfully'));
    }
}
