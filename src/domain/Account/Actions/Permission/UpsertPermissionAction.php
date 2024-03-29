<?php

namespace Domain\Account\Actions\Permission;

use Domain\Account\DataTransferObjects\PermissionData;
use Domain\Account\Models\Permission;
use Illuminate\Support\Str;

final class UpsertPermissionAction
{
    public static function execute(PermissionData $data): Permission
    {
        $permission = Permission::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
                'slug' => Str::slug($data->name),
            ],
        );

        return $permission;
    }
}
