<?php

namespace Domain\Payment\Actions\Ticket;

use Domain\Payment\Models\Ticket;
use Illuminate\Contracts\Pagination\Paginator;

final class GetAllTicketsPaginationAction
{
    public static function execute($quantity): Paginator
    {
        $tickets = Ticket::with('user')
            ->select('id', 'user_id', 'limit', 'created_at', 'updated_at')
            ->orderByDesc('updated_at')
            ->simplePaginate($quantity);

        return $tickets;
    }
}
