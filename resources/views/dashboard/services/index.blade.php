@extends('layouts.dashboard')

@section('title', 'Мои услуги')

@section('breadcrumbs', Breadcrumbs::view('__includes.dashboard.breadcrumbs', 'service'))

@section('content')
    <div class="row">

        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

                <div class="content">

                    <ul class="dashboard-box-list">


                        @foreach ($services as $service)

                            <li>
                                <!-- Job Listing -->
                                <div class="job-listing">

                                    <!-- Job Listing Details -->
                                    <div class="job-listing-details">

                                        <!-- Details -->
                                        <div class="job-listing-description">
                                            <h3 class="job-listing-title"><a href="#">{{ $service->title }}
                                                </a> <span class="dashboard-status-button green">{{ $service->categories->parent->title }}</span>
                                            </h3>

                                            <!-- Job Listing Footer -->
                                            <div class="job-listing-footer">
                                                <ul>
                                                    <li><i class="icon-material-outline-date-range"></i> Дата публикации: {{ $service->created_at->diffForHumans()  }}</li>
                                                    <li><i class="icon-material-outline-date-range"></i> Истекает: 9</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="buttons-to-right always-visible">
                                    <a href="dashboard-manage-candidates.html" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">0</span></a>
                                    <a href="#" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a>
                                    <a href="#" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i></a>
                                </div>
                            </li>


                        @endforeach

                    </ul>
                </div>

            </div>

            {{ $services->links('__includes.dashboard.paginator') }}

        </div>

    </div>
@endsection
