<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }} </title>


    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('Blue_and_White_Illustrative_Doctor_Health_Care_Logo-removebg-preview.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/datatables/datatables.min.css') }}">

        <script src="{{ asset('assets/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/assets/plugins/datatables/datatables.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('DataTables-1.13.6/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('Buttons-2.4.2/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('simplecalendar.css') }}">
<script src="{{ asset('simplecalendarjq.js') }}"></script>
<script src="{{ asset('calendar.js') }}"></script>

</head>



<body class="">


    <div class="main-wrapper">
        @include('users.patient.header')

        @include("users.patient.side")

        @yield('content')

    </div>
    <div class="sidebar-overlay" data-reff></div>

<!-- jQuery -->

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="{{ asset('assets/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/jquery.waypoints.js') }}"></script>
<script src="{{ asset('assets/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/assets/plugins/apexchart/chart-data.js') }}"></script>
<script src="{{ asset('assets/assets/js/app.js') }}"></script>
<script src="{{ asset('assets/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('jQuery-3.7.0/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('DataTables-1.13.6/datatables.min.js') }}"></script>
    <!-- Lien CDN pour les boutons DataTables -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/fr.min.js"></script>






</html>
