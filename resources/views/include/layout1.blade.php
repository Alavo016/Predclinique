<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }} </title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <style>

    </style>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body class="">

    <x-preloader />

    <div class="main-wrapper">
        @include('dashboard.nav_head')

        @include('dashboard.chat_box')

        @include('dashboard.header')

        @include('dashboard.sidebar')

        @yield('content')

        @include('dashboard.footer')


    </div>

     <script src="{{ asset('vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendor/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
	<script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/deznav-init.js') }}"></script>
	<script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>

</body>

</html>
