<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }} </title>

    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/datatables/datatables.min.css') }}">
</head>



<body class="">

    <div class="main-wrapper">
        @include('users.doctor.header')

        @include('users.doctor.side')

        @yield('content')

    </div>
    <div class="sidebar-overlay" data-reff></div>

<script src="{{ asset('assets/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/jquery.waypoints.js') }}"></script>
<script src="{{ asset('assets/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/assets/plugins/apexchart/chart-data.js') }}"></script>
<script src="{{ asset('assets/assets/js/app.js') }}"></script>


</body>

</html>