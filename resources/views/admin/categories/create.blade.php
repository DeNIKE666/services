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

                    <div class="input-file input-file-image">
                        <img class="img-upload-preview img-circle" width="100" height="100" src="https://placehold.it/100x100" alt="preview">
                        <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" required="">
                        <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a Image</label>
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
