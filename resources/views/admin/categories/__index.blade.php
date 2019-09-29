@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('categories'))

@section('title', 'Все категории')

@section('content')
    <div class="page-inner mt--2">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Все категории</div>
            </div>
            <div class="card-body">
                <div>
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-primary"> Добавить
                        категорию </a>
                    <a href="{{ route('removeAll') }}" class="btn btn-outline-danger"> Удалить все
                        категории </a>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название категории</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>

                    @forelse ($categories as $categoryItem)
                        <tr>
                            <td>{{ $categoryItem->id }}</td>
                            <td>{{ $categoryItem->title }}</td>
                            <td>{{ $categoryItem->slug }}</td>
                            <td>
                                <div class="custom-control-inline">

                                    <a href="{{ route('categories.edit', $categoryItem) }}"
                                       class="btn btn-icon btn-round btn-default m-1">
                                        <i class="fad fa-edit mt-2"></i>
                                    </a>

                                    <form action="{{ route('categories.destroy', $categoryItem->id) }}"
                                          method="post">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-round btn-default m-1">
                                            <i class="fad fa-trash-alt"></i>
                                        </button>
                                    </form>

                                    <button id="categoryIdSelect" type="submit" data-category="{{ $categoryItem->id }}"
                                            class="btn btn-icon btn-round btn-default m-1" data-toggle="modal"
                                            data-target="#{{ $categoryItem->id }}">
                                        <i class="fad fa-arrows-alt"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ $categoryItem->id  }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Позиционирование
                                                        категориями</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{ route('settings') }}" method="post">

                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-default btn-border"
                                                                            type="button"><i
                                                                            class="fad fa-arrow-up"></i>
                                                                    </button>
                                                                </div>
                                                                <input type="number" class="form-control" name="up">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-default btn-border"
                                                                            type="button"><i
                                                                            class="fad fa-arrow-down"></i>
                                                                    </button>
                                                                </div>
                                                                <input type="number" class="form-control" name="down">
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="categoryId"
                                                               value="{{ $categoryItem->id  }}" name="categoryId">

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Применить
                                                            </button>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </td>
                        </tr>

                    @empty
                        <td colspan="4" class="text-center">НЕТ КАТЕГОРИЙ</td>
                    @endforelse

                </table>
            </div>
        </div>
    </div>

@endsection
