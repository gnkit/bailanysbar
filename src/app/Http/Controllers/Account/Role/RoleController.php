<?php

namespace App\Http\Controllers\Account\Role;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\Permission\GetAllPermissionsAction;
use Domain\Account\Actions\Role\DeleteRoleAction;
use Domain\Account\Actions\Role\GetAllRolesAction;
use Domain\Account\Actions\Role\UpsertRoleAction;
use Domain\Account\DataTransferObjects\RoleData;
use Domain\Account\Models\Role;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 10;

        $roles = GetAllRolesAction::execute($rows);

        return view('pages.role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $permissions = GetAllPermissionsAction::execute();

        return view('pages.role.create', compact('permissions'));
    }

    /**
     * @param RoleData $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleData $data)
    {
        UpsertRoleAction::execute($data);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.')->withInput();
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Role $role)
    {
        $permissions = GetAllPermissionsAction::execute();

        return view('pages.role.edit', compact('permissions', 'role'));
    }

    /**
     * @param RoleData $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleData $data)
    {
        UpsertRoleAction::execute($data);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.')->withInput();
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        DeleteRoleAction::execute($role);

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
