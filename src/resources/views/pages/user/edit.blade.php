@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <h4 class="mb-3">{{ __('Edit User') }}</h4>
                        <form method="POST" action="{{ route('users.update', $user) }}" id="updateUser"
                              class="needs-validation" novalidate>
                            @method('PUT')
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">

                                    <div class="col">
                                        <label for="name" class="form-label">{{ __('Name')  }}*</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder=""
                                               value="{{ $user->name ?? old('name') }}" required>
                                        <div class="invalid-feedback">
                                            {{ __('Valid name is required.') }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="email" class="form-label">{{ __('Email') }}*</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder=""
                                               value="{{ $user->email ?? old('email') }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid email is required.') }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="password" class="form-label">{{ __('Password') }}*</label>
                                        <input name="password" type="password" class="form-control" id="password"
                                               placeholder=""
                                               value="{{ old('password') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid password is required.') }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="role" class="form-label">{{ __('Role') }}*</label>
                                        <select name="role_id" class="form-select" id="role" required>
                                            @foreach($roles as $role)
                                                <option
                                                    value="{{ $role->id }}" {{ $role->id != old('role_id', $user->role_id) ? '' : 'selected' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('Please role a valid status.') }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="status" class="form-label">{{ __('Status') }}</label>
                                        <select name="status" class="form-select" id="status">
                                            @foreach(\Domain\Account\Enums\User\UserStatus::cases() as $status)
                                                <option value="{{ $status->value }}"
                                                    {{ $status->value != old('status', $user->status->value) ? '' : 'selected' }}>
                                                    {{ $status->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('Please status a valid status.') }}
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <hr class="my-4">
                            <div class="row g-3">
                                <div class="col">
                                    <button class="w-100 btn btn-success btn-lg" type="submit">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
