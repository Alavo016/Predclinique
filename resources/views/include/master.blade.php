<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} -- @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('2.png') }}">
</head>

<body class="">
{{--
    <x-loader /> --}}

    @include('include.nav')


    @yield('content')

    @include('include.footer')

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.mixitup.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.datetimepicker.full.min.js') }}"></script>

    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>

    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
