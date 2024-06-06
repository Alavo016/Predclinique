<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><span class=""><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-01.svg') }}" alt></span>
                        <span>Admin Dashboard</span> <span class="menu-arrow"></span>
                    </a>
                </li>
                <li class="submenu {{ request()->routeIs('admin.listdocteur') || request()->routeIs('ajtdoc') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-02.svg') }}" alt></span>
                        <span>Doctors</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->routeIs('admin.listdocteur') || request()->routeIs('ajtdoc') ? 'block' : 'none' }};">
                        <li><a href="{{ route('admin.listdocteur') }}" class="{{ request()->routeIs('admin.listdocteur') ? 'active' : '' }}">Liste des Médecins</a></li>
                        <li><a href="{{ route('ajtdoc') }}" class="{{ request()->routeIs('ajtdoc') ? 'active' : '' }}">Ajouter Médecin</a></li>
                    </ul>
                </li>
                <li class="submenu {{ request()->routeIs('adm_infirmier.index') || request()->routeIs('adm_infirmier.create') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-02.svg') }}" alt></span>
                        <span>Infirmier</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->routeIs('adm_infirmier.index') || request()->routeIs('adm_infirmier.create') ? 'block' : 'none' }};">
                        <li><a href="{{ route('adm_infirmier.index') }}" class="{{ request()->routeIs('adm_infirmier.index') ? 'active' : '' }}">Infirmier liste</a></li>
                        <li><a href="{{ route('adm_infirmier.create') }}" class="{{ request()->routeIs('adm_infirmier.create') ? 'active' : '' }}">Ajout infirmier</a></li>
                    </ul>
                </li>
                <li class="submenu {{ request()->routeIs('adm_Patient.index') || request()->routeIs('adm_Patient.create') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-03.svg') }}" alt></span>
                        <span>Patients</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->routeIs('adm_Patient.index') || request()->routeIs('adm_Patient.create') ? 'block' : 'none' }};">
                        <li><a href="{{ route('adm_Patient.index') }}" class="{{ request()->routeIs('adm_Patient.index') ? 'active' : '' }}">Patients Listes</a></li>
                        <li><a href="{{ route('adm_Patient.create') }}" class="{{ request()->routeIs('adm_Patient.create') ? 'active' : '' }}">Ajout Patient</a></li>
                    </ul>
                </li>
                <li class="submenu {{ request()->routeIs('adm_specialites.index') || request()->routeIs('adm_specialites.create') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-06.svg') }}" alt></span>
                        <span>Departments</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->routeIs('adm_specialites.index') || request()->routeIs('adm_specialites.create') ? 'block' : 'none' }};">
                        <li><a href="{{ route('adm_specialites.index') }}" class="{{ request()->routeIs('adm_specialites.index') ? 'active' : '' }}">Liste Specialiates</a></li>
                        <li><a href="{{ route('adm_specialites.create') }}" class="{{ request()->routeIs('adm_specialites.create') ? 'active' : '' }}">Ajout specialité</a></li>
                    </ul>
                </li>
                <li class="submenu {{ request()->is('instruments') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side"><i class="fa-solid fa-stethoscope"></i></span>
                        <span>Type d'instruments</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ request()->is('instruments') ? 'block' : 'none' }};">
                        <li><a href="invoices.html" class="{{ request()->is('invoices') ? 'active' : '' }}">Invoices</a></li>
                        <li><a href="payments.html" class="{{ request()->is('payments') ? 'active' : '' }}">Payments</a></li>
                        <li><a href="expenses.html" class="{{ request()->is('expenses') ? 'active' : '' }}">Expenses</a></li>
                        <li><a href="taxes.html" class="{{ request()->is('taxes') ? 'active' : '' }}">Taxes</a></li>
                        <li><a href="provident-fund.html" class="{{ request()->is('provident-fund') ? 'active' : '' }}">Provident Fund</a></li>
                    </ul>
                </li>
            </ul>
            
        </div>
    </div>
</div>
