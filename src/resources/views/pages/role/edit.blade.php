@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <h4 class="mb-3">{{ __('Edit Role') }}</h4>
                        <form method="POST" action="{{ route('roles.update', $role) }}"
                              id="updatePermission"
                              class="needs-validation" novalidate>
                            @method('PUT')
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">

                                    <div class="col">
                                        <label for="name" class="form-label">{{ __('Name')  }}*</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder=""
                                               value="{{ $role->name ?? old('name') }}" required>
                                        <div class="invalid-feedback">
                                            {{ __('Valid name is required.') }}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="permissions" class="form-label">{{ __('Permissions') }}</label>
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

                                </div>

                            </div>

                            <hr class="my-4">
                            <div class="row g-3">
                                <div class="col">
                                    <button class="w-100 btn btn-success btn-lg"
                                            type="submit">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
