@extends('layouts.app')

@section('content')
     <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.create_role') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col">
                    <div class="card border-0">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('roles.store') }}" id="createRole"
                              class="needs-validation" novalidate>
                                @csrf

                                <div class="col mb-3">
                                    <label for="name" class="form-label">{{ __('messages.name')  }}*</label>
                                    <input name="name" type="text" class="form-control border-0" id="name" placeholder=""
                                           value="{{ old('name') ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="permissions" class="form-label">{{ __('messages.permissions') }}</label>
                                    <select name="permissions[]" class="form-select border-0" id="permissions" multiple>
                                        @foreach($permissions as $permission)
                                            <option
                                                value="{{ $permission->id }}" {{ $permission->id != old('permissions') ?: 'selected' }}>{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please permission a valid status.') }}
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
