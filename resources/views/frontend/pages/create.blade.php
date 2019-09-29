@extends('layouts.frontend')

@section('title' , 'Добавление услуги')

@section('content')
    <!-- Dashboard Content
	================================================== -->
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Создание новой услуги</h3>
            </div>

            <form action="{{ route('services.create') }}" method="post">
            <!-- Row -->
            <div class="row">
                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <div class="content with-padding padding-bottom-10">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Название услуги</h5>
                                            <input type="text" class="with-border" name="title">
                                        </div>
                                    </div>


                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Выбор категории</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                    title="Выберите категорию" name="category_id">
                                                @foreach ($categories as $categoryItem)
                                                    <option
                                                        value="{{ $categoryItem->id }}">{{ $categoryItem->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Описание услуги</h5>
                                            <textarea cols="30" rows="5" class="with-border" name="body"></textarea>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Добавить </button>
                </div>

            </div>
            <!-- Row / End -->
            </form>
            <!-- Footer -->

        </div>
    </div>
    <!-- Dashboard Content / End -->

@endsection
