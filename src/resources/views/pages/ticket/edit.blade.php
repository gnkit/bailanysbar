@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.edit_ticket') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col">
                    <div class="card border-0">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('tickets.update', $ticket) }}" id="updateTicket"
                                  class="needs-validation" novalidate>
                                @method('PUT')
                                @csrf

                                <div class="col mb-3">
                                    <label for="user_id" class="form-label">{{ __('messages.user') }}*</label>
                                    <select name="user_id" class="form-select border-0" id="user_id" required>
                                        <option
                                            value="{{ $ticket->user_id }}" {{ $ticket->user_id != old('user_id') ?: 'selected' }}>{{ $ticket->user->email }}</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please user a valid status.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="ticket" class="form-label">{{ __('messages.ticket') }}*</label>
                                    <input name="limit" type="number" class="form-control border-0" id="ticket"
                                           min="1" max="5" placeholder=""
                                           value="{{ $ticket->limit ?? old('ticket') }}"
                                           required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid ticket is required.') }}
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col">
                                        <button class="w-100 btn btn-success" type="submit">{{ __('messages.update') }}</button>
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
