@extends('layouts.app')

@section('content')
    <div class="row gx-5">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('Contact') }}</h1>

            <!-- Content -->
            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg position-relative">
                        <img src="{{ asset('storage/images/' . $contact->image) }}"
                             class="position-absolute top-0 end-0 rounded-circle m-2 p-2 card-img-top" alt="Avatar"
                             style="height: 11rem; width: 11rem;"/>
                        <div class="card-body">
                            <p class="card-text"><i
                                    class="fa-solid fa-paperclip me-2"></i>{{ $contact->title ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-user me-2"></i>{{ $contact->name ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-bookmark me-2"></i>{{ $contact->category->name ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-solid fa-square-phone-flip me-2"></i>{{ $contact->phone ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-solid fa-location-dot me-2"></i>{{ $contact->address ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-regular fa-file-lines me-2"></i>{{ $contact->description ?? '' }}
                            </p>
                            <hr>
                            <p class="card-text"><i
                                    class="fa-brands fa-whatsapp me-2"></i>{{ $contact->whatsapp ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-brands fa-instagram me-2"></i>{{ $contact->instagram ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-brands fa-telegram me-2"></i>{{ $contact->telegram ?? '' }}
                            </p>
                            <p class="card-text"><i
                                    class="fa-brands fa-chrome me-2"></i>{{ $contact->site ?? '' }}
                            </p>

                            <hr class="my-4">

                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row g-3">

                                    <div class="col">
                                        <a class="w-100 btn btn-secondary"
                                           href="{{ route('contacts.edit', $contact->id) }}"
                                           type="submit">{{ __('Edit') }}</a>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-danger"
                                                type="submit">{{ __('Delete') }}</button>
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
