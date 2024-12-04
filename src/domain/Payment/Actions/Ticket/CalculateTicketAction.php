<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Account\Models\User;
use Domain\Link\Actions\Contact\GetAllContactsByUserIdAction;

final class CalculateTicketAction
{
    public static function execute(User $user): bool
    {
        if (! $user->isManager()) {

            $ticket = GetByUserIdTicketAction::execute(auth()->user()->id);
            $contact = GetAllContactsByUserIdAction::execute(auth()->user());

            return ($ticket->limit > 0 && ($ticket->limit > $contact->count())) ?? false;
        } else {

            return true;
        }
    }
}
