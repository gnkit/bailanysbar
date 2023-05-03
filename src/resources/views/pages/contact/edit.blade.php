@extends('layouts.app')

@section('content')
    <div class="row gx-5">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('Edit Contact') }}</h1>
            
            @include('partials.flash_message')

            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">           

                            <!-- Form -->
                            <form method="POST" action="{{ route('contacts.update', $contact) }}" id="updateContact"
                                  class="needs-validation" novalidate>
                                @method('PUT')
                                @csrf
                                
                                <div class="col">
                                    <label for="title" class="form-label">{{ __('Title')  }}*</label>
                                    <input name="title" type="text" class="form-control" id="title" placeholder=""
                                           value="{{ $contact->title ?? old('title') }}" required>
                                    <div class="invalid-feedback">
                                        {{ __('Valid title is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="phone" class="form-label">{{ __('Phone') }}*</label>
                                    <input name="phone" type="tel" class="form-control" id="phone" placeholder=""
                                           value="{{ $contact->phone ?? old('phone') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid phone is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="category" class="form-label">{{ __('Category') }}*</label>
                                    <select name="category_id" class="form-select" id="category" required>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ $category->id != old('category', $contact->category->id) ? '' : 'selected' }}>{{ $category->name }}</option>
                                            @if(0 < $category->children->count())
                                                @foreach($category->children as $child)
                                                    <option
                                                            value="{{ $child->id }}" {{ (($contact->category_id === $child->id) != old('category')) ? 'selected' : '' }}>{{ '--- ' . $child->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please category a valid status.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="name" class="form-label">{{ __('Name')  }}</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder=""
                                           value="{{ $contact->name ?? old('name') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid name is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="address" class="form-label">{{ __('Address')  }}</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                           placeholder=""
                                           value="{{ $contact->address ?? old('address') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid address is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>
                                    <textarea name="description" type="text" class="form-control" id="description"
                                              placeholder=""
                                              rows="3">{{ $contact->description ?? old('description') }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ __('Valid description is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="whatsapp" class="form-label">{{ __('Whatsapp') }}</label>
                                    <input name="whatsapp" type="text" class="form-control" id="whatsapp"
                                           placeholder=""
                                           value="{{ $contact->whatsapp ?? old('whatsapp') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid whatsapp is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                                    <input name="instagram" type="text" class="form-control" id="instagram"
                                           placeholder=""
                                           value="{{ $contact->instagram ?? old('instagram') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid instagram is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="telegram" class="form-label">{{ __('Telegram') }}</label>
                                    <input name="telegram" type="text" class="form-control" id="telegram"
                                           placeholder=""
                                           value="{{ $contact->telegram ?? old('telegram') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid telegram is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="site" class="form-label">{{ __('Site') }}</label>
                                    <input name="site" type="text" class="form-control" id="site" placeholder=""
                                           value="{{ $contact->site ?? old('site') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Valid site is required.') }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="status" class="form-label">{{ __('Status') }}</label>
                                    <input name="status" type="text"
                                           class="form-control" id="status"
                                           placeholder=""
                                           value="{{ $contact->status ?? old('status') }}" disabled>
                                    <div class="invalid-feedback">
                                        {{ __('Valid status is required.') }}
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
