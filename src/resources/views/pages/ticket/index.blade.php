@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('All Tickets') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('tickets.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('New Ticket') }}
                </a>
            </div>

            @include('partials.flash_message')

            @if(0 < $tickets->count())
                <!-- Table -->
                <table class="table table-hover table-responsive table-sm table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('User Email') }}</th>
                        <th scope="col">{{ __('Limit') }}</th>
                        <th scope="col">{{ __('Created') }}</th>
                        <th scope="col">{{ __('Updated') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td class="col-1">{{ ++$i }}</td>
                            <td class="col-2">{{ $ticket->user->email ?? '' }}</td>
                            <td class="col-1">{{ $ticket->limit ?? '' }}</td>
                            <td class="col-1">{{ $ticket->created_at ?? '' }}</td>
                            <td class="col-2">{{ $ticket->updated_at ?? '' }}</td>
                            <td class="col-5">
                                <form action="{{ route('tickets.destroy', $ticket->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('tickets.edit', $ticket->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-start">
                    {{ __('No Tickets') }}
                </p>
            @endif
            <!-- Pagination -->
            {{ $tickets->links() }}
        </div>
    </div>
@endsection
