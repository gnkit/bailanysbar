@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4 class="mb-3">{{ __('All Roles') }}</h4>
                        <!-- Button -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <a class="btn btn-dark" href="{{ route('roles.create') }}">{{ __('Create') }}</a>
                            </div>
                        </div>

                        @include('partials.flash_message')

                        @if(0 < $roles->count())
                            <!-- Main row -->
                            <div class="row px-2 mb-2">
                                <table class="table table-hover table-responsive table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Permissions') }}</th>
                                        <th scope="col">{{ __('Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <th class="col-1">{{ ++$i }}</th>
                                            <td class="col-2">{{ $role->name ?? '' }}</td>
                                            <td class="col-4">
                                                @foreach($role->permissions as $permission)
                                                    @if($loop->last)
                                                        {{ $permission->name ?? ''}}
                                                    @else
                                                        {{ $permission->name ?? ''}},
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-5">
                                                <form action="{{ route('roles.destroy', $role->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-success btn-sm"
                                                       href="{{ route('roles.edit', $role->id) }}">Edit</a>
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
                                {{ __('No Roles') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
