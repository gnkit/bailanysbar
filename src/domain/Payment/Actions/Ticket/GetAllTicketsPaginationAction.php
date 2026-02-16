<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\Models\Ticket;
use Illuminate\Contracts\Pagination\Paginator;

final class GetAllTicketsPaginationAction
{
    /** @return Paginator<int, Ticket> */
    public static function execute(int $quantity): Paginator
    {
        /** @var Paginator<int, Ticket> $tickets */
        $tickets = Ticket::with('user')
            ->select('id', 'user_id', 'limit', 'created_at', 'updated_at')
            ->orderByDesc('updated_at')
            ->simplePaginate($quantity);

        return $tickets;
    }
}
