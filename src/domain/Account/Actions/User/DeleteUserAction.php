<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Models\User;

final class DeleteUserAction
{
    /**
     * @return void
     */
    public static function execute(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->delete();
    }
}
