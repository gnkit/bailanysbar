@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.user') }}</h1>

            <!-- Content -->
            <div class="row g-3">
                <div class="col">
                    <div class="card border-0">
                        <div class="card-body">
                            <p class="card-text"><i
                                    class="fa-regular fa-user me-2"></i>{{ $user->name ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-envelope me-2"></i>{{ $user->email ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-heart me-2"></i>{{ $user->status ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-pen-to-square me-2"></i>{{ $user->role->name ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-solid fa-ticket me-2"></i>{{ $user->ticket->limit ?? \Domain\Payment\Enums\Ticket\TicketLimit::NULL }}
                            </p>

                            <p class="card-text fw-bold text-center">{{ __('messages.user_contacts') }}</p>

                            @if(0 < $user->contacts->count())
                                <ol class="list-group list-group-numbered list-group-flush mb-3">
                                    @foreach($user->contacts as $contact)
                                        <li class="list-group-item list-group-item-action">
                                            <a class="text-decoration-none link-dark"
                                               href="{{ route('contacts.show', $contact) }}">
                                                {{ $contact->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ol>
                            @endif

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row g-3">

                                    <div class="col">
                                        <a class="w-100 btn btn-secondary"
                                           href="{{ route('users.edit', $user->id) }}"
                                           type="submit">{{ __('messages.edit') }}</a>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-danger"
                                                type="submit">{{ __('messages.delete') }}</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
