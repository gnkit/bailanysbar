@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col text-center p-4">
                <div class="container filter">
                    <button class="button btn btn-dark m-1 border-0" data-filter="all">
                        <span id="all" class="lead">
                            @if(app()->getLocale() == 'en')
                                {{ $contact->category->name_en ?? '' }}
                            @elseif( app()->getLocale() == 'ru' )
                                {{ $contact->category->name_ru ?? '' }}
                            @else
                                {{ $contact->category->name ?? '' }}
                            @endif
                        </span>
                    </button>
                    @foreach($contact->category->children as $child)
                        <button class="button btn btn-light m-1 border-0" data-filter="{{ $child->slug }}">
                            <i class="{{ $child->icon ?? '' }}"></i>
                            <span class="lead">
                                @if(app()->getLocale() == 'en')
                                    {{ $child->name_en ?? '' }}
                                @elseif( app()->getLocale() == 'ru' )
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

        <div class="row g-2 contacts">
            <div class="contact col-12 {{ $contact->category->slug }}">
                <div class="card bg-light border-0">
                    <div class="card-body text-center">
                        @if(null !== $contact->image)
                            <img src="{{ asset('storage/images/' . $contact->image) }}"
                                 class="top-0 end-0 rounded-circle card-img-top p-1"
                                 alt="Avatar" style="height: 5rem; width: 5rem;"/>
                        @endif
                        <br>
                        <a class="p-2 text-decoration-none text-dark lead w-100" data-bs-toggle="collapse"
                           href="#socid{{ $contact->id }}" role="button" aria-expanded="false"
                           aria-controls="#socid{{ $contact->id }}">
                            {{ $contact->title ?? '' }}
                        </a>
                        <div class="collapse text-center" id="socid{{ $contact->id }}">
                            <div
                                class="socials btn-group pt-2">
                                @if($contact->phone)
                                    <a href="tel:{{ $contact->phone ?? '' }}"
                                       class="btn btn-light border-0 p-2 phone"
                                       target="_blank">
                                        <i class="fa-solid fa-square-phone fa-2xl"></i>
                                    </a>
                                @endif
                                @if($contact->whatsapp)
                                    <a href="https://wa.me/{{ $contact->whatsapp ?? '' }}"
                                       class="btn btn-light border-0 p-2 whatsapp"
                                       target="_blank">
                                        <i class="fa-brands fa-whatsapp fa-2xl"></i>
                                    </a>
                                @endif
                                @if($contact->instagram)
                                    <a href="https://ig.me/m/{{ $contact->instagram ?? '' }}"
                                       class="btn btn-light border-0 p-2 instagram"
                                       target="_blank">
                                        <i class="fa-brands fa-instagram fa-2xl"></i>
                                    </a>
                                @endif
                                @if($contact->telegram)
                                    <a href="https://t.me/{{ $contact->telegram ?? '' }}"
                                       class="btn btn-light border-0 p-2 telegram"
                                       target="_blank">
                                        <i class="fa-brands fa-telegram fa-2xl"></i>
                                    </a>
                                @endif
                                @if($contact->site)
                                    <a href="{{ $contact->site ?? '' }}"
                                       class="btn btn-light border-0 p-2 chrome"
                                       target="_blank">
                                        <i class="fa-brands fa-chrome fa-2xl"></i>
                                    </a>
                                @endif
                                @if($contact->name || $contact->address || $contact->description)
                                    <a data-bs-toggle="collapse"
                                       class="btn btn-light border-0 p-2"
                                       href="#desid{{ $contact->id }}" role="button"
                                       aria-expanded="false"
                                       aria-controls="desid{{ $contact->id }}">
                                        <i class="fa-solid fa-circle-info fa-2xl"></i>
                                    </a>
                                @endif
                            </div>
                            @if($contact->name || $contact->address || $contact->description)
                                <div class="collapse description p-4 text-start"
                                     id="desid{{ $contact->id }}">
                                    <p><i class="fa-solid fa-user me-2"></i>{{ $contact->name ?? '' }}</p>
                                    <p>
                                        <i class="fa-solid fa-location-dot me-2"></i>{{ $contact->address ?? '' }}
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-file-lines me-2"></i>{{ $contact->description ?? '' }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
