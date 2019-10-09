@extends('layouts.dashboard')

@section('title', 'Мои услуги')

@section('breadcrumbs', Breadcrumbs::view('__includes.dashboard.breadcrumbs', 'service'))

@section('content')
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">

            <div class="dashboard-box margin-top-0">

                <!-- Content -->
                <div class="content">
                    <!-- dashboard-box -->
                    <ul class="dashboard-box-list">
                        @forelse ($services as $service)
                            <li>
                                <!-- Job Listing -->
                                <div class="job-listing width-adjustment">
                                    <!-- Job Listing Details -->
                                    <div class="job-listing-details">
                                        <!-- Details -->
                                        <div class="job-listing-description">
                                            <h3 class="job-listing-title"><a href="#">{{ $service->title }}</a> <span class="dashboard-status-button yellow">{{ $service->categories->parent->title }}</span></h3>
                                            <!-- Job Listing Footer -->
                                            <div class="job-listing-footer">
                                                <ul>
                                                    <li><i class="icon-material-outline-access-time"></i> {{ $service->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Task Details -->
                                <ul class="dashboard-task-info">
                                    <li><strong>{{ $service->views }}</strong><span>просмотров</span></li>
                                </ul>
                                <!-- Buttons -->
                                <div class="buttons-to-right always-visible">
                                    <a href="{{ route('service.edit', $service->id) }}" class="button gray ripple-effect ico"><i class="fal fa-edit"></i></a>
                                    <a href="{{ route('service.delete', $service->id) }}" class="button gray ripple-effect ico"><i class="fal fa-trash-alt"></i></a>
                                    <a href="{{ route('user.sell', $service->id) }}" class="button gray ripple-effect ico"><i class="fad fa-eye"></i></a>
                                    <a href="{{ route('up.service', $service->id) }}" class="button gray ripple-effect ico"><i class="fad fa-level-up"></i></a>
                                </div>
                            </li>
                        @empty
                           <p class="padding-top-20 padding-bottom-20" style="text-align: center; margin-top: ">НЕТ УСЛУГ</p>
                        @endforelse
                    </ul>
                </div>

            </div>

            {{ $services->links('__includes.dashboard.paginator') }}

        </div>

    </div>
@endsection
