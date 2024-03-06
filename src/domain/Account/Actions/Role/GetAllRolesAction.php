<?php

namespace Domain\Account\Actions\Role;

use Domain\Account\Models\Role;
use Illuminate\Database\Eloquent\Collection;

final class GetAllRolesAction
{
    public static function execute(): Collection
    {
        $roles = Role::with('permissions')->select('id', 'name')
            ->orderByDesc('created_at')
            ->get();

        return $roles;
    }
}
