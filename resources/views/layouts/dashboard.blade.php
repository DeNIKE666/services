
<!doctype html>
<html lang="en">
 @include('__includes.dashboard.head')
<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

    @include('__includes.dashboard.header.user_header')

    <!-- Dashboard Container -->
        <div class="dashboard-container">

            @include('__includes.dashboard.sidebar.left')

            <div class="dashboard-content-container" data-simplebar>
                <div class="dashboard-content-inner">

                    @yield('breadcrumbs')

                    @include('__includes.dashboard.alert')

                    @yield('content')

                    @include('__includes.dashboard.footer')

                </div>
                <!-- content-inner/ End -->
            </div>
            <!-- Dashboard Content / End -->
        </div>
     <!-- Dashboard Container / End -->
</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->

<script src="{{ mix('assets/frontend/js/frontend.js') }}"></script>

</body>
</html>
