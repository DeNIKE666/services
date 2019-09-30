@extends('layouts.frontend')

@section('title' , 'Главная страница')

@section('content')

    <!-- Intro Banner
================================================== -->
    <!-- add class "disable-gradient" to enable consistent background overlay -->
    <div class="intro-banner" data-background-image="{{ asset('assets/frontend/img/home-background.jpg') }}">
        <div class="container">

            <!-- Intro Headline -->
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-headline">
                        <h3>
                            <strong>АвторSell</strong>
                            <br>
                            <span>Если вы обладаете каким либо<strong class="color"> творчеством </strong> у вас есть уникальная возможность продавать на площадке свои услуги другим пользователям</span>
                            <p class="margin-top-30">Услуги которые вы сможете продать:
                                <mark class="color">Написание авторских текстов</mark>
                                ,
                                <mark class="color">Мастеринг треков</mark>
                                ,
                                <mark class="color">Авторские биты / минуса</mark>
                                ,
                                <mark class="color">Создание ремиксов</mark>
                            </p>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">{{ $servicesCount }}</strong>
                            <span>Всего услуг</span>
                        </li>
                        <li>
                            <strong> {{ $lastDate }} </strong>
                            <span>Добавлена последняя услуга</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Features Cities -->
    <div class="section margin-top-65 margin-bottom-65">
        <div class="container">
            <div class="row">

                <!-- Section Headline -->
                <div class="col-xl-12">
                    <div class="section-headline centered margin-top-0 margin-bottom-45">
                        <h3>Категории услуг</h3>
                    </div>
                </div>

                @forelse($categories as $categoryItem)

                    <div class="col-xl-3 col-md-3">
                        <a href="{{ route('category.show', $categoryItem->id) }}" class="photo-box"
                           data-background-image="{{ $categoryItem->image }}">
                            <div class="photo-box-content">
                                <h3>{{ $categoryItem->title }}</h3>
                            </div>
                        </a>
                    </div>
                 @empty
                    <div>НЕТ КАТЕГОРИЙ</div>
                 @endforelse
            </div>
        </div>
    </div>
    <!-- Features Cities / End -->

    <!-- Features Jobs -->
    <div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Section Headline -->
                    <div class="section-headline margin-top-0 margin-bottom-35">
                        <h3>ПОСЛЕДНИИ УCЛУГИ НА ПЛОЩАДКЕ</h3>
                        <p>показаны товары с привлекательной ценой!</p>
                    </div>

                    <!-- Jobs Container -->
                    <div class="listings-container compact-list-layout margin-top-35">
                        @foreach ($services as $service)


                            <!-- Job Listing -->
                                <a href="{{ route('user.sell', $service->id) }}" class="job-listing with-apply-button">

                                    <!-- Job Listing Details -->
                                    <div class="job-listing-details">


                                        <!-- Logo -->
                                        <div class="job-listing-company-logo">
                                            <img src="{{ asset($service->image()) }}" alt="">
                                        </div>


                                        <!-- Details -->
                                        <div class="job-listing-description">

                                            <h2 class="job-listing-title">{{ $service->title }}</h2>

                                            <p class="margin-bottom-10">{{ $service->limitBody(150) }}</p>

                                            <div class="job-listing-footer">
                                                <ul>
                                                    <li><i class="fal fa-star"></i> рейтинг {{ $service->user->rating }}</li>
                                                    <li><i class="fal fa-business-time"></i> {{ $service->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Apply Button -->
                                        <span class="list-apply-button ripple-effect"><i class="fal fa-shopping-cart"></i> Заказать</span>
                                    </div>
                                </a>

                            @endforeach
                    </div>
                    <!-- Jobs Container / End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Jobs / End -->

    <div class="section padding-top-65 padding-bottom-65">
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <!-- Section Headline -->
                    <div class="section-headline centered margin-top-0 margin-bottom-5">
                        <h3>Как я могу заработать ?</h3>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <!-- Icon Box -->
                    <div class="icon-box with-line">
                        <!-- Icon -->
                        <div class="icon-box-circle">
                            <div class="icon-box-circle-inner">
                                <i class="fal fa-sign-in-alt"></i>
                                <div class="icon-box-check"><i class="fal fa-check"></i></div>
                            </div>
                        </div>
                        <h3>Создате аккаунт</h3>
                        <p>Зарегиструйтесь на проекте, войдите в личный кабинет и отредактируйте ваш профиль</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <!-- Icon Box -->
                    <div class="icon-box with-line">
                        <!-- Icon -->
                        <div class="icon-box-circle">
                            <div class="icon-box-circle-inner">
                                <i class="fal fa-layer-plus"></i>
                                <div class="icon-box-check"><i class="fal fa-check"></i></div>
                            </div>
                        </div>
                        <h3>Преложите услугу</h3>
                        <p>Предложите свою услугу предварительно заполнив все необходимые данные</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <!-- Icon Box -->
                    <div class="icon-box">
                        <!-- Icon -->
                        <div class="icon-box-circle">
                            <div class="icon-box-circle-inner">
                                <i class="far fa-thumbs-up"></i>
                                <div class="icon-box-check"><i class="fal fa-check"></i></div>
                            </div>
                        </div>
                        <h3>Отлично</h3>
                        <p>Отлично, вы добавили услугу, теперь осталось ждать когда она кого-то заинтересует</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
