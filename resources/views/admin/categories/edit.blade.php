@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('categories.edit', $category))

@section('title', 'Редактирование категории')

@section('content')
    <div class="page-inner mt--2">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="post">

                    @method('PUT')

                    <div class="form-group">
                        <label for="category_title">Название категории</label>
                        <input type="text" class="form-control" id="category_title" name="title" value="{{ $category->title }}">
                    </div>

                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ $category->image }}">
                    </div>

                    @include('admin.partials.categories.categories', ['option' => true])

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
