@foreach ($children as $childrenItem)
    <ul>
        <li><a href="{{ route('category.show', $childrenItem) }}"> {{ $childrenItem->title}} ( {{ $childrenItem->services->count() }} )</a></li>

        @if ($childrenItem->children)
            @include('__includes.frontend.categories.children', ['children' => $childrenItem->children ])
        @endif
    </ul>

@endforeach
