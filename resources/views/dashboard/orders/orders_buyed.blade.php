@extends('layouts.dashboard')

@section('content')
    <div class="col-xl-12">
        <div class="dashboard-box margin-top-0">

            <!-- Headline -->
            <div class="headline">
                <h3><i class="icon-material-outline-assignment"></i> Мои покупки</h3>
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
                                        <h3 class="job-listing-title"><a href="#">{{ $order->service->title }}</a> <span class="dashboard-status-button yellow">{{ $order->service->categories->title }}</span></h3>
                                        <!-- Job Listing Footer -->
                                        <div class="job-listing-footer">
                                            <ul>
                                                <li>
                                                    <i class="icon-material-outline-access-time"></i> {{ $order->created_at->diffForHumans() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="dashboard-task-info">
                                <li><strong>{{ $order->service->user->login }}</strong><span>Продавец</span></li>
                            </ul>

                            <!-- Buttons -->
                            <div class="buttons-to-right always-visible">
                                <a href="{{ route('download', ['file' => $order->service->product]) }}"
                                   class="button ripple-effect"><i class="fal fa-cloud-download"></i> Скачать файл</a>
                                <a href="{{ route('order.buy.complete', $order->id) }}"
                                   class="button gray ripple-effect ico"><i class="fad fa-eye"></i></a>
                            </div>
                        </li>

                    @empty
                        <p style="padding: 30px" class="text-center"> ИСТОРИЯ ПОКУПОК ПУСТА</p>
                    @endforelse
                </ul>
            </div>
        </div>
        {{ $orders->links('__includes.dashboard.paginator') }}
    </div>
@endsection