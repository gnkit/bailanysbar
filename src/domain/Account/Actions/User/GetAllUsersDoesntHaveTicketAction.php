<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class GetAllUsersDoesntHaveTicketAction
{
    /**
     * @return Collection<int, User>
     */
    public static function execute(): Collection
    {
        /** @var Collection<int, User> $users */
        $users = User::doesntHave('ticket')
            ->orderByDesc('created_at')
            ->get();

        return $users;
    }
}
