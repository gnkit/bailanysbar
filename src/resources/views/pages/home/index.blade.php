@extends('layouts.app')

@section('content')

    @include('partials.intro')

    <div class="container">
        <div class="row g-2">
            @foreach ($categories as $category)
                <div class="col-6">
                    <a class="text-white text-decoration-none lead" href="{{ url('/category' , [$category->id]) }}">
                        <div class="card text-bg-success">
                            <div class="card-body text-center">
                                <div class="">
                                    <i class="{{ $category->icon }}"></i>
                                    <br>
                                    <span class="small fw-bolder"> {{ $category->name ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
