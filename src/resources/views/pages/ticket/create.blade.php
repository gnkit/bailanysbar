@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('Create User') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('tickets.store') }}" id="createTicket"
                                  class="needs-validation" novalidate>
                                @csrf

                                <div class="col">
                                    <label for="user_id" class="form-label">{{ __('User') }}*</label>
                                    <select name="user_id" class="form-select" id="user_id" required>
                                        @foreach($users as $user)
                                            <option
                                                value="{{ $user->id }}" {{ $user->id != old('user_id') ?: 'selected' }}>{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please user a valid status.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="ticket" class="form-label">{{ __('Ticket') }}*</label>
                                    <input name="limit" type="number" class="form-control" id="ticket"
                                           min="1" max="5" placeholder=""
                                           value="{{ old('ticket') ?? \Domain\Payment\Enums\Ticket\TicketLimit::DEFAULT->value }}"
                                           required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid ticket is required.') }}
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row g-3">
                                    <div class="col">
                                        <button class="w-100 btn btn-success" type="submit">{{ __('Save') }}</button>
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
