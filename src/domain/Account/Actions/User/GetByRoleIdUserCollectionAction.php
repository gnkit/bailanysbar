<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Actions\Role\GetBySlugRoleAction;
use Domain\Account\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class GetByRoleIdUserCollectionAction
{
    /**
     * @return Collection
     */
    public static function execute(): Collection
    {
        $role = GetBySlugRoleAction::execute('manager');
        $users = User::where('role_id', $role->id)->get();

        return $users;
    }
}
