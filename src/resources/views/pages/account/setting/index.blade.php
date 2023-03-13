@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <h4 class="mb-3">{{ __('Account') }}</h4>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="col">
                                    <div class="card border-secondary mb-3">
                                        <div class="card-header">{{ __('Account Info') }}</div>
                                        <div class="card-body">
                                            <p class="card-text"><i class="fa-regular fa-circle-user me-2"></i>{{ $account->name ?? '' }}
                                            </p>
                                            <p class="card-text"><i class="fa-regular fa-envelope me-2"></i>{{ $account->email ?? '' }}
                                            </p>
                                            <p class="card-text"><i
                                                    class="fa-regular fa-heart me-2"></i>{{ $account->status ?? '' }}
                                            </p>
                                            <p class="card-text"><i class="fa-regular fa-pen-to-square me-2"></i>{{ $account->role->name ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">
                        <form action="{{ route('users.destroy', $account->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row g-3">

                                <div class="col">
                                    <a class="w-100 btn btn-secondary btn-lg"
                                       href="{{ route('password.reset', $account->id) }}"
                                       type="submit">{{ __('Reset Password') }}</a>
                                </div>
                                <div class="col">
                                    <button class="w-100 btn btn-danger btn-lg"
                                            type="submit">{{ __('Delete') }}</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
