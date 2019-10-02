@extends('layouts.dashboard')

@section('title' , 'Добавление услуги')

@section('breadcrumbs' , Breadcrumbs::view('__includes.dashboard.breadcrumbs' , 'create'))

@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <div class="content with-padding padding-bottom-10">
                    <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Название</h5>
                                    <input type="text" class="with-border" name="title" placeholder="Название вашей услуги" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                @include('__includes.dashboard.categories.option')
                            </div>
                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Стоимость</h5>
                                    <input type="text" class="with-border" name="amount" placeholder="стоимость услуги" value="{{ old('amount') }}">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Описание</h5>
                                    <textarea cols="30"  maxlength="2000" rows="5" name="body" id="txtTinyMCE" class="with-border" placeholder="Опишите подробно услугу, которую хотите предложить..">{{ old('body') }}</textarea>
                                    <p id="char"></p>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Картинка</h5>
                                    <div class="avatar-wrapper">
                                        <img class="profile-pic" src="{{ asset('assets/frontend/img/no_image.png') }}" alt=""/><div class="upload-button"></div>
                                        <input class="file-upload" type="file" name="image" accept="image/*"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="uploadButton margin-bottom-30">
                                    <input class="uploadButton-input" type="file" name="file" id="upload">
                                    <label class="uploadButton-button ripple-effect" for="upload">Загрузить</label>
                                    <span class="uploadButton-file-name">прикрепите файл инструкций пользователю для ознакомлений </span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <button type="submit" class="button ripple-effect big margin-bottom-20"><i class="fal fa-plus"></i> Опубликовать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
