<header id="header-container" class="fullwidth">

    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo">
                    <a href="index.html"><img src="http://www.vasterad.com/themes/hireo_082019/images/logo.png" alt=""></a>
                </div>

                <!-- Main Navigation -->
                <nav id="navigation">
                    <ul id="responsive">
                        <li><a href="/"><i class="fal fa-home-lg-alt"></i> Главная</a></li>
                        <li><a href="{{ route('frontend.info') }}"><i class="fal fa-question"></i> Информация</a></li>
                    </ul>
                </nav>

                <div class="clearfix"></div>
                <!-- Main Navigation / End -->

            </div>
            <!-- Left Side Content / End -->

            @auth
                <div class="right-side">
                    <div class="header-widget"><a href="{{ route('dashboard') }}" class="button big ripple-effect margin-top-15">Панель управления</a></div>
                </div>
            @elseguest
                <div class="right-side">
                    <div class="header-widget"><a href="{{ route('login') }}" class="button big ripple-effect margin-top-15">Войти или создать аккаунт</a></div>
                </div>
            @endauth
        </div>
    </div>
    <!-- Header / End -->
</header>

<div class="clearfix"></div>