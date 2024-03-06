<?php

namespace Domain\Account\Actions\Role;

use Domain\Account\Models\Role;

final class GetBySlugRoleAction
{
    public static function execute(string $slug): Role
    {
        $role = Role::where('slug', '=', $slug)->first();

        return $role;
    }
}
