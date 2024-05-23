<div class="header">
    <div class="header-left">
        <a href="{{ route('patient.index') }}" class="logo">
            <img src="{{ asset('assets/assets/img/logo.png"') }}" width="35" height="35" alt> <span>E-clinique/span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><img src="{{ asset('assets/assets/img/icons/bar-icon.svg') }}" alt></a>
    <a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img
            src="{{ asset('assets/assets/img/icons/bar-icon.svg') }}" alt></a>

    <ul class="nav user-menu float-end">


        <li class="nav-item dropdown has-arrow user-profile-list">
            <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                <div class="user-names">
                    <h5>{{ $user->name }} {{ $user->prenom }} </h5>
                    <span>Patient</span>
                </div>
                <span class="user-img">
                    <img src="{{ URL::asset($user->photo) }}" alt="Admin">
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route("patient.show",$user->id) }}">Mon Profil</a>
                <a class="dropdown-item" href="{{ route('patient.edit',$user->id) }}">Modifier Profil</a>


                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="nav-link">
                        <span>Déconnection</span>
                    </button>
                </form>

            </div>
        </li>

    </ul>

</div>
