@extends('layouts.dashboard')

@section('content')
    <div class="col-xl-12">
        <div class="dashboard-box margin-top-0">

            <!-- Headline -->
            <div class="headline">
                <h3><i class="icon-material-outline-assignment"></i> Мои продажи</h3>
            </div>

            <div class="content">
                <ul class="dashboard-box-list">
                    @forelse($orders as $order)

                        <li>
                            <!-- Job Listing -->
                            <div class="job-listing width-adjustment">

                                <!-- Job Listing Details -->
                                <div class="job-listing-details">

                                    <!-- Details -->
                                    <div class="job-listing-description">
                                        <h3 class="job-listing-title"><a href="#">{{ $order->service->title }}</a> <span class="dashboard-status-button yellow">{{ $order->service->categories->parent->title }}</span></h3>
                                        <!-- Job Listing Footer -->
                                        <div class="job-listing-footer">
                                            <ul>
                                                <li><i class="icon-material-outline-access-time"></i> {{ $order->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="dashboard-task-info">
                                <li><strong>{{ $order->userBuyed->login }}</strong><span>Покупатель</span></li>
                            </ul>

                            <!-- Buttons -->
                            <div class="buttons-to-right always-visible">
                                <a href="{{ route('user.sell', $order->service->id) }}" class="button gray ripple-effect ico"><i class="fad fa-eye"></i></a>
                            </div>
                        </li>

                    @empty
                        <p style="padding: 30px" class="text-center"> ИСТОРИЯ ПРОДАЖ ПУСТА</p>
                    @endforelse
                </ul>
            </div>
        </div>

        {{ $orders->links('__includes.dashboard.paginator') }}

    </div>
@endsection