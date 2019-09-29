@extends('layouts.frontend')

@section('title' , 'Регистрация')

@section('content')

@section('breadcrumbs', Breadcrumbs::view('__includes.frontend.breadcrumbs' , 'register'))

<div class="container">
    <div class="row">
        <div class="col-xl-5 offset-xl-3">

            <div class="login-register-page">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3 style="font-size: 26px;">Завершите регистрацию</h3>
                    <span>У вас уже есть аккаунт ? <a href="{{ route('login') }}">войти!</a></span>
                </div>

                <!-- Form -->
                <form action="{{ route('register') }}" method="POST">

                    @if (count($errors))

                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach

                    @endif

                <!-- Account Type -->
                    <div class="account-type">
                        <div>
                            <input type="radio" name="profile_type" value="0" id="freelancer-radio" class="account-type-radio"/>
                            <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Покупатель </label>
                        </div>

                        <div>
                            <input type="radio" name="profile_type" value="1" id="employer-radio" class="account-type-radio"/>
                            <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Продавец</label>
                        </div>
                    </div>

                    <div class="input-with-icon-left">
                        <i class="fal fa-user"></i>
                        <input type="text" class="input-text with-border"  name="name" placeholder="Ваше имя" value="{{ old('name') }}" autocomplete="name" autofocus  >
                    </div>

                    <div class="input-with-icon-left">
                        <i class="fal fa-envelope"></i>
                        <input type="text" class="input-text with-border"  name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email" autofocus  >
                    </div>

                    <div class="input-with-icon-left">
                        <i class="fal fa-user"></i>
                        <input type="text" class="input-text with-border" name="login" placeholder="Логин" value="{{ old('login') }}" autocomplete="login" autofocus  >
                    </div>

                    <div class="input-with-icon-left">
                        <i class="fal fa-lock"></i>
                        <input type="password" class="input-text with-border"  name="password" placeholder="Введите пароль" value="{{ old('password') }}" autocomplete="password" autofocus  >
                    </div>

                    <div class="input-with-icon-left">
                        <i class="fal fa-lock"></i>
                        <input type="password" class="input-text with-border" name="password_confirmation" placeholder="Повторите пароль" autocomplete="new-password">
                    </div>

                    <a href="#" class="forgot-password">Forgot Password?</a>

                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Создать аккаунт <i class="fal fa-long-arrow-right"></i> </button>

                </form>
            </div>

        </div>
    </div>
</div>

<div class="margin-top-70"></div>

@endsection
