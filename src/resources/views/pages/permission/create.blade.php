@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.create_permission') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col">
                    <div class="card border-0">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('permissions.store') }}" id="createPermission"
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
