
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>@yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="{{ mix('assets/atlantis/css/atlantis.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,700&display=swap" rel="stylesheet">

    <script src="{{ mix('assets/atlantis/js/atlantis.all.js') }}"></script>

</head>
<body>
<div class="wrapper">

    @include('admin.partials.top_header')

    @include('admin.partials.side_menu')

    <div class="main-panel">

        <div class="content">

            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                            <h5 class="text-white op-7 mb-2">Premium Bootstrap 4 Admin Dashboard</h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                            <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
                        </div>
                    </div>
                </div>
            </div>

            @yield('breadcrumbs')

            @yield('content')
        </div>

        @include('admin.partials.footer')

    </div>
</div>

<script src="{{ asset('assets/atlantis/atlantis.min.js') }}"></script>
<script src="{{ asset('js/atlantis/settings.js') }}"></script>

</body>
</html>
