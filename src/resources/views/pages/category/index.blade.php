@extends('layouts.app')

@section('content')
    <div class="row gx-5">

        @include('partials.sidebar')

        <div class="col-sm-9 bg-white py-4">

            <!-- Title -->
            <h1 class="mb-4">{{ __('All Categories') }}</h1>

            <!-- Button -->
            <div class="text-end mb-4">
                <a class="btn btn-success" href="{{ route('categories.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('New Category') }}
                </a>
            </div>

            @include('partials.flash_message')

            @if(0 < $categories->count())
                <!-- Table -->
                <table class="table table-hover table-responsive table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr style="background-color: #adb5bd">
                            <th class="col-1">{{ ++$i }}</th>
                            <td class="col-5">{{ $category->name ?? '' }}</td>
                            <td class="col-6">
                                <form action="{{ route('categories.destroy', $category->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('categories.edit', $category->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @if(0 < $category->children->count())
                            @include('pages.category.subCategories', ['subCategories'=> $category->children])
                        @endif
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-start">
                    {{ __('No Contacts') }}
                </p>
            @endif
            <!-- Pagination -->
            {{ $categories->links() }}
        </div>
    </div>
@endsection
