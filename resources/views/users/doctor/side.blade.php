<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('doctor.dashboard') }}"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-01.svg') }}" alt></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li
                    class="submenu {{ request()->routeIs('doctor.liste.dispo') || request()->routeIs('doctor.dispo') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-05.svg') }}" alt></span>
                        <span>Disponibilites</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display:  none; }};">
                        <li ><a href="{{ route('doctor.liste.dispo') }}" class="{{ request()->routeIs('doctor.liste.dispo') ? 'active' : '' }}">Liste disponibilités</a></li>
                        <li ><a href="{{ route('doctor.dispo') }}"
                            class="{{ request()->routeIs('doctor.dispo') ? 'active' : '' }}">Ajouter Disponibilités</a>
                        </li>


                    </ul>
                </li>
                <li class="{{ request()->routeIs('doctor.rendezvous') ? 'active' : '' }}">
                    <a href="{{ route('doctor.rendezvous') }}"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-04.svg') }}" alt></span>
                        <span>Rendez-Vous</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('doc.patien_liste') }}"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-03.svg') }}" alt></span>
                        <span>Liste Patients</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route("consultations.index") }}"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-14.svg') }}" alt></span>
                        <span>Liste Consultation </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
