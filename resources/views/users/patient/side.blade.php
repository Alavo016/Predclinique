<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="submenu">
                    <a href="{{ route('patient.statistique') }}"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-01.svg') }}" alt></span>
                        <span> Statitique</span> </span></a>

                </li>

                <li >
                    <a href="{{ route("patient.rdv") }}"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-04.svg') }}" alt></span>
                        <span> Dossier Médical </span> </a>

                </li>
                <li >
                    <a href="{{ route("patient.rdv") }}"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-04.svg') }}" alt></span>
                        <span> Rendez-Vous </span> </a>

                </li>


                <li class="submenu">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-09.svg') }}" alt></span>
                        <span> Liste des Creances  </span> </a>
                    <ul style="display: none;">
                        <li><a href="salary.html"> Employee Salary </a></li>
                        <li><a href="salary-view.html"> Payslip </a></li>
                    </ul>
                </li>
                <li>
                    <a href="chat.html"><span class="menu-side"><img
                                src="{{ asset('assets/assets/img/icons/menu-icon-10.svg') }}" alt></span>
                        <span>Chat</span></a>
                </li>

            </ul>

        </div>
    </div>
</div>
