@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4 class="mb-3">{{ __('All Users') }}</h4>
                        <!-- Button -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <a class="btn btn-dark" href="{{ route('users.create') }}">{{ __('Create') }}</a>
                            </div>
                        </div>

                        @include('partials.flash_message')

                        @if(0 < $users->count())
                            <!-- Main row -->
                            <div class="row px-2 mb-2">
                                <table class="table table-hover table table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Role') }}</th>
                                        <th scope="col">{{ __('Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="col-1">{{ ++$i }}</td>
                                            <td class="col-2">{{ $user->name ?? '' }}</td>
                                            <td class="col-2">{{ $user->status ?? '' }}</td>
                                            <td class="col-2">{{ $user->role->name ?? '' }}</td>
                                            <td class="col-5">
                                                <form action="{{ route('users.destroy', $user->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{ route('users.show', $user->id) }}">Show</a>
                                                    <a class="btn btn-success btn-sm"
                                                       href="{{ route('users.edit', $user->id) }}">Edit</a>
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
                                {{ __('No Users') }}
                            </div>
                        @endif
                        <!-- Pagination -->
                        <div class="row">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
