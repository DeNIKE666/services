<div class="submit-field">
    <h5>Категории</h5>
    <select id="category" class="selectpicker with-border" data-size="7" title="Выберите категорию" name="category_id">
        @foreach ($categories as $category)
            <option style="font-weight: bold"  value="{{ $category->id }}">{{ $category->title }} </option>
            @include('__includes.dashboard.categories.children', ['categories' => $category->children , 'prefix' => '*'])
        @endforeach
    </select>
</div>

@push('scripts')
    <script>
        var category = $('#category').on('change' , function () {
            window.location = "/category/" + category.val();
        })
    </script>
@endpush
