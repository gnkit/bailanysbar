@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col text-center p-4">
                <div class="container filter">
                    <button class="button btn btn-primary m-1 border-0" data-filter="all">
                        <span id="all" class="lead">{{ $category->name }}</span>
                    </button>
                    @foreach($category->children as $child)
                        <button class="button btn btn-secondary m-1 border-0" data-filter="{{ $child->slug }}">
                            <i class="{{ $child->icon ?? '' }}"></i>
                            <span class="lead">{{ $child->name }}</span>
                        </button>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="row g-2 contacts">
            @foreach($contacts as $contact_child)
                @foreach($contact_child as $contact)
                    <div class="contact col-md-6 col-sm-12 {{ $contact->category->slug }}">
                        <div class="card bg-success border-0">
                            <div class="card-body text-center">
                                @if(null !== $contact->image)
                                    <img src="{{ asset('storage/images/' . $contact->image) }}"
                                         class="top-0 end-0 rounded-circle p-1 card-img-top"
                                         alt="Avatar" style="height: 5rem; width: 5rem;"/>
                                @endif
                                <br>
                                <a class="p-2 text-white text-decoration-none lead w-100" data-bs-toggle="collapse"
                                   href="#socid{{ $contact->id }}" role="button" aria-expanded="false"
                                   aria-controls="#socid{{ $contact->id }}">
                                    {{ $contact->title ?? '' }}
                                </a>
                                <div class="collapse" id="socid{{ $contact->id }}">
                                    <div
                                        class="socials p-4 text-white text-center row flex-wrap justify-content-center gap-2">
                                        <a href="tel:{{ $contact->phone ?? '' }}"
                                           class="btn btn-square btn-light border-0 text-success phone"
                                           style="padding-top: 30px"
                                           target="_blank">
                                            <i class="fa-solid fa-square-phone fa-2xl"></i>
                                        </a>
                                        <a href="https://wa.me/{{ $contact->whatsapp ?? '' }}"
                                           class="btn btn-square btn-light border-0 text-success whatsapp"
                                           style="padding-top: 30px"
                                           target="_blank">
                                            <i class="fa-brands fa-whatsapp fa-2xl"></i>
                                        </a>
                                        <a href="https://ig.me/m/{{ $contact->instagram ?? '' }}"
                                           class="btn btn-square btn-light border-0 text-success instagram"
                                           style="padding-top: 30px"
                                           target="_blank">
                                            <i class="fa-brands fa-instagram fa-2xl"></i>
                                        </a>
                                        <a href="https://t.me/{{ $contact->telegram ?? '' }}"
                                           class="btn btn-square btn-light border-0 text-success telegram"
                                           style="padding-top: 30px"
                                           target="_blank">
                                            <i class="fa-brands fa-telegram fa-2xl"></i>
                                        </a>
                                        <a href="{{ $contact->site ?? '' }}"
                                           class="btn btn-square btn-light border-0 text-success chrome"
                                           style="padding-top: 30px"
                                           target="_blank">
                                            <i class="fa-brands fa-chrome fa-2xl"></i>
                                        </a>
                                        <a data-bs-toggle="collapse"
                                           class="btn btn-square btn-light border-0 text-success"
                                           style="padding-top: 30px"
                                           href="#desid{{ $contact->id }}" role="button"
                                           aria-expanded="false"
                                           aria-controls="desid{{ $contact->id }}">
                                            <i class="fas fa-ellipsis-h fa-2xl"></i>
                                        </a>
                                    </div>
                                    <div class="collapse description p-4 text-start text-white"
                                         id="desid{{ $contact->id }}">
                                        <p><i class="fa-solid fa-user me-2"></i>{{ $contact->name ?? '' }}</p>
                                        <p><i class="fa-solid fa-location-dot me-2"></i>{{ $contact->address ?? '' }}
                                        </p>
                                        <p><i class="fa-solid fa-file-lines me-2"></i>{{ $contact->description ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

    </div>
@endsection
