@foreach ($categories as $childrenItems)

    <option value="{{ $childrenItems->id }}"

       @if ($childrenItems->isRoot($childrenItems->id))
           style="font-weight: bold; color: red"
       @endif

      @if($childrenItems->children->count() > 0)
            style="font-weight: bold; color: blue"
      @endif

     @isset($category)

          @if ($category->parent_id == $childrenItems->id)
            selected=""
           @endif

           @if($category->id == $childrenItems->id)
               hidden=""
           @endif

        @endisset
    >{{ $prefix }} {{ $childrenItems->title }}</option>

    @isset($childrenItems->children)
        @include('admin.partials.categories.options', ['categories' => $childrenItems->children , 'prefix' => ' - ' . $prefix])
    @endisset

@endforeach
