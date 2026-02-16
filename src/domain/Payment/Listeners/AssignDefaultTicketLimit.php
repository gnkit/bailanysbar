<?php

namespace Domain\Payment\Listeners;

use Domain\Account\Models\User;
use Domain\Payment\Actions\Ticket\UpsertTicketAction;
use Domain\Payment\DataTransferObjects\TicketData;
use Domain\Payment\Enums\Ticket\TicketLimit;
use Illuminate\Auth\Events\Registered;

class AssignDefaultTicketLimit
{
    public function handle(Registered $event): void
    {
        /** @var User $user */
        $user = $event->user;
        $ticketData = TicketData::from([
            'user_id' => $user->id,
            'limit' => TicketLimit::DEFAULT->value,
        ]);

        UpsertTicketAction::execute($ticketData);
    }
}
