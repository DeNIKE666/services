@foreach ($categories as $categoriesItem)

    <a class="nav-link" href="{{ route('categories.edit', $categoriesItem) }}">{{ $prefix ?? '' }} {{ $categoriesItem->title }}
        @if ($categoriesItem->children->count() > 0)
            ( {{ $categoriesItem->children->count() }} )
        @endif
    </a>

    @isset($categoriesItem->children)
        @include('admin.partials.categories.categoriesList', [
             'categories' => $categoriesItem->children ,
             'prefix' => ' - ' . $prefix,
        ])
    @endisset

@endforeach
