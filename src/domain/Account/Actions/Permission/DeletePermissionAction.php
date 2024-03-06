<?php

namespace Domain\Account\Actions\Permission;

use Domain\Account\Models\Permission;

final class DeletePermissionAction
{
    /**
     * @return void
     */
    public static function execute(Permission $permission)
    {
        if ($permission->roles()->count() > 0) {
            $permission->roles()->detach();
        }
        $permission->delete();
    }
}
