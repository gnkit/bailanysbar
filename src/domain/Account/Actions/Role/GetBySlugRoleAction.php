<?php

namespace Domain\Account\Actions\Role;

use Domain\Account\Models\Role;

final class GetBySlugRoleAction
{
    /**
     * @param string $slug
     * @return Role
     */
    public static function execute(string $slug): Role
    {
        $role = Role::where('slug', '=', $slug)->first();

        return $role;
    }
}
