<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\Models\Ticket;

final class DeleteTicketAction
{
    /**
     * @return void
     */
    public static function execute(Ticket $ticket)
    {
        $ticket = Ticket::findOrFail($ticket->id);
        $ticket->delete();
    }
}
