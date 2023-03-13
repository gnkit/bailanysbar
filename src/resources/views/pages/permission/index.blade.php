@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4 class="mb-3">{{ __('All Permissions') }}</h4>
                        <!-- Button -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <a class="btn btn-dark" href="{{ route('permissions.create') }}">{{ __('Create') }}</a>
                            </div>
                        </div>

                        @include('partials.flash_message')

                        @if(0 < $permissions->count())
                            <!-- Main row -->
                            <div class="row px-2 mb-2">
                                <table class="table table-hover table-responsive table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <th class="col-1">{{ ++$i }}</th>
                                            <td class="col-5">{{ $permission->name ?? '' }}</td>
                                            <td class="col-6">
                                                <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-success btn-sm"
                                                       href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
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
                                {{ __('No Permissions') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
