<?php

namespace Domain\Account\Actions\Permission;

use Domain\Account\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

final class GetAllPermissionsAction
{
    /**
     * @return Collection<int, Permission>
     */
    public static function execute(): Collection
    {
        /** @var Collection<int, Permission> $permissions */
        $permissions = Permission::select('id', 'name')
            ->orderByDesc('created_at')
            ->get();

        return $permissions;
    }
}
