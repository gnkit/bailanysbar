@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container filter">
            <button class="button button" data-filter="all">Барлығы</button>
            @foreach($category->children as $child)
                <button class="button button" data-filter="{{ $child->slug }}">
                    <i class="{{ $child->icon ?? '' }}"></i>
                    {{ $child->name }}
                </button>
            @endforeach
        </div>
        <div class="container contacts">
            @foreach($contacts as $contact_child)
                @foreach($contact_child as $contact)
                    <div class="row contact {{ $contact->category->slug }}">
                        <a data-bs-toggle="collapse" href="#socid{{ $contact->id }}" role="button" aria-expanded="false"
                           aria-controls="socid{{ $contact->id }}">
                            <h5 class="h5 text-light">
                                {{ $contact->title ?? '' }}
                            </h5>
                        </a>
                        <hr>
                        <div class="collapse" id="socid{{ $contact->id }}">
                            <div class="socials">
                                <a href="tel:{{ $contact->phone ?? '' }}" class="" target="_blank">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                </a>
                                <a href="https://wa.me/{{ $contact->whatsapp ?? '' }}" class="" target="_blank">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                                <a href="https://ig.me/m/{{ $contact->instagram ?? '' }}" class="" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="https://t.me/{{ $contact->telegram ?? '' }}" class="" target="_blank">
                                    <i class="fa-brands fa-telegram"></i>
                                </a>
                                <a href="{{ $contact->site ?? '' }}" class="" target="_blank">
                                    <i class="fa-brands fa-chrome"></i>
                                </a>
                                <a data-bs-toggle="collapse" href="#desid{{ $contact->id }}" role="button"
                                   aria-expanded="false"
                                   aria-controls="desid{{ $contact->id }}">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse description" id="desid{{ $contact->id }}">
                            <hr>
                            <p><i class="fa-solid fa-user"></i>{{ $contact->name ?? '' }}</p>
                            <p><i class="fa-solid fa-location-dot"></i>{{ $contact->address ?? '' }}</p>
                            <p><i class="fa-solid fa-file-lines"></i>{{ $contact->description ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
