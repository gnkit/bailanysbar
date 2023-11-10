@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white p-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('messages.all_contacts') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('contacts.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('messages.new') }}
                </a>
            </div>

            @include('partials.flash_message')

            @if(0 < $contacts->count())
                <!-- Table -->
                <table class="table table-hover table-responsive table-sm table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('messages.title') }}</th>
                        <th scope="col">{{ __('messages.status') }}</th>
                        @role('manager')
                        <th scope="col">{{ __('messages.category') }}</th>
                        @endrole
                        <th scope="col">{{ __('messages.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="col-1">{{ ++$i }}</td>
                            <td class="col-4">
                                {{ str()->limit($contact->title, 25) ?? '' }}
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                    @if($notification->data['contact_id'] === $contact->id)
                                        <span class="badge bg-warning">{{ __('messages.unread') }}</span>
                                    @else
                                        {{ '' }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="col-2">
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
                                            ">{{ $contact->selectStatus($contact->status->value) ?? '' }}
                                        </span>
                            </td>
                            @role('manager')
                            <td class="col-2">{{ $contact->category->name ?? '' }}</td>
                            @endrole('manager')
                            <td class="col-3">
                                <form action="{{ route('contacts.destroy', $contact->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @role('manager')
                                    <a class="btn btn-outline-secondary btn-sm"
                                       href="{{ route('contacts.show', $contact->id) }}"><i class="fa-solid fa-eye"></i></a>
                                    @endrole
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('contacts.edit', $contact->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-start">
                    {{ __('messages.no_contacts') }}
                </p>
            @endif
            <!-- Pagination -->
            {{ $contacts->links() }}
        </div>
    </div>
@endsection
