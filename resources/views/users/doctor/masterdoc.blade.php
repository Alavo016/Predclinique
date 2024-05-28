<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }} </title>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('Blue_and_White_Illustrative_Doctor_Health_Care_Logo-removebg-preview.png') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/fullcalendar.min.css') }}">
  {{-- <script src="{{ asset('assets/assets/js/fullcalendar.min.js') }}" type="aee714088567142e678df3f1-text/javascript"></script>
    <script src="{{ asset('assets/assets/js/jquery.fullcalendar.js') }}" type="aee714088567142e678df3f1-text/javascript"></script> --}}
  <!-- Inclure FullCalendar.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>
    <!-- Inclure le CSS de FullCalendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
<script src="{{ asset('assets/assets/js/bootstrap-datetimepicker.min.js') }}"></script>


</body>

</html>
