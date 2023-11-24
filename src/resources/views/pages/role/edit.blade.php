@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col bg-white p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.edit_role') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('roles.update', $role) }}"
                              id="updatePermission"
                              class="needs-validation" novalidate>
                                @method('PUT')
                                @csrf

                                <div class="col mb-3">
                                    <label for="name" class="form-label">{{ __('messages.name')  }}*</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder=""
                                           value="{{ $role->name ?? old('name') }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="permissions" class="form-label">{{ __('messages.permissions') }}</label>
                                    <select name="permissions[]" class="form-select" id="permissions" multiple
                                            required>
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}"
                                            @foreach($role->permissions as $permissionRole)
                                                @if( $permission->id == $permissionRole->id )
                                                    {{ 'selected' }}
                                                    @endif
                                                @endforeach
                                            > {{ strtolower($permission->name) }} </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please select a valid permissions.') }}
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col">
                                        <button class="w-100 btn btn-success"
                                                type="submit">{{ __('messages.update') }}</button>
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
