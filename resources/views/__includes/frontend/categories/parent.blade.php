@foreach ($categories as $catsRootItem)
    <ul>
        <li><a href="{{ route('category.show', $catsRootItem) }}"> {{ $catsRootItem->title}}</a></li>
        @if ($catsRootItem->children)
            @include('__includes.frontend.categories.children', ['children' => $catsRootItem->children , 'prefix' => ' - ' . $prefix])
        @endif
    </ul>
@endforeach
