@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col text-center p-4">
                <div class="container filter">
                    <button class="button btn btn-dark m-1 border-0" data-filter="all">
                        <span id="all" class="lead">
                            @if (app()->getLocale() == 'en')
                                {{ $contact->category->name_en ?? '' }}
                            @elseif(app()->getLocale() == 'ru')
                                {{ $contact->category->name_ru ?? '' }}
                            @else
                                {{ $contact->category->name ?? '' }}
                            @endif
                        </span>
                    </button>
                    @foreach ($contact->category->children as $child)
                        <button class="button btn btn-light m-1 border-0" data-filter="{{ $child->slug }}">
                            <i class="{{ $child->icon ?? '' }}"></i>
                            <span class="lead">
                                @if (app()->getLocale() == 'en')
                                    {{ $child->name_en ?? '' }}
                                @elseif(app()->getLocale() == 'ru')
                                    {{ $child->name_ru ?? '' }}
                                @else
                                    {{ $child->name ?? '' }}
                                @endif
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row contacts justify-content-center">
            <div class="contact card border-0" style="max-width: 30rem">
                <div class="card-body">
                    @if (null !== $contact->image)
                        <img src="{{ asset('storage/images/' . $contact->image) }}" class="top-0 end-0 card-img-top mb-3"
                            alt="Avatar" />
                    @endif
                    <div class="card-title">{{ $contact->title ?? '' }}</div>
                    <hr>
                    <div class="text-start mb-4 small" style="">
                        @if ($contact->name)
                            <div class="d-flex align-items-center mb-1">
                                <span class="me-1">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <div>{{ $contact->name ?? '' }}</div>
                            </div>
                        @endif
                        @if ($contact->phone)
                            <div class="d-flex align-items-center mb-1">
                                <span class="me-1">
                                    <i class="fa-solid fa-square-phone"></i>
                                </span>
                                <div>{{ $contact->phone ?? '' }}</div>
                            </div>
                        @endif
                        @if ($contact->address)
                            <div class="d-flex align-items-center mb-1">
                                <span class="me-1">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <div>{{ $contact->address ?? '' }}</div>
                            </div>
                        @endif
                        @if ($contact->description)
                            <div class="d-flex align-items-center mb-1">
                                <span class="me-1">
                                    <i class="fa-solid fa-circle-info"></i>
                                </span>
                                <div data-bs-toggle="modal" data-toggle="tooltip" data-placement="top"
                                    title="{{ __('Сипаттаманы толық көру үшін тексті басыңыз.') }}"
                                    data-bs-target="#description">
                                    <a href="#" class="text-decoration-none text-dark">
                                        {{ mb_substr($contact->description, 0, 40) }}...
                                    </a>
                                </div>
                            </div>
                        @endif

                        <div class="modal fade" id="description" tabindex="-1" aria-labelledby="description"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <a type="button" class="btn-close ms-auto p-2" data-bs-dismiss="modal"
                                        aria-label="Close"></a>
                                    <div class="modal-body">
                                        {{ $contact->description ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        @if ($contact->phone)
                            <a href="tel:{{ $contact->phone ?? '' }}" class="btn btn-success border-0 rounded-circle me-2"
                                target="_blank" style="width: 2.7rem; height: 2.7rem; background-color: #68217a;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-phone p-2"></i>
                                </div>
                            </a>
                        @endif
                        @if ($contact->whatsapp)
                            <a href="https://wa.me/{{ $contact->whatsapp ?? '' }}"
                                class="btn btn-success border-0 rounded-circle me-2" target="_blank"
                                style="width: 2.7rem; height: 2.7rem; background-color: #128c7e;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="fa-brands fa-whatsapp p-2"></i>
                                </div>
                            </a>
                        @endif
                        @if ($contact->instagram)
                            <a href="https://ig.me/m/{{ $contact->instagram ?? '' }}"
                                class="btn btn-success border-0 rounded-circle me-2" target="_blank"
                                style="width: 2.7rem; height: 2.7rem; background-color: #e1306c;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="fa-brands fa-instagram p-2"></i>
                                </div>
                            </a>
                        @endif
                        @if ($contact->telegram)
                            <a href="https://t.me/{{ $contact->telegram ?? '' }}"
                                class="btn btn-success border-0 rounded-circle me-2" target="_blank"
                                style="width: 2.7rem; height: 2.7rem; background-color: #0088cc;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="fa-brands fa-telegram p-2"></i>
                                </div>
                            </a>
                        @endif
                        @if ($contact->site)
                            <a href="{{ $contact->site ?? '' }}" class="btn btn-success border-0 rounded-circle me-2"
                                target="_blank" style="width: 2.7rem; height: 2.7rem; background-color: #005670;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-square-arrow-up-right p-2"></i>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
