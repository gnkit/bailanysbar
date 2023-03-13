@extends('layouts.app')

@section('content')

    @include('partials.intro')

    <div class="container">
        <div class="row g-2 categories">
            @foreach ($categories as $category)
                <div class="col-6">
                    <div class="category">
                        <a class="" href="{{ url('/category' , [$category->id]) }}">
                            <div class="">
                                <i class="{{ $category->icon }}"></i>
                                <br>
                                <span class="small fw-bolder"> {{ $category->name ?? '' }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
