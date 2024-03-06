<?php

namespace Domain\Account\Actions\Role;

use Domain\Account\DataTransferObjects\RoleData;
use Domain\Account\Models\Permission;
use Domain\Account\Models\Role;
use Illuminate\Support\Str;

final class UpsertRoleAction
{
    public static function execute(RoleData $data): Role
    {
        $role = Role::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
                'slug' => Str::slug($data->name),
            ],
        );

        if ($data->permissions !== null) {
            $permissions = Permission::findOrFail($data->permissions);
            $role->permissions()->sync($permissions);
        }

        return $role;
    }
}
