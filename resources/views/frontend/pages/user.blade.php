@extends('layouts.frontend')

@section('content')
    <!-- Titlebar
================================================== -->
    <div class="single-page-header freelancer-header" data-background-image="images/single-freelancer.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image freelancer-avatar">
                                <img src="{{ asset($user->avatar()) }}" alt="">
                            </div>
                            <div class="header-details">
                                <h3>{{ $user->login }}</h3>
                                <ul>
                                    <li><div class="star-rating" data-rating="{{ $user->rating }}"></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-xl-12">

                <!-- Page Content -->
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">О  {{ $user->profile_type == 0 ? 'покупателе' : 'продавце' }}</h3>
                    <p>{{ $user->about ?? 'ПОЛЬЗОВАТЕЛЬ НИЧЕГО НЕ НАПИСАЛ О СЕБЕ' }}</p>
                </div>

                @if ($user->profile_type == 1)
                <!-- Boxed List -->
                <div class="boxed-list margin-bottom-60">
                    <div class="boxed-list-headline">
                        <h3><i class="fad fa-thumbs-up"></i> Отзывы ({{ $user->reviews->count() }})</h3>
                    </div>
                    <ul class="boxed-list-ul">
                        @forelse ($reviews as $review)
                            <li>
                                <div class="boxed-list-item">
                                    <img src="{{ asset($review->user->avatar()) }}" class="img-review margin-right-50" width="130" alt="{{ $review->user->login }}">
                                    <div class="item-content margin-left-0">
                                        <h4><i class="fas fa-user"></i> {{ $review->user->login }}</h4>
                                        <div class="item-description">
                                            <p>{{ $review->text }} </p>
                                        </div>
                                        <div class="item-details padding-top-10">
                                            <div class="detail-item"><i class="fal fa-clock"></i> {{ $review->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>НЕТ ОТЗЫВОВ</li>
                        @endforelse
                    </ul>
                </div>
                <!-- Boxed List / End -->
                {{ $reviews->links('__includes.frontend.paginator') }}
              @endif

            </div>

        </div>
    </div>


    <!-- Spacer -->
    <div class="margin-top-15"></div>
    <!-- Spacer / End-->


@endsection