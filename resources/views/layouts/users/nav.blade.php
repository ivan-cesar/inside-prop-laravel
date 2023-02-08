
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{Route::is('home') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('home')}}">
                <i class="mdi mdi-home-variant  menu-icon"></i>
                <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
        <li class="nav-item {{Route::is('absences.create') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('absences.create')}}">
                <i class="menu-icon  mdi mdi-file-outline"></i>
                <span class="menu-title">Autorisaton d'absence</span>
            </a>
        </li>
        <li class="nav-item {{Route::is('justifications.create') ? 'active' : ''}}">
            <a class="nav-link"  href="{{route('justifications.create')}}">
                <i class="menu-icon mdi mdi mdi-pencil-box-outline "></i>
                <span class="menu-title">Justification d'absence</span>
            </a>
        </li>
        <li class="nav-item {{Route::is('demandes.create') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('demandes.create')}}">
                <i class="menu-icon  mdi mdi-calendar-blank "></i>
                <span class="menu-title">Demande de congé</span>
            </a>
        </li>

        <li class="nav-item {{Route::is('achats.create') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('achats.create')}}">
                 <i class="menu-icon  mdi mdi-wallet "></i>
                <span class="menu-title">Demande d'achat</span>
            </a>
        </li>
        <li class="nav-item {{Route::is('notedefrais.create') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('notedefrais.create')}}">
                <i class="menu-icon  mdi mdi-square-inc-cash"></i>
                <span class="menu-title">Note de frais</span>
            </a>
        </li>
    </ul>
</nav>
