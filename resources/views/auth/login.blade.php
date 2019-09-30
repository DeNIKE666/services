@extends('layouts.frontend')

@section('title' , 'Авторизация')

@section('content')


@section('content')

@section('breadcrumbs', Breadcrumbs::view('__includes.frontend.breadcrumbs' , 'login'))

<div class="container">
    <div class="row">
        <div class="col-xl-5 offset-xl-3">
            <div class="login-register-page padding-top-41 padding-bottom-41">

            <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Авторизуйтесь на проекте</h3>
                    <span>Если у вас еще нет аккаунта <a href="{{ route('register') }}">создайте его!</a></span>
                </div>
                <!-- Form -->
                <form action="{{ route('login') }}" method="post">

                    @include('__includes.frontend.alert')

                    <div class="input-with-icon-left">
                        <i class="fal fa-envelope"></i>
                        <input type="text" class="input-text with-border" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    </div>


                    <div class="input-with-icon-left">
                        <i class="fal fa-lock"></i>
                        <input type="password" class="input-text with-border" name="password" placeholder="Введите пароль" value="{{ old('password') }}" autocomplete="password" autofocus>
                    </div>

                    <a href="#" class="forgot-password">Забыли пароль ?</a>

                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Войти в аккаунт <i class="fal fa-long-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="margin-top-70"></div>

@endsection

