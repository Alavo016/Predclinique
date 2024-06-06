@section('title', 'Bloqué')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} -- @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/datatables/datatables.min.css') }}">

    <link rel="icon" type="image/png" href="assets/assets/img/favicon.png">
</head>

<body class="">

    <div class="main-wrapper login-body">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-6 login-wrap">
                    <div class="login-sec">
                        <div class="log-img">
                            <img class="img-fluid" src="assets/assets/img/login-02.png" alt="Blocked">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <a href="{{ route('home') }}"><img class="img-fluid mx-auto d-block"
                                                style="max-width: 20%" style="max-height: 60px"
                                                src="{{ asset('1-removebg-preview.png') }}" alt></a>
                                    </div>
                                    <h2>Compte Bloqué</h2>
                                    <p>Votre compte a est bloqué. Veuillez contacter l'assistance pour plus
                                        d'informations.</p>
                                    <div class="input-block">
                                        <a href="mailto:aalavo733@gmail.com" target="_blank"
                                            class="btn btn-primary btn-block">Contacter l'assistance</a>
                                    </div>
                                    <div class="input-block">
                                        <a href="{{ route('home') }}" class="btn btn-secondary btn-block">Retour à
                                            l'accueil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="{{ asset('assets/assets/js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ asset('assets/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/assets/js/app.js') }}"></script>
</body>

</html>
