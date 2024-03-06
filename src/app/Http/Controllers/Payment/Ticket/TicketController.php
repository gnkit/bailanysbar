<?php

namespace App\Http\Controllers\Payment\Ticket;

use App\Http\Controllers\Controller;
use Domain\Account\Actions\User\GetAllUsersDoesntHaveTicketAction;
use Domain\Payment\Actions\Ticket\DeleteTicketAction;
use Domain\Payment\Actions\Ticket\GetAllTicketsPaginationAction;
use Domain\Payment\Actions\Ticket\UpsertTicketAction;
use Domain\Payment\DataTransferObjects\TicketData;
use Domain\Payment\Models\Ticket;

class TicketController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 10;

        $tickets = GetAllTicketsPaginationAction::execute($rows);

        return view('pages.ticket.index', compact('tickets'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users = GetAllUsersDoesntHaveTicketAction::execute();

        return view('pages.ticket.create', compact('users'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketData $ticketData)
    {
        UpsertTicketAction::execute($ticketData);

        return redirect()->route('tickets.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Ticket $ticket)
    {
        return view('pages.ticket.edit', compact('ticket'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TicketData $ticketData)
    {
        UpsertTicketAction::execute($ticketData);

        return redirect()->route('tickets.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ticket $ticket)
    {
        DeleteTicketAction::execute($ticket);

        return redirect()->route('tickets.index')->with('success', __('messages.deleted_successfully'));
    }
}
