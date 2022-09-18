@extends('layouts.template')
@section('content')
    @switch(Auth::user()->profils()->first()->libelle)
      @case("Admin")
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div class="d-none d-md-block">
                            <div class="row">
                              <div class="visitor">
                                <div class="overlap-group-4">
                                  <img class="icon-awesome-user-check" src="https://inside.demopg.com/required/auth/img/icon-awesome-user-check-1@1x.png">
                                </div>
                                <div class="flex-col">
                                  <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Employés</div></div>
                                  <h1 class="title poppins-semi-bold-gun-powder-49px"><?= $nbrUser = DB::table('users')->count();?></h1>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                              <div class="new-user">
                              <div class="overlap-group1-1">
                                <div class="background"></div>
                                <div class="group-22"><div class="new-user-1 poppins-medium-delta-14px">Note de Frais</div></div>
                                <div class="group-23"></div>
                                <div class="number poppins-semi-bold-gun-powder-49px">{{$nbrFrais}}</div>
                                <img class="icon-metro-dollar2" src="https://inside.demopg.com/required/auth/img/icon-metro-dollar2-1@1x.png">
                              </div>
                            </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                              <div class="unread-email">
                              <div class="overlap-group2-2">
                                <div class="rectangle-29"></div>
                                <div class="x019-message"></div>
                                <div class="ellipse-17"></div>
                                <div class="number-1"><?= $nbrDemande = DB::table('demandes')->count();?></div>
                              </div>
                              <div class="group-26">
                                <div class="group-24"><div class="email-unread poppins-medium-delta-14px">Demandes</div></div>
                                <div class="text-1 poppins-semi-bold-gun-powder-49px"><?= $nbrDemande = DB::table('demandes')->count();?></div>
                              </div>
                            </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                              <div class="capacity">
                                              <div class="chart" style="top: -70px;position: relative;">
                                                <div class="overlap-group-5">
                                                  <img class="vector-8-1" src="https://inside.demopg.com/required/auth/img/vector-10-1@1x.png">
                                                  <div class="rectangle-30"></div>
                                                </div>
                                                <div class="overlap-group">
                                                  <img class="vector" src="https://inside.demopg.com/required/auth/img/vector-10-1@1x.png">
                                                  <div class="rectangle-31"></div>
                                                </div>
                                                <div class="overlap-group2-3">
                                                  <img class="vector" src="https://inside.demopg.com/required/auth/img/vector-10-1@1x.png">
                                                  <div class="rectangle-32"></div>
                                                </div>
                                                <div class="overlap-group">
                                                  <img class="vector" src="https://inside.demopg.com/required/auth/img/vector-10-1@1x.png">
                                                  <div class="rectangle-33"></div>
                                                </div>
                                              </div>
                                              <div class="title-chart" style="position: relative;top: -50%;">
                                                <div class="group-25"><div class="capacity-1 poppins-medium-delta-14px">Justifications</div></div>
                                                <div class="number-2 poppins-semi-bold-gun-powder-49px"><?= $nbrJustification = DB::table('justifications')->count();?></div>
                                              </div>
                                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div class="chartjs-wrapper mt-5">
                                  <canvas id="performaneLine"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="overlap-group13">
                                          <div class="group-5-1">
                                            <div class="overlap-group-10">
                                              <img class="ellipse-1-1" src="{{asset('auth/img/ellipse-1-1@1x.png')}}" />
                                              <img class="icon-awesome-user-lock" src="{{asset('auth/img/icon-awesome-user-lock-1@1x.png')}}" />
                                            </div>
                                          </div>
                                          <div class="title-name">
                                            <div class="title-2 poppins-normal-gun-powder-25px">{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->prenoms)}}</div>
                                            <div class="label-ui"><div class="title-3">{{ucfirst(Auth::user()->fonctions()->first()->libelle)}}</div></div>
                                            <div class="london poppins-normal-delta-15px">Département <br> {{ucfirst(Auth::user()->departement->libelle)}}</div>
                                          </div>
                                          <div class="overlap-group1-5">
                                            <img class="rectangle-211" src="{{asset('auth/img/rectangle-211-2@1x.png')}}" />
                                            <div class="title-4 poppins-semi-bold-white-16px">{{ucfirst(Auth::user()->profils()->first()->libelle)}}</div>
                                            <div class="title-5 poppins-normal-white-8px">Compte</div>
                                          </div>
                                          <a href="#" class="poppins-medium-spice-15px rectangle-52" style="display: inline-flex;padding: 8px;">Mon Compte</a>
                                          <a href="#" class="poppins-medium-white-15px rectangle-51" style="display: inline-flex;padding: 8px;">add Profil</a>
                                        </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card-balance">
              <div class="overlap-group12">
                <div class="wednesday-march-16nd-2021-1214-am poppins-normal-white-14px">2021 - 2022</div>
                <div class="title-name-card">
                  <div class="my-balance poppins-medium-white-15px-2">
                    <span class="poppins-medium-white-15px">Montant Annuel <br /></span
                    ><span class="poppins-medium-white-10px">Demande d&#39;achat</span>
                  </div>
                  <div class="x2352500 poppins-semi-bold-white-25px-2">
                    <span class="poppins-semi-bold-white-25px">23 525 000 </span
                    ><span class="poppins-semi-bold-white-25px">FCFA</span>
                  </div>
                </div>
                <div class="overlap-group1-6">
                  <img class="subtract-2" src="{{asset('auth/img/subtract-128@1x.png')}}" />
                  <img class="subtract-3" src="{{asset('auth/img/subtract-129@1x.png')}}" />
                  <img class="ellipse-4-1" src="{{asset('auth/img/ellipse-4-1@1x.png')}}" />
                </div>
                <div class="x064-menu-3">
                  <img class="vector-10" src="{{asset('auth/img/vector-113@1x.png')}}" />
                  <img class="vector-5" src="{{asset('auth/img/vector-113@1x.png')}}" />
                  <img class="vector-5" src="{{asset('auth/img/vector-113@1x.png')}}" />
                </div>
              </div>
              <div class="overlap-group-11">
                <div class="rectangle-48"></div>
                <div class="main-wallet poppins-medium-white-13px">Visualiser</div>
                <div class="x040-wallet-1"></div>
              </div>
            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Demandes En Cours</h4>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Utilsateurs</th>
                                        <th>Type de demande</th>
                                        <th>Date/heure</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($demandes as $dmd)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="images/faces/face1.jpg" alt="">
                                            <div>
                                              <h6>{{ucfirst($dmd->user->name)}}</h6>
                                              <p>{{ucfirst(Auth::user()->fonctions()->first()->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                          <p>company type</p>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:m',strtotime($dmd->date_depart))}}</h6>
                                        </td>
                                        <td>
                                          @if($dmd->statut === 0)
                                            <label class="badge badge-danger">En cours</label>
                                            @else
                                            <label class="badge badge-success">Actif</label>
                                            @endif
                                          <!--<div class="badge badge-opacity-warning">In progress</div>-->
                                        </td>
                                      </tr>
                                       @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Note de frais non-traité</h4>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Employés</th>
                                        <th>Projets Lié</th>
                                        <th>Montant</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($notedefrais as $ntfrais)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="images/faces/face1.jpg" alt="">
                                            <div>
                                              <h6>{{ucfirst($ntfrais->user->name)}}</h6>
                                              <p>{{ucfirst(Auth::user()->fonctions()->first()->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->projet)}}</h6>
                                          <p>{{ucfirst($ntfrais->motifFrais)}}</p>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->montant)}}</h6>
                                        </td>
                                        <td>
                                          @if($ntfrais->statut === 0)
                                           <label class="badge badge-danger">En cours</label>
                                           @else
                                           <label class="badge badge-success">Actif</label>
                                           @endif
                                        </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="card-title card-title-dash">Activités Récentes</h4>
                                      <div class="add-items d-flex mb-0">
                                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                        <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                      </div>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> 29 Juin 2022, 04:35<i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">Ajoute d'utilisateur par</div>
                                              <div class=" me-3">Paul Koffi</div>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> 30 Juin 2022 14:35 <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">Modification de Rôles par</div>
                                              <div class="me-3">Paul Koffi</div>
                                            </div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Dernières connexion</h4>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Admin - 192.168.23.22</p>
                                            <small class="text-muted mb-0">Aujourd'hui, 12:30</small>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Admin - 192.168.23.22</p>
                                            <small class="text-muted mb-0">Aujourd'hui, 12:30</small>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

      </div>
      @break
    @case("Manager")
    @include('layouts.managers.body')
    @break
    @case("Director")
    @include('layouts.directors.body')
    @break
    @default
    @include('layouts.users.body')
    @endswitch

@endsection
