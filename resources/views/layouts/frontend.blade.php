<!doctype html>
<html lang="en">

   @include('__includes.frontend.head')

<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container  -->

    @include('__includes.frontend.header.guest_header')

    <div class="clearfix"></div>

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

</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->

<script src="{{ mix('assets/frontend/js/frontend.js') }}"></script>

</body>
</html>
