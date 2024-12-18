@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.account') }}</h1>

            <div class="row g-3">
                <div class="col">
                    <div class="card border-0">
                        <div class="card-body">
                            <p class="card-text"><i class="fa-regular fa-circle-user me-2"></i>{{ $account->name ?? '' }}</p>
                            <p class="card-text"><i class="fa-regular fa-envelope me-2"></i>{{ $account->email ?? '' }}</p>
                            <p class="card-text"><i class="fa-regular fa-heart me-2"></i>{{ $account->status ?? '' }}</p>
                            <p class="card-text"><i class="fa-regular fa-pen-to-square me-2"></i>{{ $account->role->name ?? '' }}</p>
                            <p class="card-text"><i class="fa-solid fa-ticket me-2"></i>{{ $account->ticket->limit ?? \Domain\Payment\Enums\Ticket\TicketLimit::NULL }}</p>

                            <hr>

                            <form action="{{ route('destroy', $account->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row g-3">
                                    <div class="col">
                                        <a class="w-100 btn btn-secondary"
                                           href="{{ route('password.reset', $account->id) }}"
                                           type="submit">{{ __('messages.reset_password') }}</a>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-danger"
                                                type="submit">{{ __('messages.account_delete') }}</button>
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
