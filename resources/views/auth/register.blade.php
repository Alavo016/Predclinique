{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@section('title', 'Inscription')

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
                            <img class="img-fluid" src="{{ asset('assets/assets/img/login-02.png') }}" alt="Logo">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <a href="index.html"><img src="{{ asset('assets/assets/img/login-logo.png') }}"
                                                alt></a>
                                    </div>
                                    <h2>Inscription</h2>

                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="input-block">
                                            <label>Nom <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-block">
                                            <label>Prénom <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="prenom"
                                                value="{{ old('prenom') }}">
                                            @error('prenom')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-block">
                                            <label>Nom D'utilisateur <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="pseudo"
                                                value="{{ old('pseudo') }}">
                                            @error('pseudo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-block">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-block">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" type="password" name="password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                        </div>
                                        <div class="input-block">
                                            <label>Confirm Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input-confirm" type="password"
                                                name="password_confirmation">
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="profile-views feather-eye-off confirm-password"></span>
                                        </div>

                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                                        </div>
                                    </form>

                                    <div class="next-sign">
                                        <p class="account-subtitle">Avez vous deja un compte ? <a href="{{ route('login') }}">Connexion</a>
                                        </p>

                                        

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
