@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('messages.create_permission') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('permissions.store') }}" id="createPermission"
                              class="needs-validation" novalidate>
                                @csrf

                                <div class="col">
                                    <label for="name" class="form-label">{{ __('messages.name')  }}*</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder=""
                                           value="{{ old('name') ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <hr class="my-4">

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
