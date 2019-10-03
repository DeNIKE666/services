@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('categories.create'))

@section('title', 'Все категории')

@section('content')
    <div class="page-inner mt--2">
        <div class="card" id="block">
            <div class="card-header">
                <div class="card-title">Добавить категорию</div>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    @include('admin.partials.categories.categories', ['option' => true])

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
