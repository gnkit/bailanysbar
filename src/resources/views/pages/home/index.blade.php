@extends('layouts.app')

@section('content')

    @include('partials.search')
    {{-- @include('partials.intro') --}}
    @include('partials.slider')

    <div class="row row-cols-4 row-cols-md-3 mb-4">

        @include('partials.flash_message')

        @foreach ($categories as $category)
            <div class="col text-center mb-2">
                <a class="text-dark text-decoration-none" href="{{ url('/category', [$category->id]) }}">
                    <div class="category card bg-light border-0 h-100">
                        <div class="card-body p-1 lh-1 p-md-3">
                            <i class="mb-2 fs-2 {{ $category->icon }}" style="color:{{ $category->color }}"></i>
                            <br>
                            <p class="m-0" style="font-size: 0.75rem;">
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
