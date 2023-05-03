@extends('layouts.app')

@section('content')
    <div class="row gx-5">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('Account') }}</h1>
            
            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <p class="card-text"><i class="fa-regular fa-circle-user me-2"></i>{{ $account->name ?? '' }}</p>
                            <p class="card-text"><i class="fa-regular fa-envelope me-2"></i>{{ $account->email ?? '' }}</p>
                            <p class="card-text"><i class="fa-regular fa-heart me-2"></i>{{ $account->status ?? '' }}</p>
                            <p class="card-text"><i class="fa-regular fa-pen-to-square me-2"></i>{{ $account->role->name ?? '' }}</p>
                            
                            <hr class="my-4">

                            <form action="{{ route('users.destroy', $account->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row g-3">
                                    <div class="col">
                                        <a class="w-100 btn btn-secondary"
                                           href="{{ route('password.reset', $account->id) }}"
                                           type="submit">{{ __('Reset Password') }}</a>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-danger"
                                                type="submit">{{ __('Account Delete') }}</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>          

        </div>

    </div>
@endsection
