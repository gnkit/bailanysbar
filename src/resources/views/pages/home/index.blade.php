@extends('layouts.app')

@section('content')

    @include('partials.intro')

    <div class="container">
        <div class="row g-2">

            @include('partials.flash_message')

            @foreach ($categories as $category)
                <div class="col-6">
                    <a class="text-dark text-decoration-none" href="{{ url('/category' , [$category->id]) }}">
                        <div class="category card bg-light border-0 h-100">
                            <div class="card-body text-center">
                                <div class="my-2">
                                    <i class="fs-2 mb-2 {{ $category->icon }}"></i>
                                    <br>
                                    <p class="card-text">
                                        @if(app()->getLocale() == 'en')
                                            {{ $category->name_en ?? '' }}
                                        @elseif( app()->getLocale() == 'ru' )
                                            {{ $category->name_ru ?? '' }}
                                        @else
                                            {{ $category->name ?? '' }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
