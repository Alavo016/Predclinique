<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="submenu">
                    <a href="{{ route('doctor.dashboard') }}">
                        <span class="menu-side"><img src="{{ asset('assets/assets/img/icons/menu-icon-01.svg') }}" alt></span>
                        <span> Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('doctor.dashboard') }}" class="{{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">Statitique</a></li>
                        <li><a href="#">Graphique </a></li>
                        <li><a href="#">Rapport </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                        <span class="menu-side"><img src="{{ asset('assets/assets/img/icons/menu-icon-02.svg') }}" alt></span>
                        <span>Fourniture Medical </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('doctor.liste.dispo') }}" class="{{ request()->routeIs('doctor.liste.dispo') ? 'active' : '' }}">Liste Fourniture</a></li>
                        <li><a href="{{ route('doctor.dispo') }}" class="{{ request()->routeIs('doctor.dispo') ? 'active' : '' }}">Ajouter Fourniture</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                        <span class="menu-side"><img src="{{ asset('assets/assets/img/icons/menu-icon-03.svg') }}" alt></span>
                        <span>Patients </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('Patient_infirmier.index') }}" class="{{ request()->routeIs('Patient_infirmier.index') ? 'active' : '' }}">Patients List</a></li>
                        <li><a href="{{ route('Patient_infirmier.create') }}" class="{{ request()->routeIs('Patient_infirmier.create') ? 'active' : '' }}">Add Patients</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                        <span class="menu-side"><img src="{{ asset('assets/assets/img/icons/menu-icon-08.svg') }}" alt></span>
                        <span> LIstes des Créances </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="" class="{{ request()->routeIs('creances.index') ? 'active' : '' }}">Liste des creances </a></li>
                        <li><a href="add-staff.html" class="{{ request()->routeIs('creances.create') ? 'active' : '' }}">Ajouter une créances </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
