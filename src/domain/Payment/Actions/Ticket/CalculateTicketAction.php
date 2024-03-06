<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Account\Models\User;
use Domain\Payment\DataTransferObjects\TicketData;
use Domain\Payment\Enums\Ticket\TicketLimit;
use Domain\Payment\Models\Ticket;

final class CalculateTicketAction
{
    public static function execute(User $user): Ticket
    {
        if (\auth()->user()->isManager()) {
            $ticketValue = 0;
        } else {
            $ticketValue = TicketLimit::DEFAULT->value;
        }
        $ticketData = TicketData::from([
            'id' => $user->ticket->id,
            'user_id' => $user->id,
            'limit' => ($user->ticket->limit) - $ticketValue,
        ]);
        $ticket = UpsertTicketAction::execute($ticketData);

        return $ticket;
    }
}
