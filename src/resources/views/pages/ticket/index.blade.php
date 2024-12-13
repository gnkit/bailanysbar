@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.all_tickets') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('tickets.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('messages.new') }}
                </a>
            </div>

            @include('partials.flash_message')

            <div class="card border-0">
                <div class="card-body">
                    @if (0 < $tickets->count())
                        <!-- Table -->
                        <table class="table table-hover table-responsive table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('messages.email') }}</th>
                                    <th scope="col">{{ __('messages.limit') }}</th>
                                    <th scope="col">{{ __('messages.updated') }}</th>
                                    <th scope="col">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="col-1">{{ ++$i }}</td>
                                        <td class="col-4 text-break">{{ $ticket->user->email ?? '' }}</td>
                                        <td class="col-1">{{ $ticket->limit ?? '' }}</td>
                                        <td class="col-3">{{ $ticket->updated_at ?? '' }}</td>
                                        <td class="col-3">
                                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-dark btn-sm"
                                                        href="{{ route('tickets.edit', $ticket->id) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button type="submit" class="btn btn-outline-dark btn-sm"><i
                                                            class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-start">
                            {{ __('messages.no_tickets') }}
                        </p>
                    @endif
                    <!-- Pagination -->
                    {{ $tickets->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
