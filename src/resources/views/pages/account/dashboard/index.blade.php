@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('messages.dashboard') }}</h1>

        </div>

    </div>
@endsection
