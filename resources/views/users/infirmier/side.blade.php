<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ request()->routeIs('infirmier.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('infirmier.dashboard') }}">
                        <span class="menu-side">
                            <img src="{{ asset('assets/assets/img/icons/menu-icon-01.svg') }}" alt>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="submenu {{ request()->routeIs('fourniture.*') ? 'active' : '' }}">
                    <a href="#">
                        <span class="menu-side">
                            <img src="{{ asset('assets/assets/img/icons/menu-icon-02.svg') }}" alt>
                        </span>
                        <span>Fourniture Medical</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->routeIs('fourniture.*') ? 'block' : 'none' }};">
                        <li><a href="{{ route('fourniture.index') }}"
                                class="{{ request()->routeIs('fourniture.index') ? 'active' : '' }}">Liste
                                Fourniture</a></li>
                        <li><a href="{{ route('fourniture.create') }}"
                                class="{{ request()->routeIs('fourniture.create') ? 'active' : '' }}">Ajouter
                                Fourniture</a></li>
                    </ul>
                </li>
                <li class="submenu {{ request()->routeIs('Patient_infirmier.*') ? 'active' : '' }}">
                    <a href="#">
                        <span class="menu-side">
                            <img src="{{ asset('assets/assets/img/icons/menu-icon-03.svg') }}" alt>
                        </span>
                        <span>Patients</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->routeIs('Patient_infirmier.*') ? 'block' : 'none' }};">
                        <li><a href="{{ route('Patient_infirmier.index') }}"
                                class="{{ request()->routeIs('Patient_infirmier.index') ? 'active' : '' }}">Patients
                                List</a></li>
                        <li><a href="{{ route('Patient_infirmier.create') }}"
                                class="{{ request()->routeIs('Patient_infirmier.create') ? 'active' : '' }}">Add
                                Patients</a></li>
                    </ul>
                </li>
                <li class="submenu {{ request()->routeIs('Creance.*') ? 'active' : '' }}">
                    <a href="#">
                        <span class="menu-side">
                            <img src="{{ asset('assets/assets/img/icons/menu-icon-08.svg') }}" alt>
                        </span>
                        <span>Créances</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->routeIs('Creance.*') ? 'block' : 'none' }};">
                        <li><a href="{{ route('Creance.index') }}"
                                class="{{ request()->routeIs('Creance.index') ? 'active' : '' }}">Liste des
                                créances</a></li>
                        <li><a href="{{ route('Creance.create') }}"
                                class="{{ request()->routeIs('Creance.create') ? 'active' : '' }}">Ajouter une
                                créance</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
