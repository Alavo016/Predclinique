<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} -- @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">

    <link rel="icon" type="image/png" href="assets/assets/img/favicon.png">
</head>

<body class="">


    @yield('content')


    <script src="{{ asset('assets/assets/js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ asset('assets/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/assets/js/app.js') }}"></script>




</body>

</html>
