@extends('layouts.app')

@section('content')
    <div class="row gx-5">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white py-4">
            <!-- Title -->
            <h1 class="mb-4">{{ __('All Roles') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('roles.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('New Role') }}
                </a>
            </div>

            @include('partials.flash_message')

            @if(0 < $roles->count())
                <!-- Table -->
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
                                       href="{{ route('roles.edit', $role->id) }}"><i
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
                    {{ __('No Roles') }}
                </p>
            @endif
        </div>
    </div>
@endsection
