<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\DataTransferObjects\TicketData;
use Domain\Payment\Models\Ticket;

final class UpsertTicketAction
{
    /**
     * @param TicketData $data
     * @return Ticket
     */
    public static function execute(TicketData $data): Ticket
    {
        $ticket = Ticket::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'user_id' => $data->user_id,
                'limit' => $data->limit,
            ],
        );

        return $ticket;
    }
}
