<?php

namespace Domain\Account\Actions\Permission;

use Domain\Account\Models\Permission;

final class DeletePermissionAction
{
    /**
     * @param Permission $permission
     * @return void
     */
    public static function execute(Permission $permission)
    {
        if (0 < $permission->roles()->count()) {
            $permission->roles()->detach();
        }
        $permission->delete();
    }
}
