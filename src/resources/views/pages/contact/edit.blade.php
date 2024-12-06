@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.edit_contact') }}</h1>

            @include('partials.flash_message')
            @include('pages.contact.modal_crop')

            <div class="row g-3">
                <div class="col">
                    <div class="card border-0">
                        <div class="card-body">

                            <!-- Form -->
                            <form method="POST" action="{{ route('contacts.update', $contact) }}" id="updateContact"
                                class="needs-validation" novalidate enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="col mb-3">
                                    <label for="title" class="form-label">{{ __('messages.title') }}*</label>
                                    <input name="title" type="text" class="form-control border-0" id="title"
                                        placeholder="{{ __('messages.title.placeholder') }}"
                                        value="{{ $contact->title ?? old('title') }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid title is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="phone" class="form-label">{{ __('messages.phone') }}*</label>
                                    <input name="phone" type="tel" class="form-control border-0" id="phone"
                                        placeholder="{{ __('messages.phone.placeholder') }}"
                                        value="{{ $contact->phone ?? old('phone') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid phone is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="category" class="form-label">{{ __('messages.category') }}*</label>
                                    <select name="category_id" class="form-select border-0" id="category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id != old('category', $contact->category->id) ? '' : 'selected' }}>
                                                {{ $category->name }}</option>
                                            @if (0 < $category->children->count())
                                                @foreach ($category->children as $child)
                                                    <option value="{{ $child->id }}"
                                                        {{ ($contact->category_id === $child->id) != old('category') ? 'selected' : '' }}>
                                                        {{ '--- ' . $child->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please category a valid status.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    @if (null !== $contact->image)
                                        <img src="{{ asset('storage/images/' . $contact->image) }}" style="width: 10rem;"
                                            class="form-control p-0 border-0 show-avatar" alt="Avatar" />
                                    @endif
                                    <br>
                                    <label for="avatar" class="form-label">{{ __('messages.image') }}</label>
                                    <input name="avatar" type="file" class="form-control avatar border-0" placeholder=""
                                        value="{{ $contact->image ?? (old('avatar') ?? '') }}" accept="image/*">
                                    <input type="hidden" name="image" value="">
                                    <div class="invalid-feedback">
                                        {{ __('Valid image is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="name" class="form-label">{{ __('messages.name') }}</label>
                                    <input name="name" type="text" class="form-control border-0" id="name"
                                        placeholder="{{ __('messages.name.placeholder') }}"
                                        value="{{ $contact->name ?? old('name') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="address" class="form-label">{{ __('messages.address') }}</label>
                                    <input name="address" type="text" class="form-control border-0" id="address"
                                        placeholder="{{ __('messages.address.placeholder') }}"
                                        value="{{ $contact->address ?? old('address') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid address is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="description" class="form-label">{{ __('messages.description') }}</label>
                                    <textarea name="description" type="text" class="form-control border-0" id="description"
                                        placeholder="{{ __('messages.description.placeholder') }}" rows="3">{{ $contact->description ?? old('description') }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ __('Valid description is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="whatsapp" class="form-label">{{ __('messages.whatsapp') }}</label>
                                    <input name="whatsapp" type="text" class="form-control border-0" id="whatsapp"
                                        placeholder="{{ __('messages.whatsapp.placeholder') }}"
                                        value="{{ $contact->whatsapp ?? old('whatsapp') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid whatsapp is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="instagram" class="form-label">{{ __('messages.instagram') }}</label>
                                    <input name="instagram" type="text" class="form-control border-0" id="instagram"
                                        placeholder="{{ __('messages.instagram.placeholder') }}"
                                        value="{{ $contact->instagram ?? old('instagram') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid instagram is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="telegram" class="form-label">{{ __('messages.telegram') }}</label>
                                    <input name="telegram" type="text" class="form-control border-0" id="telegram"
                                        placeholder="{{ __('messages.telegram.placeholder') }}"
                                        value="{{ $contact->telegram ?? old('telegram') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid telegram is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="site" class="form-label">{{ __('messages.site') }}</label>
                                    <input name="site" type="text" class="form-control border-0" id="site"
                                        placeholder="{{ __('messages.site.placeholder') }}"
                                        value="{{ $contact->site ?? old('site') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid site is required.') }}
                                    </div>
                                </div>

                                <div class="col mb-3">
                                    <label for="status" class="form-label">{{ __('messages.status') }}</label>
                                    <input name="status" type="text" class="form-control border-0" id="status"
                                        placeholder="" value="{{ $contact->status ?? old('status') }}" disabled>
                                    <div class="invalid-feedback">
                                        {{ __('Valid status is required.') }}
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col">
                                        <button class="w-100 btn btn-secondary" type="submit" name="status"
                                            value="{{ \Domain\Link\Enums\Contact\ContactStatus::DRAFT }}">{{ __('messages.save_draft') }}</button>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-success" type="submit" name="status"
                                            value="{{ \Domain\Link\Enums\Contact\ContactStatus::PENDING }}">{{ __('messages.publish') }}</button>
                                    </div>
                                    @role('manager')
                                        <div class="col">
                                            <button class="w-100 btn btn-danger" type="submit" name="status"
                                                value="{{ \Domain\Link\Enums\Contact\ContactStatus::CANCELLED }}">{{ __('messages.cancel') }}</button>
                                        </div>
                                        <div class="col">
                                            <button class="w-100 btn btn-primary" type="submit" name="status"
                                                value="{{ \Domain\Link\Enums\Contact\ContactStatus::PUBLISHED }}">{{ __('messages.confirm') }}</button>
                                        </div>
                                    @endrole
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
