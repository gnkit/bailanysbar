<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Account\Models\User;
use Domain\Link\Actions\Contact\GetAllContactsByUserIdAction;

final class CalculateTicketAction
{
    public static function execute(User $user): bool
    {
        if ($user->isManager()) {
            return true;
        }

        $ticket = GetByUserIdTicketAction::execute($user->id);
        $contacts = GetAllContactsByUserIdAction::execute($user);

        if ($ticket === null) {
            return false;
        }

        return $ticket->limit > 0 && $ticket->limit > $contacts->count();
    }
}
