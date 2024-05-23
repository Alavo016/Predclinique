<style>
        .navbar-brand img {
            max-width: 100%;
            height: auto;
        }
    </style>
<div class="navbar-area bg-white">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('1-removebg-preview.png') }}" alt="image" width="300px" height="90px">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
    <nav class="navbar navbar-expand-md navbar-two bg-white">
        <div class="container p-relative">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('1-removebg-preview.png') }}" alt="Logo" class="img-fluid" style="max-height: 75px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="fas fa-home icon"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ request()->routeIs('patient.contact') ? 'active' : '' }}">
                            <i class="fas fa-address-book icon"></i> Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ request()->routeIs('patient.faqs') ? 'active' : '' }}">
                            <i class="fas fa-question-circle icon"></i> Faqs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
                            <i class="fas fa-user-plus icon"></i> Register
                        </a>
                    </li>
                    <li class="nav-btn">
                        <a href="{{ route('login') }}" class="default-btn">
                            Connexion
                            <span></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
</div>
