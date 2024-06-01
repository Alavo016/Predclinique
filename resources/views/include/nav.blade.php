<!-- Affiche cette barre de navigation si l'utilisateur est sur la page d'accueil -->
@if (Request::is('/'))
<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('1-removebg-preview.png') }}" alt="image" width="10%" height="75px"> <strong>E-clinique</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar fixed-top">
        <div class="container">
            <nav class="navbar  navbar-expand-md navbar-two">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('1-removebg-preview.png') }}" alt="image" width="300px" height="90px">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                Acceuil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patient.contact') }}" class="nav-link">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patient.faqs') }}" class="nav-link">
                                FAQS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">
                                Inscription
                            </a>
                        </li>
                        <li class="nav-btn align-items-center">
                            <a href="{{ route('login') }}" class="default-btn">
                                Connexion
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
@else
<!-- Affiche cette barre de navigation si l'utilisateur n'est pas sur la page d'accueil -->
<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('1-removebg-preview.png') }}" alt="image" width="10%" height="75px"> <strong>E-clinique</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar pag-nav">
        <div class="container">
            <nav class="navbar  navbar-expand-md navbar-two">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('1-removebg-preview.png') }}" alt="image" width="300px" height="90px">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                                Acceuil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patient.contact') }}" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patient.faqs') }}" class="nav-link {{ Request::is('faqs') ? 'active' : '' }}">
                                FAQS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link {{ Request::is('register') ? 'active' : '' }}">
                                Inscription
                            </a>
                        </li>
                        <li class="nav-btn align-items-center">
                            <a href="{{ route('login') }}" class="default-btn {{ Request::is('login') ? 'active' : '' }}">
                                Connexion
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
@endif
