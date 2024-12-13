@extends('layouts.app')

@section('content')
    <div class="row">

        @include('partials.sidebar')

        <div class="col p-2">

            <!-- Title -->
            <h1 class="mb-2 fs-4 fw-bold text-end">{{ __('messages.all_categories') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('categories.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('messages.new') }}
                </a>
            </div>

            @include('partials.flash_message')

            <div class="card border-0">
                <div class="card-body">
                    @if (0 < $categories->count())
                        <!-- Table -->
                        <table class="table table-hover table-responsive table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('messages.name') }}</th>
                                    <th scope="col">{{ __('messages.color') }}</th>
                                    <th scope="col">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th class="col-1">{{ ++$i }}</th>
                                        <td class="col-8">{{ $category->name ?? '' }}</td>
                                        <td class="col-8">
                                            <input type="color" value="{{ $category->color ?? '' }}" readonly disabled>
                                        </td>
                                        <td class="col-3">
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-dark btn-sm"
                                                        href="{{ route('categories.edit', $category->id) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button type="submit" class="btn btn-outline-dark btn-sm"><i
                                                            class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @if (0 < $category->children->count())
                                        @include('pages.category.subCategories', [
                                            'subCategories' => $category->children,
                                        ])
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-start">
                            {{ __('messages.no_categories') }}
                        </p>
                    @endif
                    <!-- Pagination -->
                    {{ $categories->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
