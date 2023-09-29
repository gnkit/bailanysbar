<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\Models\Ticket;
use Illuminate\Pagination\Paginator;

final class GetAllTicketsPaginationAction
{
    /**
     * @param $quantity
     * @return Paginator
     */
    public static function execute($quantity): Paginator
    {
        $tickets = Ticket::select('id', 'user_id', 'limit', 'created_at', 'updated_at')
            ->orderByDesc('updated_at')
            ->simplePaginate($quantity);

        return $tickets;
    }
}
