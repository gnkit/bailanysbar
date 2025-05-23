@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.contact') }}</h1>

            <!-- Content -->
            <div class="row g-3">
                <div class="col d-flex justify-content-center">
                    <div class="card border-0" style="max-width: 30rem;">
                        <div class="card-body position-relative">
                            <img src="{{ asset('storage/images/' . $contact->image) }}" class="top-0 end-0 card-img-top mb-3"
                                alt="Avatar" />
                            <form action="{{ route('contact.image.reset', $contact) }}" method="POST" class="fs-6">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col">
                                        <button
                                            class="btn btn-sm btn-danger text-white position-absolute top-0 end-0 mt-4 me-4"
                                            type="submit">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="card-text"><i class="fa-solid fa-paperclip me-2"></i>{{ $contact->title ?? '' }}
                            </p>
                            <p class="card-text"><i class="fa-regular fa-user me-2"></i>{{ $contact->name ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-bookmark me-2"></i>{{ $contact->category->name ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-solid fa-square-phone-flip me-2"></i>{{ $contact->phone ?? '' }}
                            </p>
                            <p class="card-text"><i class="fa-solid fa-location-dot me-2"></i>{{ $contact->address ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-file-lines me-2"></i>{{ $contact->description ?? '' }}
                            </p>

                            <p class="card-text"><i class="fa-brands fa-whatsapp me-2"></i>{{ $contact->whatsapp ?? '' }}
                            </p>
                            <p class="card-text"><i class="fa-brands fa-instagram me-2"></i>{{ $contact->instagram ?? '' }}
                            </p>
                            <p class="card-text"><i class="fa-brands fa-telegram me-2"></i>{{ $contact->telegram ?? '' }}
                            </p>
                            <p class="card-text"><i class="fa-brands fa-chrome me-2"></i>{{ $contact->site ?? '' }}
                            </p>

                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row g-3">

                                    <div class="col">
                                        <a class="w-100 btn btn-secondary"
                                            href="{{ route('contacts.edit', $contact->id) }}"
                                            type="submit">{{ __('messages.edit') }}</a>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-danger"
                                            type="submit">{{ __('messages.delete') }}</button>
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
