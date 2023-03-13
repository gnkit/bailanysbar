@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4 class="mb-3">{{ __('All Contacts') }}</h4>
                        <!-- Button -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <a class="btn btn-dark" href="{{ route('contacts.create') }}">{{ __('Create') }}</a>
                            </div>
                        </div>

                        @include('partials.flash_message')

                        @if(0 < $contacts->count())
                            <!-- Main row -->
                            <div class="row px-2 mb-2">
                                <table class="table table-hover table table-responsive table-sm">
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
                                            <td class="col-3">{{ $contact->status->value ?? '' }}</td>
                                            <td class="col-5">
                                                <form action="{{ route('contacts.destroy', $contact->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-outline-secondary btn-sm"
                                                       href="{{ route('contacts.show', $contact->id) }}">Show</a>
                                                    <a class="btn btn-success btn-sm"
                                                       href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.row (main row) -->
                        @else
                            <div class="row">
                                {{ __('No Contacts') }}
                            </div>
                        @endif
                        <!-- Pagination -->
                        <div class="row">
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
