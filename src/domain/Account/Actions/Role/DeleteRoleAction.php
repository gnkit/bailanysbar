<?php

namespace Domain\Account\Actions\Role;

use Domain\Account\Models\Role;

final class DeleteRoleAction
{
    /**
     * @return void
     */
    public static function execute(Role $role)
    {
        if ($role->permissions()->count() > 0) {
            $role->permissions()->detach();
        }

        $role->delete();
    }
}
