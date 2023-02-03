@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <h4 class="mb-3">{{ __('Contact') }}</h4>
                        <div class="card border-light mb-3">
                            <div class="card-header">{{ $contact->title ?? '' }}</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $contact->name ?? '' }}</h5>
                                <p class="card-text"><i
                                        class="fa-solid fa-list me-2"></i>{{ $contact->category->name ?? '' }}</p>
                                <p class="card-text"><i class="fa-solid fa-phone me-2"></i>{{ $contact->phone ?? '' }}
                                </p>
                                <p class="card-text"><i
                                        class="fa-solid fa-location-dot me-2"></i>{{ $contact->address ?? '' }}</p>
                                <p class="card-text"><i
                                        class="fa-solid fa-file-lines me-2"></i>{{ $contact->description ?? '' }}</p>
                                <p class="card-text"><i
                                        class="fa-brands fa-whatsapp me-2"></i>{{ $contact->whatsapp ?? '' }}</p>
                                <p class="card-text"><i
                                        class="fa-brands fa-instagram me-2"></i>{{ $contact->instagram ?? '' }}</p>
                                <p class="card-text"><i
                                        class="fa-brands fa-telegram me-2"></i>{{ $contact->telegram ?? '' }}</p>
                                <p class="card-text"><i class="fa-solid fa-link me-2"></i>{{ $contact->site ?? '' }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
