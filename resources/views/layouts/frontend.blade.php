<!doctype html>
<html lang="en">

   @include('__includes.frontend.head')

<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container  -->

    @include('__includes.frontend.header.guest_header')

    <!-- Header Container / End -->

    <!-- BreadCrumbs -->

      @yield('breadcrumbs')

   <!-- BreadCrumbs / End -->

   <!-- Content / End -->

      @yield('content')

   <!-- Content / End -->

   <!-- Footer -->

     @include('__includes.frontend.footer')

   <!-- Footer / End -->

    <!-- Include this after the sweet alert js file -->
</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="{{ mix('assets/frontend/js/frontend.js') }}"></script>

@include('vendor.sweetalert.alert')

<!-- Include this after the sweet alert js file -->

@stack('scripts')

</body>
</html>
