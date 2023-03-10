@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        @include('partials.flash_message')

                        <h4 class="mb-3">{{ __('User') }}</h4>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="col">
                                    <div class="card border-secondary mb-3">
                                        <div class="card-header">{{ __('Primary Info') }}</div>
                                        <div class="card-body">
                                            <p class="card-text"><i
                                                    class="fa-regular fa-user me-2"></i>{{ $user->name ?? '' }}
                                            </p>
                                            <p class="card-text"><i
                                                    class="fa-regular fa-envelope me-2"></i>{{ $user->email ?? '' }}
                                            </p>
                                            <p class="card-text"><i
                                                    class="fa-regular fa-heart me-2"></i>{{ $user->status ?? '' }}
                                            </p>
                                            <p class="card-text"><i
                                                    class="fa-regular fa-pen-to-square me-2"></i>{{ $user->role->name ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col">
                                    <div class="card border-secondary mb-3">
                                        <div class="card-header">{{ __('Secondary Info') }}</div>
                                        <div class="card-body">
                                            @if(0 < $user->contacts->count())
                                                <ol class="list-group list-group-numbered list-group-flush">
                                                    @foreach($user->contacts as $contact)
                                                        <li class="list-group-item list-group-item-action">
                                                            <a class="text-decoration-none link-dark" href="{{ route('contacts.show', $contact) }}">
                                                                {{ $contact->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row g-3">

                                <div class="col">
                                    <a class="w-100 btn btn-info btn-lg"
                                       href="{{ route('users.edit', $user->id) }}"
                                       type="submit">{{ __('Edit') }}</a>
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
