@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <h4 class="mb-3">{{ __('Create Category') }}</h4>
                        <form method="POST" action="{{ route('categories.store') }}" id="createCategory"
                              class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">

                                    <div class="col">
                                        <label for="name" class="form-label">{{ __('Name')  }}*</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder=""
                                               value="{{ old('name') ?? '' }}" required>
                                        <div class="invalid-feedback">
                                            {{ __('Valid name is required.') }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="icon" class="form-label">{{ __('Icon')  }}</label>
                                        <input name="icon" type="text" class="form-control" id="icon" placeholder=""
                                               value="{{ old('icon') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid icon is required.') }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="category" class="form-label">{{ __('Category') }}</label>
                                        <select name="parent_id" class="form-select" id="category" required>
                                            <option value="">{{ __('Select Category') }}</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->id }}" {{ $category->id != old('parent_id') ?: 'selected' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('Please category a valid status.') }}
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <hr class="my-4">
                            <div class="row g-3">
                                <div class="col">
                                    <button class="w-100 btn btn-success btn-lg" type="submit">{{ __('Save') }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
