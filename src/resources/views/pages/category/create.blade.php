@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('messages.create_category') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">

                        <!-- Form -->
                        <form method="POST" action="{{ route('categories.store') }}" id="createCategory"
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

                            <div class="col">
                                <label for="name_en" class="form-label">{{ __('messages.name_en')  }}*</label>
                                <input name="name_en" type="text" class="form-control" id="name_en" placeholder=""
                                       value="{{ old('name_en') ?? '' }}" required>
                                <div class="invalid-feedback">
                                    {{ __('Valid name is required.') }}
                                </div>
                            </div>

                            <div class="col">
                                <label for="name_ru" class="form-label">{{ __('messages.name_ru')  }}*</label>
                                <input name="name_ru" type="text" class="form-control" id="name_ru" placeholder=""
                                       value="{{ old('name_ru') ?? '' }}" required>
                                <div class="invalid-feedback">
                                    {{ __('Valid name is required.') }}
                                </div>
                            </div>

                            <div class="col">
                                <label for="icon" class="form-label">{{ __('messages.icon')  }}</label>
                                <input name="icon" type="text" class="form-control" id="icon" placeholder=""
                                       value="{{ old('icon') ?? '' }}">
                                <div class="invalid-feedback">
                                    {{ __('Valid icon is required.') }}
                                </div>
                            </div>

                            <div class="col">
                                <label for="category" class="form-label">{{ __('messages.category') }}</label>
                                <select name="parent_id" class="form-select" id="category" required>
                                    <option value="">{{ __('messages.select_category') }}</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{ $category->id != old('parent_id') ?: 'selected' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ __('Please category a valid status.') }}
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
