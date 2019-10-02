<!doctype html>
<html lang="en">

   @include('__includes.frontend.head')

<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container  -->

       @include('__includes.dashboard.header.user_header')

    <!-- Header end -->

    <!-- Dashboard Container -->
    <div class="dashboard-container">

        <!-- sidebar Container  -->

        @include('__includes.dashboard.sidebar.left')

        <!-- sidebar Container  -->

        <!-- dashboard-content-container  -->
        <div class="dashboard-content-container" data-simplebar>

            <!-- dashboard-content-inner  -->
            <div class="dashboard-content-inner">

                <!-- breadcrumbs  -->

                @yield('breadcrumbs')

                <!-- breadcrumbs end -->

                <!-- alerts  -->

                @include('__includes.dashboard.alert')

                <!-- alerts end  -->

                <!-- content  -->

                @yield('content')

                 <!-- content end  -->

                <!-- footer  -->

                @include('__includes.dashboard.footer')

               <!-- footer end -->

            </div>
            <!-- content-inner/ End -->

        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->

    <script src="{{ mix('assets/frontend/js/frontend.js') }}"></script>
    <script src="{{ mix('assets/frontend/js/plugins.js') }}"></script>

    @stack('scripts')

</body>
</html>
