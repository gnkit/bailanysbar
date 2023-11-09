@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('messages.edit_category') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('categories.update', $category) }}" id="updateCategory"
                              class="needs-validation" novalidate>
                                @method('PUT')
                                @csrf

                                <div class="col">
                                    <label for="name" class="form-label">{{ __('messages.name')  }}*</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder=""
                                           value="{{ $category->name ?? old('name') }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="icon" class="form-label">{{ __('messages.icon')  }}</label>
                                    <input name="icon" type="text" class="form-control" id="icon" placeholder=""
                                           value="{{ $category->icon ?? old('icon') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid icon is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="category" class="form-label">{{ __('messages.category') }}</label>
                                    <select name="parent_id" class="form-select" id="category" required>
                                        @foreach($categories as $category_another)
                                            @continue($category->id === $category_another->id)
                                            <option
                                                value="{{ $category_another->id }}" {{ (($category->parent_id === $category_another->id) != old('parent_id')) ? 'selected':'' }}>{{ $category_another->name }}</option>
                                        @endforeach
                                        @if($category->parent_id === null)
                                            <option value="" selected>{{ __('messages.parent_category') }}</option>
                                        @else
                                            <option value="">{{ __('messages.delete_parent_category') }}</option>
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please category a valid status.') }}
                                    </div>
                                </div>

                                <hr class="my-4">

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
