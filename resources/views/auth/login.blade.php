@extends('layouts.frontend')

@section('title' , 'Авторизация')

@section('content')


@section('content')

@section('breadcrumbs', Breadcrumbs::view('__includes.frontend.breadcrumbs' , 'login'))

<div class="container">
    <div class="row">
        <div class="col-xl-5 offset-xl-3">
            <div class="login-register-page">

            <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Авторизуйтесь на проекте</h3>
                    <span>Если у вас еще нет аккаунта <a href="{{ route('register') }}">создайте его!</a></span>
                </div>
                <!-- Form -->
                <form action="{{ route('login') }}" method="post">

                    @if (count($errors))

                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach

                    @endif

                    <div class="input-with-icon-left">
                        <i class="fal fa-envelope"></i>
                        <input type="text" class="input-text with-border" name="email" placeholder="Email"
                               value="{{ old('email') }}" autocomplete="email" autofocus>
                    </div>


                    <div class="input-with-icon-left">
                        <i class="fal fa-lock"></i>
                        <input type="password" class="input-text with-border" name="password"
                               placeholder="Введите пароль" value="{{ old('password') }}" autocomplete="password"
                               autofocus>
                    </div>

                    <a href="#" class="forgot-password">Forgot Password?</a>

                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Войти в аккаунт <i class="fal fa-long-arrow-right"></i></button>

                    <div class="social-login-separator"><span>or</span></div>
                    <div class="social-login-buttons">
                        <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via
                            Facebook
                        </button>
                        <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via
                            Google+
                        </button>
                    </div>

            </div>
        </div>
    </div>
</div>

<div class="margin-top-70"></div>

@endsection


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
