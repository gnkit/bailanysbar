<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\Models\Ticket;

final class GetByUserIdTicketAction
{
    /**
     * @param $userId
     * @return Ticket
     */
    public static function execute($userId): Ticket
    {
        $ticket = Ticket::where('user_id', '=', $userId)->first();

        return $ticket;
    }
}
