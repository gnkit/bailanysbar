<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Actions\Role\GetBySlugRoleAction;
use Domain\Account\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class GetByRoleIdUserCollectionAction
{
    /**
     * @return Collection<int, User>
     */
    public static function execute(): Collection
    {
        $role = GetBySlugRoleAction::execute('manager');

        /** @var Collection<int, User> $users */
        $users = User::where('role_id', $role->id)->get();

        return $users;
    }
}
