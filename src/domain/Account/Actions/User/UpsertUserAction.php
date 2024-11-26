<?php

namespace Domain\Account\Actions\User;

use Domain\Account\DataTransferObjects\UserData;
use Domain\Account\Models\User;
use Domain\Payment\Actions\Ticket\SetDefaultLimitTicketAction;

final class UpsertUserAction
{
    public static function execute(UserData $data): User
    {
        $user = User::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'status' => $data->status,
                'role_id' => $data->role_id,
            ],
        );

        SetDefaultLimitTicketAction::execute($user);

        return $user;
    }
}
