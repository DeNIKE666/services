@extends('layouts.frontend')

@section('content')

    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <!-- Page Content
    ================================================== -->
    <div class="full-page-container">
        <div class="full-page-sidebar">
            <div class="full-page-sidebar-inner" data-simplebar>
                <div class="sidebar-container">
                    <div class="sidebar-widget">
                        <h3>Категории</h3>
                        @include('__includes.frontend.categories.parent', ['prefix' => ''])
                    </div>
                    <div class="margin-top-2"></div>
                    <div class="sidebar-widget">
                        <h3>Сортировка по цене</h3>
                        <div class="margin-top-55"></div>

                        <form action="{{ URL::current() }}" method="POST">
                            <!-- Range Slider -->
                            <input class="range-slider" name="filter" type="text" value="0" data-slider-currency="" data-slider-min="0" data-slider-max="10000" data-slider-step="5" data-slider-value="[0,0]"/>

                            <div class="form-group">
                                <button type="submit" class="button button-sliding-icon ripple-effect" style="margin-top:30px; width: 100%"> ПРИМЕНИТЬ </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Page Sidebar / End -->

        <!-- Full Page Content -->
        <div class="full-page-content-container" data-simplebar>
            <div class="full-page-content-inner">
                <!-- Tasks Container -->
                <div class="tasks-list-container tasks-grid-layout">
                @foreach ($services as $serviceItem)
                    <!-- Task -->
                        <a href="{{ route('user.sell', $serviceItem) }}" class="task-listing">
                            <!-- Job Listing Details -->
                            <div class="task-listing-details">
                                <!-- Details -->
                                <div class="task-listing-description">
                                    <h3 class="task-listing-title">{{ $serviceItem->title }}</h3>
                                    <p class="text-muted">{!!  $serviceItem->limitBody(100) !!} </p>
                                </div>
                            </div>

                            <div class="task-listing-bid">
                                <div class="task-listing-bid-inner">
                                    <div class="task-offers">
                                        <strong>{{ $serviceItem->amount }}  руб.</strong>
                                        <span>стоимость</span>
                                    </div>
                                    <span class="button button-sliding-icon ripple-effect">Заказать <i
                                                class="icon-material-outline-arrow-right-alt"></i></span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- Tasks Container / End -->

                <!-- Pagination -->
                <div class="clearfix"></div>
                     {{ $services->links('__includes.dashboard.paginator') }}
                <div class="clearfix"></div>
                <!-- Pagination / End -->
            </div>
        </div>
        <!-- Full Page Content / End -->
    </div>
@endsection
