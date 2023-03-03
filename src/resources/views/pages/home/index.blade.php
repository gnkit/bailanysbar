@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row g-2 categories">
            @foreach ($categories as $category)
                <div class="col-6">
                    <div class="category">
                        <a class="" href="{{ url('/category' , [$category->id]) }}">
                            <div class="">
                                <i class="{{ $category->icon }}"></i>
                                <br>
                                {{ $category->name ?? '' }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
