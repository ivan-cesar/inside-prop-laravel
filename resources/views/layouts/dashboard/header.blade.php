<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inside Pro </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('public/dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('public/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/DataTables/datatables.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/DataTables/datatables.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/DataTables/datatables.bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/DataTables/dataTables.bootstrap4.min.css')}}">
  <!--Modal-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/modal/css/ionicons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/modal/css/style.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script type="text/javascript" charset="utf8" src="{{asset('public/dashboard/DataTables/datatables.js')}}" defer></script>
<script>
    $(document).on('click','.nav-item',function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
</script>
<?php use App\Models\User;?>
 <!-- Datatables CSS CDN -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->

    <!-- jQuery CDN -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- Datatables JS CDN -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/dashboard/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="https://inside.demopg.com/public/dashboard/images/favicon.ico" />
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="{{route('home')}}">
            <img src="{{asset('public/dashboard/images/logo.svg')}}" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{route('home')}}">
            <img src="{{asset('public/dashboard/images/favicon.ico')}}" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">{{$module?? ""}}</h1>
            <h3 class="welcome-sub-text">{{$page_description??""}} </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <!--<li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Rechercher ici" title="Rechercher ici">
            </form>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
              <i class="icon-mail icon-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">Vous avez 7 nouvelles notifications </p>
                <span class="badge badge-pill badge-primary float-right">Voir tous</span>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-alert m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">Erreur dans l'application</h6>
                  <p class="fw-light small-text mb-0"> A l'instant </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-settings m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">Paramètres</h6>
                  <p class="fw-light small-text mb-0"> Message privé </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-airballoon m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">Enregistrement d'un nouvel utilisateur</h6>
                  <p class="fw-light small-text mb-0"> il y a 2 jours </p>
                </div>
              </a>
            </div>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              @if(User::getNotification(Auth::user()->id)->count() != 0)
                 <span class="count"></span>
              @else
              
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">Vous avez {{User::getNotification(Auth::user()->id)->count() ?? "-" }} nouvelles notifications</p>
                <span class="badge badge-pill badge-primary float-right">Voir tous</span>
              </a>
              <div class="dropdown-divider"></div>
              @foreach(User::getNotification(Auth::user()->id) as $notif)
              <a class="dropdown-item preview-item">
                <!--<div class="preview-thumbnail">
                  <img src="{{asset('public/dashboard/images/faces/face10.jpg')}}" alt="image" class="img-sm profile-pic">
                </div>-->
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">{{ucfirst($notif->sender)}} </p>
                  <p class="fw-light small-text mb-0"> {{ucfirst($notif->message)}}</p>
                </div>
              </a>
              @endforeach
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{ucfirst(Auth::user()->avatars)}}" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" style="width: 25%;" src="{{ucfirst(Auth::user()->avatars)}}" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->prenoms)}}</p>
                <p class="fw-light text-muted mb-0">{{ucfirst(Auth::user()->email)}}</p>
              </div>
              <a class="dropdown-item" href="">
                  <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> 
                    Mon Profile
              </a>
              <!--<a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activités</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>-->
              <form id="logout" action="/logout" method="POST" style="display: none;">{{ csrf_field() }}</form>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Déconnexion</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="{{asset('public/dashboard/images/faces/face1.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('public/dashboard/images/faces/face2.jpg')}}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('public/dashboard/images/faces/face3.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('public/dashboard/images/faces/face4.jpg')}}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('public/dashboard/images/faces/face5.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('public/dashboard/images/faces/face6.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @switch(Auth::user()->profils()->first()->libelle)
          @case("Admin")
             <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{Route::is('home') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('home')}}">
              <i class="mdi mdi-home-variant  menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
          <li class="nav-item {{Route::is('absences.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('absences.index')}}">
              <i class="menu-icon mdi mdi-file-outline "></i>
              <span class="menu-title">Autorisaton d'absence</span>
            </a>
          </li>
          <li class="nav-item {{Route::is('justifications.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('justifications.index')}}">
              <i class="menu-icon mdi mdi mdi-pencil-box-outline "></i>
              <span class="menu-title">Justification d'absence</span>
            </a>
          </li>
          <li class="nav-item {{Route::is('demandes.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('demandes.index')}}">
              <i class="menu-icon mdi mdi-calendar-blank "></i>
              <span class="menu-title">Demande de congé</span>
            </a>
          </li>
          
          <li class="nav-item {{Route::is('achats.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('achats.index')}}">
              <i class="menu-icon  mdi mdi-wallet "></i>
              <span class="menu-title">Demande d'achat</span>
            </a>
          </li>
          <li class="nav-item {{Route::is('notedefrais.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('notedefrais.index')}}">
              <i class="menu-icon mdi mdi-square-inc-cash "></i>
              <span class="menu-title">Note de frais</span>
            </a>
          </li>
          <li class="nav-item {{Route::is('users.create') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('users.create')}}">
              <i class="menu-icon mdi mdi-account-multiple-outline "></i>
              <span class="menu-title">Utilisateurs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon  mdi mdi-folder-outline "></i>
              <span class="menu-title">Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item {{Route::is('fonctions.index') ? 'active' : ''}}"> <a class="nav-link" href="{{route('fonctions.create')}}"> Poste </a></li>
                <li class="nav-item {{Route::is('departements.index') ? 'active' : ''}}"> <a class="nav-link" href="{{route('departements.index')}}"> Departement </a></li>
                <li class="nav-item {{Route::is('profils.create') ? 'active' : ''}}"> <a class="nav-link" href="{{route('profils.create')}}"> Gestion des profils </a></li>
              </ul>
          </div>
          </li>
        </ul>
      </nav>

          @break
         @case("Manager")
           @include('layouts.managers.nav')
           @break
         @case("Director")
           @include('layouts.directors.nav')
           @break
         @default
          @include('layouts.users.nav')
       @endswitch
