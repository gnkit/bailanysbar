@extends('layouts.app')

@section('content')
     <div class="row gx-5">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('Create Role') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('roles.store') }}" id="createRole"
                              class="needs-validation" novalidate>
                                @csrf

                                <div class="col">
                                    <label for="name" class="form-label">{{ __('Name')  }}*</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder=""
                                           value="{{ old('name') ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="permissions" class="form-label">{{ __('Permissions') }}</label>
                                    <select name="permissions[]" class="form-select" id="permissions" multiple>
                                        @foreach($permissions as $permission)
                                            <option
                                                value="{{ $permission->id }}" {{ $permission->id != old('permissions') ?: 'selected' }}>{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please permission a valid status.') }}
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
