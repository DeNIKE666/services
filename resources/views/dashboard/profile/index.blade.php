@extends('layouts.dashboard')

@section('title', 'Профиль')

@section('breadcrumbs', Breadcrumbs::view('__includes.dashboard.breadcrumbs' , 'profile'))

@section('content')

    <!-- Row -->
    <div class="row">

      <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

                <div class="content with-padding padding-bottom-0">

                    <div class="row">

                        <div class="col-auto">
                            <div class="avatar-wrapper" data-tippy-placement="bottom" title="Изменить аватар">
                                <img class="profile-pic" src="{{ asset($user->avatar() ) }}" alt="" />
                                <div class="upload-button"></div>
                                <input class="file-upload" name="avatar" type="file" accept="image/*"/>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Имя</h5>
                                        <input type="text" class="with-border" value="{{ auth()->user()->name }}" name="name">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Почта</h5>
                                        <input type="text" class="with-border" value="{{ auth()->user()->email }}" name="email">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Новый пароль</h5>
                                        <input type="password" class="with-border" name="password">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Повторите пароль</h5>
                                        <input type="password" class="with-border" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <!-- Account Type -->
                                    <div class="submit-field">
                                        <h5>Тип аккаунта</h5>
                                        <div class="account-type">
                                            <div>
                                                <input type="radio" name="profile_type" value="0" id="freelancer-radio" class="account-type-radio" @if (auth()->user()->profile_type == 0) checked @endif/>
                                                <label for="freelancer-radio" class="ripple-effect-dark"><i class="fal fa-user-shield"></i> Покупатель</label>
                                            </div>

                                            <div>
                                                <input type="radio" name="profile_type" value="1" id="employer-radio" class="account-type-radio" @if (auth()->user()->profile_type == 1) checked @endif/>
                                                <label for="employer-radio" class="ripple-effect-dark"><i class="fal fa-business-time"></i> Продавец</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="col-xl-12">
            <button type="submit" href="#" class="button ripple-effect big margin-top-30">Сохранить</button>
        </div>

      </form>

    </div>
    <!-- Row / End -->
@endsection
