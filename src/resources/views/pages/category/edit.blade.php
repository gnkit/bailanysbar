@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <h4 class="mb-3">{{ __('Update Category') }}</h4>
                        <form method="POST" action="{{ route('categories.update', $category) }}" id="updateCategory"
                              class="needs-validation" novalidate>
                            @method('PUT')
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">

                                    <div class="col">
                                        <label for="name" class="form-label">{{ __('Name')  }}*</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder=""
                                               value="{{ $category->name ?? old('name') }}" required>
                                        <div class="invalid-feedback">
                                            {{ __('Valid name is required.') }}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="category" class="form-label">{{ __('Category') }}</label>
                                        <select name="parent_id" class="form-select" id="category" required>
                                            @if($category->parent_id == null)
                                                <option value="" selected>{{ __('Without Category') }}</option>
                                            @endif
                                            @foreach($categories as $category_another)
                                                @continue($category->id == $category_another->id)
                                                <option
                                                    value="{{ $category_another->id }}" {{ $category_another->id != old('category') ?: 'selected' }}>{{ $category_another->name }}</option>
{{--                                                @if(0 < $category_another->children->count())--}}
{{--                                                    @foreach($category_another->children as $child)--}}
{{--                                                        <option--}}
{{--                                                            value="{{ $child->id }}" {{ $child->id != old('category') ?: 'selected' }}>{{ '--- ' . $child->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}
                                            @endforeach
                                            <option value="">{{ __('Delete Category') }}</option>
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
