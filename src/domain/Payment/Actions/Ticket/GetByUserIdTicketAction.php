<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\Models\Ticket;

final class GetByUserIdTicketAction
{
    public static function execute($userId): Ticket
    {
        $ticket = Ticket::where('user_id', '=', $userId)->first();

        return $ticket;
    }
}
