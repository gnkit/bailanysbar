@foreach ($subCategories as $subCategory)
    <tr>
        <th class="col-1" style="padding-left:{{ $loop->depth/2 }}rem">
            @for ($i = 0; $i < $loop->depth; $i++)
                {!! '&middot;' !!}
            @endfor
        </th>
        <td class="col-5">{{ $subCategory->name ?? '' }}</td>
        <td class="col-6">
            <form action="{{ route('categories.destroy', $subCategory->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <a class="btn btn-success btn-sm"
                   href="{{ route('categories.edit', $subCategory->id) }}"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i
                        class="fa-solid fa-trash-can"></i>
                </button>
            </form>
        </td>
    </tr>
    @if(0 < $subCategory->children->count())
        @include('pages.category.subCategories', ['subCategories'=> $subCategory->children])
    @endif
@endforeach
