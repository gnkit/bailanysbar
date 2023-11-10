<?php

namespace App\Http\Controllers\Account\Permission;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\Permission\DeletePermissionAction;
use Domain\Account\Actions\Permission\GetAllPermissionsAction;
use Domain\Account\Actions\Permission\UpsertPermissionAction;
use Domain\Account\DataTransferObjects\PermissionData;
use Domain\Account\Models\Permission;

class PermissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 10;

        $permissions = GetAllPermissionsAction::execute($rows);

        return view('pages.permission.index', compact('permissions'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.permission.create');
    }

    /**
     * @param PermissionData $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionData $data)
    {
        UpsertPermissionAction::execute($data);

        return redirect()->route('permissions.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Permission $permission)
    {
        return view('pages.permission.edit', compact('permission'));
    }

    /**
     * @param PermissionData $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionData $data)
    {
        UpsertPermissionAction::execute($data);

        return redirect()->route('permissions.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        DeletePermissionAction::execute($permission);

        return redirect()->route('permissions.index')->with('success', __('messages.deleted_successfully'));
    }
}
