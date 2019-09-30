@extends('layouts.dashboard')

@section('title' , 'Редактирование кслуги')

@section('breadcrumbs' , Breadcrumbs::view('__includes.dashboard.breadcrumbs' , 'edit' , $service))

@section('content')

    <!-- Row -->
    <div class="row">

        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

                <div class="content with-padding padding-bottom-10">

                    <form action="{{ route('service.update', $service) }}" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Название</h5>
                                    <input type="text" class="with-border" name="title" placeholder="Название вашей услуги" value="{{ $service->title }}">
                                </div>
                            </div>

                            <div class="col-xl-4">
                                @include('__includes.dashboard.categories.option')
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Стоимость</h5>
                                    <input type="text" class="with-border" name="amount" placeholder="стоимость услуги" value="{{ $service->amount }}">
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Описание</h5>
                                    <textarea cols="30" rows="5" name="body" class="with-border" placeholder="Опишите подробно услугу, которую хотите предложить..">{{ $service->body }}</textarea>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Картинка</h5>
                                    <div class="avatar-wrapper">
                                        <img class="profile-pic" src="{{ asset($service->image()) }}" alt=""/><div class="upload-button"></div>
                                        <input class="file-upload" type="file" name="image" accept="image/*"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="uploadButton margin-bottom-30">
                                    <input class="uploadButton-input" value="342423" type="file" name="file" id="upload">
                                    <label class="uploadButton-button ripple-effect" for="upload">Загрузить</label>
                                    <span class="uploadButton-file-name">
                                        @if ($service->file())
                                            <a href="{{ asset($service->file()) }}">прикреплённый файл</a>
                                        @else
                                            прикрепите файл инструкций пользователю для ознакомлений
                                        @endif
                                    </span>
                                </div>
                            </div>


                            <div class="col-xl-12 margin-bottom-20">
                                <button type="submit" class="button ripple-effect big"><i class="fal fa-edit"></i> Обновить данные</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Row / End -->
@endsection
