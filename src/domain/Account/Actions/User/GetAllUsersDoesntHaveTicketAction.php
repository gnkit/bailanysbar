<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class GetAllUsersDoesntHaveTicketAction
{
    /**
     * @return Collection
     */
    public static function execute(): Collection
    {
        $users = User::doesntHave('ticket')
            ->orderByDesc('created_at')
            ->get();

        return $users;
    }
}
