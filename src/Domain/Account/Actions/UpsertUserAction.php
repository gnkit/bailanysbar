<?php

namespace Domain\Account\Actions;

use Domain\Account\DataTransferObjects\UserData;
use Domain\Account\Models\Role;
use Domain\Account\Models\User;


class UpsertUserAction
{
    public static function execute(UserData $data, Role $role): User
    {
        $user = User::updateOrCreate(
            ['id' => $data->id],
            [
                ...$data->all(),
                'role_id' => $role->id,
            ],
        );

        return $user;
    }
}
