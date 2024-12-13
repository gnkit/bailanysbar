@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col text-center p-2">
                <div class="container filter">
                    <button class="button btn btn-dark m-1 border-0" data-filter="all">
                        <span id="all" class="small">
                            @if (app()->getLocale() == 'en')
                                {{ $category->name_en ?? '' }}
                            @elseif(app()->getLocale() == 'ru')
                                {{ $category->name_ru ?? '' }}
                            @else
                                {{ $category->name ?? '' }}
                            @endif
                        </span>
                    </button>
                    @foreach ($category->children as $child)
                        <button class="button btn btn-light m-1 border-0" data-filter="{{ $child->slug }}">
                            <i class="{{ $child->icon ?? '' }}"></i>
                            <span class="small">
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

        <div class="row contacts row-cols-md-2 row-cols-1 g-3">
            @foreach ($contacts as $contact_child)
                @foreach ($contact_child as $contact)
                    <div class="col contact {{ $contact->category->slug }}">
                        <div class="card bg-light border-0">
                            <div class="row g-0 align-items-center">

                                <div class="col-4">
                                    <a href="{{ route('contact', $contact->id) }}" role="button">
                                        @if (null !== $contact->image)
                                            <img src="{{ asset('storage/images/' . $contact->image) }}"
                                                class="img-fluid rounded-start" alt="Avatar" />
                                        @endif
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-0">
                                        <a class="text-decoration-none text-dark w-100"
                                            href="{{ route('contact', $contact->id) }}" role="button">
                                            {{ $contact->title ?? '' }}
                                        </a>
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
