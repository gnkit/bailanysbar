@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('Create Contact') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('contacts.store') }}" id="createContact"
                                  class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf

                                <div class="col">
                                    <label for="title" class="form-label">{{ __('Title')  }}*</label>
                                    <input name="title" type="text" class="form-control" id="title" placeholder=""
                                           value="{{ old('title') ?? '' }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid title is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="phone" class="form-label">{{ __('Phone') }}*</label>
                                    <input name="phone" type="tel" class="form-control" id="phone" placeholder=""
                                           value="{{ old('phone') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid phone is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="category" class="form-label">{{ __('Category') }}*</label>
                                    <select name="category_id" class="form-select" id="category" required>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ $category->id != old('category') ?: 'selected' }}>{{ $category->name }}</option>
                                            @if(0 < $category->children->count())
                                                @foreach($category->children as $child)
                                                    <option
                                                        value="{{ $child->id }}" {{ $child->id != old('category') ?: 'selected' }}>{{ '--- ' . $child->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please category a valid status.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="image" class="form-label">{{ __('Image (ex.500x500px)')  }}</label>
                                    <input name="image" type="file" class="form-control" id="image" placeholder=""
                                           value="{{ old('image') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid image is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="name" class="form-label">{{ __('Name')  }}</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder=""
                                           value="{{ old('name') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="address" class="form-label">{{ __('Address')  }}</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                           placeholder=""
                                           value="{{ old('address') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid address is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>
                                    <textarea name="description" type="text" class="form-control" id="description"
                                              placeholder="" rows="3">{{ old('description') ?? '' }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ __('Valid description is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="whatsapp" class="form-label">{{ __('Whatsapp') }}</label>
                                    <input name="whatsapp" type="text" class="form-control" id="whatsapp"
                                           placeholder=""
                                           value="{{ old('whatsapp') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid whatsapp is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                                    <input name="instagram" type="text" class="form-control" id="instagram"
                                           placeholder=""
                                           value="{{ old('instagram') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid instagram is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="telegram" class="form-label">{{ __('Telegram') }}</label>
                                    <input name="telegram" type="text" class="form-control" id="telegram"
                                           placeholder=""
                                           value="{{ old('telegram') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid telegram is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="site" class="form-label">{{ __('Site') }}</label>
                                    <input name="site" type="text" class="form-control" id="site" placeholder=""
                                           value="{{ old('site') ?? '' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid site is required.') }}
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row g-3">
                                    <div class="col">
                                        <button class="w-100 btn btn-secondary" type="submit"
                                                name="status"
                                                value="{{ \Domain\Link\Enums\Contact\ContactStatus::DRAFT }}">{{ __('Save Draft') }}</button>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-success" type="submit"
                                                name="status"
                                                value="{{ \Domain\Link\Enums\Contact\ContactStatus::PENDING }}">{{ __('Publish') }}</button>
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
