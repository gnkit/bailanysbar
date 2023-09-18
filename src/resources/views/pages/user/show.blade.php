@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('User') }}</h1>

            <!-- Content -->
            <div class="row g-3">
                <div class="col-md-8 col-sm-12 col-lg-6">
                    <div class="card shadow-lg">
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

                            <hr class="my-4">

                            <p class="card-text fw-bold text-center">{{ __('User\'s Contacts') }}</p>

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

                            <hr class="my-4">

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row g-3">

                                    <div class="col">
                                        <a class="w-100 btn btn-secondary"
                                           href="{{ route('users.edit', $user->id) }}"
                                           type="submit">{{ __('Edit') }}</a>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn btn-danger"
                                                type="submit">{{ __('Delete') }}</button>
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
