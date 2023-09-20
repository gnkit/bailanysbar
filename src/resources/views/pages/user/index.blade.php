@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('All Users') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('users.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('New User') }}
                </a>
            </div>

            @include('partials.flash_message')

            @if(0 < $users->count())
                <!-- Table -->
                <table class="table table-hover table-responsive table-sm table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Ticket') }}</th>
                        <th scope="col">{{ __('Role') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="col-1">{{ ++$i }}</td>
                            <td class="col-2">{{ $user->name ?? '' }}</td>
                            <td class="col-1">{{ $user->status ?? '' }}</td>
                            <td class="col-1">{{ $user->ticket->limit ?? \Domain\Payment\Enums\Ticket\TicketLimit::NULL }}</td>
                            <td class="col-2">{{ $user->role->name ?? '' }}</td>
                            <td class="col-5">
                                <form action="{{ route('users.destroy', $user->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-outline-secondary btn-sm"
                                       href="{{ route('users.show', $user->id) }}"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('users.edit', $user->id) }}"><i
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
                    {{ __('No Users') }}
                </p>
            @endif
            <!-- Pagination -->
            {{ $users->links() }}
        </div>
    </div>
@endsection
