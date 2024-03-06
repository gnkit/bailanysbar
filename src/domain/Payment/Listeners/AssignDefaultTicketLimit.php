<?php

namespace Domain\Payment\Listeners;

use Domain\Payment\Actions\Ticket\UpsertTicketAction;
use Domain\Payment\DataTransferObjects\TicketData;
use Domain\Payment\Enums\Ticket\TicketLimit;
use Illuminate\Auth\Events\Registered;

class AssignDefaultTicketLimit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @return void
     */
    public function handle(Registered $event)
    {
        $ticketData = TicketData::from([
            'user_id' => $event->user->id,
            'limit' => TicketLimit::DEFAULT->value,
        ]);

        UpsertTicketAction::execute($ticketData);
    }
}
