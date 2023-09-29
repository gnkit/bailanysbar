<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\Models\Ticket;

final class DeleteTicketAction
{
    /**
     * @param Ticket $ticket
     * @return void
     */
    public static function execute(Ticket $ticket)
    {
        $ticket = Ticket::findOrFail($ticket->id);
        $ticket->delete();
    }
}
