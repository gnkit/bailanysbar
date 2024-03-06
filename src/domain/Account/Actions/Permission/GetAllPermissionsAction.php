<?php

namespace Domain\Account\Actions\Permission;

use Domain\Account\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

final class GetAllPermissionsAction
{
    public static function execute(): Collection
    {
        $permissions = Permission::select('id', 'name')
            ->orderByDesc('created_at')
            ->get();

        return $permissions;
    }
}
