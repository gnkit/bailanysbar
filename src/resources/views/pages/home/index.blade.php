@extends('layouts.app')

@section('content')

    @include('partials.search')
    {{-- @include('partials.intro') --}}
    @include('partials.slider')

    <div class="row row-cols-4 mb-4">

        @include('partials.flash_message')

        @foreach ($categories as $category)
            <div class="col text-center mb-2">
                <a class="text-dark text-decoration-none" href="{{ url('/category', [$category->id]) }}">
                    <div class="category card bg-light border-0 h-100">
                        <div class="card-body p-1 lh-1">
                            <i class="mb-2 fs-2 text-dark {{ $category->icon }}" style="color:{{ $category->color }}"></i>
                            <br>
                            <p class="m-0">
                                @if (app()->getLocale() == 'en')
                                    {{ $category->name_en ?? '' }}
                                @elseif(app()->getLocale() == 'ru')
                                    {{ $category->name_ru ?? '' }}
                                @else
                                    {{ $category->name ?? '' }}
                                @endif
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
