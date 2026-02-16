<?php

namespace App\Http\Controllers\Account\Permission;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\Permission\DeletePermissionAction;
use Domain\Account\Actions\Permission\GetAllPermissionsAction;
use Domain\Account\Actions\Permission\UpsertPermissionAction;
use Domain\Account\DataTransferObjects\PermissionData;
use Domain\Account\Models\Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    public function index(): View
    {
        $rows = 10;
        $permissions = GetAllPermissionsAction::execute();

        return view('pages.permission.index', compact('permissions'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    public function create(): View
    {
        return view('pages.permission.create');
    }

    public function store(PermissionData $data): RedirectResponse
    {
        UpsertPermissionAction::execute($data);

        return redirect()->route('permissions.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    public function edit(Permission $permission): View
    {
        return view('pages.permission.edit', compact('permission'));
    }

    public function update(PermissionData $data): RedirectResponse
    {
        UpsertPermissionAction::execute($data);

        return redirect()->route('permissions.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        DeletePermissionAction::execute($permission);

        return redirect()->route('permissions.index')->with('success', __('messages.deleted_successfully'));
    }
}
