<?php

namespace Domain\Account\Actions\Role;

use Domain\Account\Models\Role;

final class DeleteRoleAction
{
    /**
     * @param Role $role
     * @return void
     */
    public static function execute(Role $role)
    {
        if (0 < $role->permissions()->count()) {
            $role->permissions()->detach();
        }

        $role->delete();
    }
}
