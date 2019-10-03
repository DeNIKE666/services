@extends('layouts.frontend')

@section('title' , 'Просмотр услуги пользователя ' . $service->user->login )

@section('content')

    <div class="single-page-header"
         data-background-image="http://www.vasterad.com/themes/hireo_082019/images/single-job.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image"><a href="{{ url()->current() }}"><img src="{{ asset($service->image()) }}" alt=""></a></div>
                            <div class="header-details">
                                <h3>{{ $service->title }}</h3>
                                <h5><a href=""><i class="fal fa-external-link-alt"></i> профиль продавца</a></h5>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                <div class="salary-type">Общая сумма продаж</div>
                                <div class="salary-amount">{{ $service->user->summarySellAmount() }} <i class="fad fa-ruble-sign"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">
            <div class="col-xl-8 col-lg-8 content-right-offset">
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Описание услуги</h3>
                    <p class="margin-bottom-10 p_seller">{!! $service->body !!}</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">

                <div class="sidebar-container">

                    <a href="" class="apply-now-button popup-with-zoom-anim">Заказать <i class="fal fa-shopping-cart"></i></a>

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <div class="job-overview">
                            <div class="job-overview-headline">Информация о прадавце</div>
                            <div class="job-overview-inner">
                                <ul>
                                    <li>
                                        <i class="fad fa-star"></i>
                                        <span>Рейтинг</span>
                                        <h5>{{ $service->user->rating }}</h5>
                                    </li>
                                    <li>
                                        <i class="fad fa-clipboard-list"></i>
                                        <span>Услуг на площадке</span>
                                        <h5>{{ $service->user->services->count() }}</h5>
                                    </li>
                                    <li>
                                        <i class="fad fa-comments-alt"></i>
                                        <span>Отзывов</span>
                                        <h5>0</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <div class="job-overview">
                            <div class="job-overview-headline">Информация от продавца</div>
                            <div class="job-overview-inner">
                                    <a href="{{ asset($service->file()) }}" class="attachment-box ripple-effect"><span>Обязательно к прочтению</span><i>ФАЙЛ</i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
