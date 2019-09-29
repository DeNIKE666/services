@foreach ($categories as $category)
    <option value="{{ $category->id }}"> {{ $prefix ?? '' }} {{ $category->title }}</option>
    @if ($category->children)
        @include('__includes.dashboard.categories.children', ['categories' => $category->children , 'prefix' => ' * ' . $prefix])
    @endif
@endforeach
