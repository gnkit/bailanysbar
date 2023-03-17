@extends('layouts.app')

@section('content')
        <div class="row gx-5">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white py-4">
                <!-- Title -->
                <h1 class="mb-4">{{ __('All Contacts') }}</h1>

                <!-- Button -->
                <div class="text-end mb-4">
                    <a class="btn btn-success" href="{{ route('contacts.create') }}">
                        <i class="fa-solid fa-plus"></i>
                        {{ __('New Contact') }}
                    </a>
                </div>

                @include('partials.flash_message')

                @if(0 < $contacts->count())
                    <!-- Table -->
                    <table class="table table-hover table-responsive table-sm table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="col-1">{{ ++$i }}</td>
                                <td class="col-3">{{ $contact->title ?? '' }}</td>
                                <td class="col-3">
                                    <span class="badge
                                        @switch($contact->status->value)
                                            @case('pending')
                                                bg-info
                                                @break

                                            @case('published')
                                                bg-success
                                                @break

                                            @case('draft')
                                                bg-secondary
                                                @break

                                            @case('canceled')
                                                bg-dark
                                                @break

                                            @default
                                                bg-warning

                                        @endswitch
                                        ">{{ $contact->status->value ?? '' }}
                                    </span>
                                </td>
                                <td class="col-5">
                                    <form action="{{ route('contacts.destroy', $contact->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-secondary btn-sm"
                                           href="{{ route('contacts.show', $contact->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <a class="btn btn-success btn-sm"
                                           href="{{ route('contacts.edit', $contact->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-start">
                        {{ __('No Contacts') }}
                    </p>
                @endif
                <!-- Pagination -->
                {{ $contacts->links() }}
            </div>
        </div>
@endsection
