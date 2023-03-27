@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <!-- Title -->
                        <h1 class="mb-4">{{ __('Contact') }}</h1>

                        <!-- Content -->
                        <div class="row g-3">

                            <div class="col-md-8 col-sm-12 col-lg-6 p-3">
                                <div class="col">
                                    <p class="lead fs-6"><i
                                            class="fa-solid fa-paperclip me-2"></i>{{ $contact->title ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-regular fa-user me-2"></i>{{ $contact->name ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-regular fa-bookmark me-2"></i>{{ $contact->category->name ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-solid fa-square-phone-flip me-2"></i>{{ $contact->phone ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-solid fa-location-dot me-2"></i>{{ $contact->address ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-regular fa-file-lines me-2"></i>{{ $contact->description ?? '' }}
                                    </p>
                                    <hr>
                                    <p class="lead fs-6"><i
                                            class="fa-brands fa-whatsapp me-2"></i>{{ $contact->whatsapp ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-brands fa-instagram me-2"></i>{{ $contact->instagram ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-brands fa-telegram me-2"></i>{{ $contact->telegram ?? '' }}
                                    </p>
                                    <p class="lead fs-6"><i
                                            class="fa-brands fa-chrome me-2"></i>{{ $contact->site ?? '' }}
                                    </p>
                                </div>

                                <hr class="my-4">
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="row g-3">

                                        <div class="col">
                                            <a class="w-100 btn btn-secondary btn-lg"
                                               href="{{ route('contacts.edit', $contact->id) }}"
                                               type="submit">{{ __('Edit') }}</a>
                                        </div>
                                        <div class="col">
                                            <button class="w-100 btn btn-danger btn-lg"
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
    </div>
@endsection
