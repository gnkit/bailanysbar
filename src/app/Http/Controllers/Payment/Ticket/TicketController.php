<?php

namespace App\Http\Controllers\Payment\Ticket;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\User\GetAllUsersDoesntHaveTicketAction;
use Domain\Payment\Actions\Ticket\DeleteTicketAction;
use Domain\Payment\Actions\Ticket\GetAllTicketsPaginationAction;
use Domain\Payment\Actions\Ticket\UpsertTicketAction;
use Domain\Payment\DataTransferObjects\TicketData;
use Domain\Payment\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TicketController extends Controller
{
    public function index(): View
    {
        $rows = 10;

        $tickets = GetAllTicketsPaginationAction::execute($rows);

        return view('pages.ticket.index', compact('tickets'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    public function create(): View
    {
        $users = GetAllUsersDoesntHaveTicketAction::execute();

        return view('pages.ticket.create', compact('users'));
    }

    public function store(TicketData $ticketData): RedirectResponse
    {
        UpsertTicketAction::execute($ticketData);

        return redirect()->route('tickets.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    public function edit(Ticket $ticket): View
    {
        return view('pages.ticket.edit', compact('ticket'));
    }

    public function update(TicketData $ticketData): RedirectResponse
    {
        UpsertTicketAction::execute($ticketData);

        return redirect()->route('tickets.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    public function destroy(Ticket $ticket): RedirectResponse
    {
        DeleteTicketAction::execute($ticket);

        return redirect()->route('tickets.index')->with('success', __('messages.deleted_successfully'));
    }
}
