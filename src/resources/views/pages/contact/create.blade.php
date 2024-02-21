@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col bg-white p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.create_contact') }}</h1>

            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col">
                    <div class="card shadow-lg">
                        <div class="card-body">

                            @if(!\auth()->user()->isCanPublishContact())
                                <p>{{ __('messages.limit_create_contact') }}</p>
                                <a href="{{ route('sale') }}">{{ __('messages.buy_tickets') }}</a>
                            @else
                                <!-- Form -->
                                <form method="POST" action="{{ route('contacts.store') }}" id="createContact"
                                      class="needs-validation" novalidate enctype="multipart/form-data">
                                    @csrf

                                    <div class="col mb-3">
                                        <label for="title" class="form-label">{{ __('messages.title')  }}*</label>
                                        <input name="title" type="text" class="form-control" id="title"
                                               placeholder="{{ __('messages.title.placeholder') }}"
                                               value="{{ old('title') ?? '' }}" required>
                                        <div class="invalid-feedback">
                                            {{ __('Valid title is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="phone" class="form-label">{{ __('messages.phone') }}*</label>
                                        <input name="phone" type="tel" class="form-control" id="phone"
                                               placeholder="{{ __('messages.phone.placeholder') }}"
                                               value="{{ old('phone') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid phone is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="category_id" class="form-label">{{ __('messages.category') }}
                                            *</label>
                                        <select name="category_id" class="form-select" id="category_id" required>
                                            <option value="0">{{ __('messages.select_category') }}</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->id }}" {{ $category->id != old('category_id') ?: 'selected' }}>
                                                    @if(app()->getLocale() == 'en')
                                                        {{ $category->name_en ?? '' }}
                                                    @elseif( app()->getLocale() == 'ru' )
                                                        {{ $category->name_ru ?? '' }}
                                                    @else
                                                        {{ $category->name ?? '' }}
                                                    @endif
                                                </option>
                                                @if(0 < $category->children->count())
                                                    @foreach($category->children as $child)
                                                        <option
                                                            value="{{ $child->id }}" {{ $child->id != old('category_id') ?: 'selected' }}>
                                                            {{ '--- ' }}
                                                            @if(app()->getLocale() == 'en')
                                                                {{ $child->name_en ?? '' }}
                                                            @elseif( app()->getLocale() == 'ru' )
                                                                {{ $child->name_ru ?? '' }}
                                                            @else
                                                                {{ $child->name ?? '' }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('Please category a valid status.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="image" class="form-label">{{ __('messages.image')  }}
                                            (500x500px)</label>
                                        <input name="image" type="file" class="form-control" id="image" placeholder=""
                                               value="{{ old('image') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid image is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="name" class="form-label">{{ __('messages.name')  }}</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                               placeholder="{{ __('messages.name.placeholder') }}"
                                               value="{{ old('name') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid name is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="address" class="form-label">{{ __('messages.address')  }}</label>
                                        <input name="address" type="text" class="form-control" id="address"
                                               placeholder="{{ __('messages.address.placeholder') }}"
                                               value="{{ old('address') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid address is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="description"
                                               class="form-label">{{ __('messages.description') }}</label>
                                        <textarea name="description" type="text" class="form-control" id="description"
                                                  placeholder="{{ __('messages.description.placeholder') }}"
                                                  rows="3">{{ old('description') ?? '' }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ __('Valid description is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="whatsapp" class="form-label">{{ __('messages.whatsapp') }}</label>
                                        <input name="whatsapp" type="text" class="form-control" id="whatsapp"
                                               placeholder="{{ __('messages.whatsapp.placeholder') }}"
                                               value="{{ old('whatsapp') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid whatsapp is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="instagram" class="form-label">{{ __('messages.instagram') }}</label>
                                        <input name="instagram" type="text" class="form-control" id="instagram"
                                               placeholder="{{ __('messages.instagram.placeholder') }}"
                                               value="{{ old('instagram') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid instagram is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="telegram" class="form-label">{{ __('messages.telegram') }}</label>
                                        <input name="telegram" type="text" class="form-control" id="telegram"
                                               placeholder="{{ __('messages.telegram.placeholder') }}"
                                               value="{{ old('telegram') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid telegram is required.') }}
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="site" class="form-label">{{ __('messages.site') }}</label>
                                        <input name="site" type="text" class="form-control" id="site"
                                               placeholder="{{ __('messages.site.placeholder') }}"
                                               value="{{ old('site') ?? '' }}">
                                        <div class="invalid-feedback">
                                            {{ __('Valid site is required.') }}
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col">
                                            <button class="w-100 btn btn-secondary" type="submit"
                                                    name="status"
                                                    value="{{ \Domain\Link\Enums\Contact\ContactStatus::DRAFT }}">{{ __('messages.save_draft') }}</button>
                                        </div>
                                        <div class="col">
                                            <button class="w-100 btn btn-success" type="submit"
                                                    name="status"
                                                    value="{{ \Domain\Link\Enums\Contact\ContactStatus::PENDING }}">{{ __('messages.publish') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
