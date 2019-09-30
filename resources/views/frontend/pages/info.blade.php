@extends('layouts.frontend')

@section('title' , 'Информация')

@section('breadcrumbs', Breadcrumbs::view('__includes.frontend.breadcrumbs' , 'info'))

@section('content')
    <div class="container">

            <!-- Accordion -->
            <div class="accordion js-accordion">

                <!-- Accordion Item -->
                <div class="accordion__item js-accordion-item">
                    <div class="accordion-header js-accordion-header">Как работает проект? </div>

                    <!-- Accordtion Body -->
                    <div class="accordion-body js-accordion-body">

                        <!-- Accordion Content -->
                        <div class="accordion-body__contents">
                            Проект - это площадка где вы сможете продать какую либо услугу другим пользователям, вам достаточно более детально описать то, что вы хотите предложить другим пользователям, и разместить в подходящей категории.
                        </div>

                    </div>
                    <!-- Accordion Body / End -->
                </div>
                <!-- Accordion Item / End -->

                <!-- Accordion Item -->
                <div class="accordion__item js-accordion-item active">
                    <div class="accordion-header js-accordion-header">Как создать услугу ?</div>

                    <!-- Accordtion Body -->
                    <div class="accordion-body js-accordion-body">

                        <!-- Accordion Content -->
                        <div class="accordion-body__contents">
                            Добавлять новые услуги в список могут только зарегистрированные пользователи
                        </div>

                        <!-- Sub Accordion Container -->
                        <div class="accordion js-accordion">

                            <!-- Sub Accordion -->
                            <div class="accordion__item js-accordion-item">
                                <div class="accordion-header js-accordion-header">Я еще не зарегистрирован</div>
                                <div class="accordion-body js-accordion-body">
                                    <div class="accordion-body__contents">
                                        Первым делом вам необходимо создать свой аккаунт на площадке по <a
                                                href="{{ route('register') }}">ссылке</a> , заполнить всю необходимую информацию - отредактировать профиль так как вам нужно.
                                    </div>
                                </div>
                            </div>

                            <!-- Sub Accordion -->
                            <div class="accordion__item js-accordion-item">
                                <div class="accordion-header js-accordion-header">Я уже зарегистрирован</div>
                                <div class="accordion-body js-accordion-body">
                                    <div class="accordion-body__contents">
                                        <p class="padding-bottom-10">Отлично, теперь вам необходимо перейти в <a href="{{ route('service.create') }}">раздел</a></p>

                                        <img src="{{ asset('assets/frontend/img/dashboard-create-instruction.png') }}" alt="">

                                        <p  class="padding-top-20">Заполните всю необходимую информацию, и нажмине опубликовать, ваша услуга сразу попадёт в общую доску всех предлагаемых
                                            <a href="{{ route('category.show', 1) }}">услуг</a></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Sub Accordion / End -->
                    </div>
                    <!-- Accordion Body / End -->
                </div>
                <!-- Accordion Item / End -->

                <!-- Accordion Item -->
                <div class="accordion__item js-accordion-item">
                    <div class="accordion-header js-accordion-header">Оплата</div>

                    <!-- Accordtion Body -->
                    <div class="accordion-body js-accordion-body">

                        <!-- Accordion Content -->
                        <div class="accordion-body__contents">
                            Средства за продажу услуги вы получаете на свой личный баланс.
                        </div>


                        <!-- Sub Accordion Container -->
                        <div class="accordion js-accordion">

                            <!-- Sub Accordion -->
                            <div class="accordion__item js-accordion-item">
                                <div class="accordion-header js-accordion-header">Снятие средств</div>
                                <div class="accordion-body js-accordion-body">
                                    <div class="accordion-body__contents">
                                        Заказывать вывод заработанных средств вы можете каждый день.
                                    </div>
                                </div>
                            </div>

                            <!-- Sub Accordion -->
                            <div class="accordion__item js-accordion-item">
                                <div class="accordion-header js-accordion-header">Комиссия</div>
                                <div class="accordion-body js-accordion-body">
                                    <div class="accordion-body__contents">
                                        <p class="padding-bottom-10">При выводе средств. сервис берёт <b>12%</b> за предоставление площадки для продажи ваших услуг</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Sub Accordion / End -->

                    </div>
                    <!-- Accordion Body / End -->
                </div>
                <!-- Accordion Item / End -->

            </div>
            <!-- Accordion / End -->
    </div>

    <div class="margin-top-70"></div>

@endsection
