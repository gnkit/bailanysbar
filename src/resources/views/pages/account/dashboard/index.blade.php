@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.dashboard') }}</h1>

            <div class="card border-0">
                <div class="card-body">
                    <p class="text-center">Сайттағы өзгерістер мен жаңалықтарды осы беттен оқи аласыз.</p>
                </div>
            </div>

        </div>
    </div>
@endsection
