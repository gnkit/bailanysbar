<?php

namespace Domain\Account\Actions\User;

use Domain\Account\DataTransferObjects\UserData;
use Domain\Account\Models\Role;
use Domain\Account\Models\User;

final class UpsertUserAction
{
    /**
     * @param UserData $data
     * @return User
     */
    public static function execute(UserData $data): User
    {
//        dd($data);
        $user = User::updateOrCreate(
            [
                'id' => $data->id
            ],
            [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'status' => $data->status,
                'role_id' => $data->role_id ?? Role::where('slug', 'customer')->first()
            ],
        );

        return $user;
    }
}
