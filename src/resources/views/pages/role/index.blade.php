@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.all_roles') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('roles.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('messages.new') }}
                </a>
            </div>

            @include('partials.flash_message')

            <div class="card border-0">
                <div class="card-body">
                    @if (0 < $roles->count())
                        <!-- Table -->
                        <table class="table table-hover table-responsive table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('messages.name') }}</th>
                                    <th scope="col">{{ __('messages.permissions') }}</th>
                                    <th scope="col">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th class="col-1">{{ ++$i }}</th>
                                        <td class="col-4">{{ $role->name ?? '' }}</td>
                                        <td class="col-4">
                                            @foreach ($role->permissions as $permission)
                                                @if ($loop->last)
                                                    {{ $permission->name ?? '' }}
                                                @else
                                                    {{ $permission->name ?? '' }},
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="col-3">
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('roles.edit', $role->id) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-start">
                            {{ __('messages.no_roles') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
@endsection
