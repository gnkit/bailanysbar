@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.sidebar')

            <div class="col-sm-9 bg-white p-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4 class="mb-3">{{ __('All Categories') }}</h4>
                        <!-- Button -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <a class="btn btn-dark" href="{{ route('categories.create') }}">{{ __('Create') }}</a>
                            </div>
                        </div>

                        @include('partials.flash_message')

                        @if(0 < $categories->count())
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
                                                       href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete
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
                            </div>
                            <!-- /.row (main row) -->
                        @else
                            <div class="row">
                                {{ __('No Categories') }}
                            </div>
                        @endif
                        <!-- Pagination -->
                        <div class="row">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
