@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col text-center p-4">
                <div class="container filter">
                    <button class="button btn btn-dark m-1 border-0" data-filter="all">
                        <span id="all" class="lead">
                            @if(app()->getLocale() == 'en')
                                {{ $category->name_en ?? '' }}
                            @elseif( app()->getLocale() == 'ru' )
                                {{ $category->name_ru ?? '' }}
                            @else
                                {{ $category->name ?? '' }}
                            @endif
                        </span>
                    </button>
                    @foreach($category->children as $child)
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
            @foreach($contacts as $contact_child)
                @foreach($contact_child as $contact)
                    <div class="contact col-lg-4 col-md-6 col-12 {{ $contact->category->slug }}">
                        <div class="card bg-light border-0">
                            <div class="card-body text-center">
                                @if(null !== $contact->image)
                                    <img src="{{ asset('storage/images/' . $contact->image) }}"
                                         class="top-0 end-0 rounded-circle card-img-top p-1"
                                         alt="Avatar" style="height: 5rem; width: 5rem;"/>
                                @endif
                                <br>
                                <a class="p-2 text-decoration-none text-dark w-100"
                                   href="{{ route('contact', $contact->id) }}" role="button">
                                    {{ $contact->title ?? '' }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

    </div>
@endsection
