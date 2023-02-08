
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{Route::is('home') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('home')}}">
                <i class="mdi mdi-home-variant  menu-icon"></i>
                <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon  mdi mdi-file-outline"></i>
                <span class="menu-title">Autorisaton d'absence</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{Route::is('absences.index') ? 'active' : ''}}"> <a class="nav-link" href="{{route('absences.index')}}"> Les demandes </a></li>
                    <li class="nav-item {{Route::is('absences.create') ? 'active' : ''}}"> <a class="nav-link" href="{{route('absences.create')}}"> Gérer mes demandes </a></li>

                </ul>
            </div>
        </li>
                <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi mdi-pencil-box-outline "></i>
                <span class="menu-title">Justification d'absence</span>
                <i class="menu-arrow"></i>
            </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{Route::is('justifications.index') ? 'active' : ''}}"> <a class="nav-link" href="{{route('justifications.index')}}"> Collaborateurs </a></li>
                        <li class="nav-item {{Route::is('justifications.create') ? 'active' : ''}}"> <a class="nav-link" href="{{route('justifications.create')}}"> Mes Justifications </a></li>
                    </ul>
                </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#ui-ba" aria-expanded="false" aria-controls="ui-ba">
                <i class="menu-icon  mdi mdi-calendar-blank "></i>
                <span class="menu-title">Demande de congé</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-ba">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{Route::is('demandes.index') ? 'active' : ''}}"> <a class="nav-link" href="{{route('demandes.index')}}"> Les demandes </a></li>
                    <li class="nav-item {{Route::is('demandes.create') ? 'active' : ''}}"> <a class="nav-link" href="{{route('demandes.create')}}"> Gérer mes demandes </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-ele" aria-expanded="false" aria-controls="form-ele">
                 <i class="menu-icon  mdi mdi-wallet "></i>
                <span class="menu-title">Demande d'achat</span>
                <i class="menu-arrow"></i>
            </a>
                <div class="collapse" id="form-ele">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{Route::is('achats.index') ? 'active' : ''}}"> <a class="nav-link" href="{{route('achats.index')}}">Les achats</a></li>
                        <li class="nav-item {{Route::is('achats.create') ? 'active' : ''}}"> <a class="nav-link" href="{{route('achats.create')}}">Gérer mes achats</a></li>
                    </ul>
                </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#form-elem" aria-expanded="false" aria-controls="form-elem">
                <i class="menu-icon  mdi mdi-square-inc-cash"></i>
                <span class="menu-title">Note de frais</span>
                <i class="menu-arrow"></i>
            </a>
                            <div class="collapse" id="form-elem">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{Route::is('notedefrais.index') ? 'active' : ''}}"> <a class="nav-link" href="{{route('notedefrais.index')}}">Les notes de frais</a></li>
                        <li class="nav-item {{Route::is('notedefrais.create') ? 'active' : ''}}"> <a class="nav-link" href="{{route('notedefrais.create')}}">Gérer mes notes de frais</a></li>
                    </ul>
                </div>
        </li>
        <li class="nav-item {{Route::is('users.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="menu-icon  mdi mdi-account-multiple-outline "></i>
                <span class="menu-title">Collaborateur</span>
            </a>
        </li>
    </ul>
</nav>
