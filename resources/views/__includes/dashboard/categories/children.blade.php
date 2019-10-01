@foreach ($categories as $category)
    <option value="{{ $category->id }}"

            @if (isset($service))
               @if ($service->category_id == $category->id)
                 selected
               @endif
            @endif
            > {{ $prefix ?? '' }} {{ $category->title }}</option>
    @if ($category->children)
        @include('__includes.dashboard.categories.children', ['categories' => $category->children , 'prefix' => ' * ' . $prefix])
    @endif
@endforeach
