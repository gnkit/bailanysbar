@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col bg-white p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.create_user') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('users.store') }}" id="createUser"
                                  class="needs-validation" novalidate>
                                @csrf

                                <div class="col mb-3">
                                    <label for="name" class="form-label">{{ __('messages.name')  }}*</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder=""
                                           value="{{ old('name') ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="email" class="form-label">{{ __('messages.email') }}*</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder=""
                                           value="{{ old('email') ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid email is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="password" class="form-label">{{ __('messages.password') }}*</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                           placeholder=""
                                           value="{{ old('password') ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid password is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="role" class="form-label">{{ __('messages.role') }}*</label>
                                    <select name="role_id" class="form-select" id="role" required>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{ $role->id }}" {{ $role->id != old('role_id') ?: 'selected' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please role a valid status.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="status" class="form-label">{{ __('messages.status') }}*</label>
                                    <select name="status" class="form-select" id="status" required>
                                        @foreach(\Domain\Account\Enums\User\UserStatus::cases() as $status)
                                            <option
                                                value="{{ $status->value }}" {{ $status->value != old('status') ?: 'selected' }}>{{ $status->value }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please status a valid status.') }}
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col">
                                        <button class="w-100 btn btn-success" type="submit">{{ __('messages.save') }}</button>
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
