{{ $prefix = '' }}

@isset ($option)
    <div class="form-group form-group">
        <label>Выбор категории</label>
        <select class="form-control" name="parent_id">
            <option value=""> ВЫБОР КАК РОДИТЕЛЬСКАЯ КАТЕГОРИЯ</option>
             @include('admin.partials.categories.options')
        </select>
    </div>
@endisset

@isset ($list)
    <div id="basicList" class="card-list">
        <div class="list">
            @foreach ($categories as $categoriesItem)
                <div class="item-list">

                    <!--<div class="avatar">
                        <img src="" alt="..." class="avatar-img rounded-circle">
                    </div>-->

                    <div class="info-user ml-3">
                        <a href="{{ route('categories.edit', $categoriesItem) }}" class="username">{{ $categoriesItem->title }}</a>
                        <div class="status">
                            Подкатегорий: {{ $categoriesItem->descendantsOf($categoriesItem)->count() }}
                        </div>
                    </div>

                    <button class="btn btn-icon btn-primary btn-round btn-sm ml-4" type="button" data-toggle="collapse" data-target="#{{$categoriesItem->id}}" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-plus"></i>
                    </button>

                    <a href="{{ route('up', $categoriesItem) }}" class="btn btn-icon btn-primary btn-round btn-sm ml-4">
                        <i class="fas fa-level-up"></i>
                    </a>

                    <a href="{{ route('down', $categoriesItem) }}"
                       class="btn btn-icon btn-primary btn-round btn-sm ml-4">
                        <i class="fas fa-level-down"></i>
                    </a>

                    <a href="{{ route('remove', $categoriesItem) }}"
                       class="btn btn-icon btn-primary btn-round btn-sm ml-4">
                        <i class="fad fa-trash"></i>
                    </a>
                </div>

                <div class="collapse" id="{{$categoriesItem->id}}">
                    @include('admin.partials.categories.categoriesList', [ 'categories' => $categoriesItem->children, 'prefix' => '' ])
                </div>
            @endforeach

            @empty($categories->count())
                НЕТ КАТЕГОРИЙ
            @endempty

        </div>
    </div>
@endisset

