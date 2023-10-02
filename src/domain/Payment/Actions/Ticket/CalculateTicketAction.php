<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Account\Models\User;
use Domain\Payment\DataTransferObjects\TicketData;
use Domain\Payment\Enums\Ticket\TicketLimit;
use Domain\Payment\Models\Ticket;

final class CalculateTicketAction
{
    /**
     * @param User $user
     * @return Ticket
     */
    public static function execute(User $user): Ticket
    {
        $ticketData = TicketData::from([
            'id' => $user->ticket->id,
            'user_id' => $user->id,
            'limit' => ($user->ticket->limit) - (TicketLimit::DEFAULT->value),
        ]);
        $ticket = UpsertTicketAction::execute($ticketData);

        return $ticket;
    }
}
