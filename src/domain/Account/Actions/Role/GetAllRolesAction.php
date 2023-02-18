<?php

namespace domain\Account\Actions\Role;

use Domain\Account\Models\Role;
use Illuminate\Database\Eloquent\Collection;

final class GetAllRolesAction
{
    /**
     * @return Collection
     */
    public static function execute(): Collection
    {
        $roles = Role::select('id', 'name')
            ->orderByDesc('created_at')
            ->get();

        return $roles;
    }
}
