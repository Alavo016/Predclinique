{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@section('title', 'Connexion')

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
                            <img class="img-fluid" src="assets/assets/img/login-02.png" alt="Logo">

                        </div>
                    </div>
                </div>

                <<div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <a href="{{ route('home') }}"><img class="img-fluid mx-auto d-block"
                                            style="max-width: 20%; max-height: 60px;"
                                            src="{{ asset('1-removebg-preview.png') }}" alt="Logo"></a>
                                    </div>
                                    <h2>Réinitialiser le mot de passe</h2>
                
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    <form action="{{ route('password.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
                                        <div class="input-block">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                
                                        <div class="input-block">
                                            <label>Nouveau mot de passe <span class="login-danger">*</span></label>
                                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                
                                        <div class="input-block">
                                            <label>Confirmer le mot de passe <span class="login-danger">*</span></label>
                                            <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                
                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Réinitialiser le mot de passe</button>
                                        </div>
                                    </form>
                
                                    <div class="next-sign">
                                        <p class="account-subtitle">Besoin d'un compte? <a href="{{ route('register') }}">S'inscrire</a></p>
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

