<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="statistics-details d-flex align-items-center justify-content-between" style="margin-bottom: 6px;">
                          <div class="d-none d-md-block">
                            <div class="row visitor">
                              <div class="col-md-6">
                                  <div class="overlap-group-4">
                                    <img class="icon-awesome-user-check" src="{{asset('public/auth/img/icon-awesome-user-check-1@1x.png')}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="row ">
                                      <div class="col-md-12">
                                        <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Autorisation d'absence</div></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <h1 class="title poppins-semi-bold-gun-powder-49px" style="line-height: 82px;">{{$nbrAbsence ?? "-"}}</h1>
                                     </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row visitor">
                                <div class="col-md-6">
                                    <div class="group-23"></div>
                                     <img class="icon-metro-dollar2" src="{{asset('public/auth/img/icon-metro-dollar2-1@1x.png')}}">
                                </div>
                                <div class="col-md-6">
                                  <div class="row ">
                                      <div class="col-md-12">
                                        <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Demande d'achat</div></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <h1 class="title poppins-semi-bold-gun-powder-49px" style="line-height: 82px;">{{$nbrAchat ?? "-"}}</h1>
                                     </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row visitor">
                                <div class="col-md-6">
                                    <div class="overlap-group2-2">
                                <div class="rectangle-29"></div>
                                <div class="x019-message"></div>
                              </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                      <div class="col-md-12">
                                        <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Mes Notes de Frais</div></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <h1 class="title poppins-semi-bold-gun-powder-49px" style="line-height: 82px;">{{$toutesNotedefrais ?? "-"}}</h1>
                                     </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!--Autorisation d'Absence-->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Autorisation d'Absence en cours</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                  <!--<table class="table select-table" id="table_dmd">-->
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
                                      @foreach($absences as $dmd)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <div>
                                              <h6>{{ucfirst($dmd->user->name)}}</h6>
                                              <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                          <!--<p>company type</p>-->
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                          @if($dmd->statut === 0)
                                            <label class="badge badge-danger">En cours</label>
                                            @else
                                            <label class="badge badge-success">Traité</label>
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
                        <!--Demande de Congé-->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Demandes de congés en cours</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                <table class="table select-table">
                                  <!--<table class="table select-table" id="table_dmd">-->
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
                                            <div>
                                              <h6>{{ucfirst($dmd->user->name)}}</h6>
                                              <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($dmd->motif->libelle)}}</h6>
                                          <!--<p>company type</p>-->
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                          @if($dmd->statut === 0)
                                            <label class="badge badge-danger">En cours</label>
                                            @else
                                            <label class="badge badge-success">Traité</label>
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
                        <!--Justification d'Absence-->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Justification d'absences en cours</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                <table class="table select-table">
                                  <!--<table class="table select-table" id="table_dmd">-->
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
                                      @foreach($justifications as $dmd)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <div>
                                              <h6>{{ucfirst($dmd->user->name)}}</h6>
                                              <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($dmd->motif->libelle)}}</h6>
                                          <!--<p>company type</p>-->
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                          @if($dmd->statut === 0)
                                            <label class="badge badge-danger">En cours</label>
                                            @else
                                            <label class="badge badge-success">Traité</label>
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
                        <!--Demande d'Achat-->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Demandes d'achat en cours</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                  <!--<table class="table select-table" id="table_dmd">-->
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
                                      @foreach($achats as $dmd)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <div>
                                              <h6>{{ucfirst($dmd->user->name)}}</h6>
                                              <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($dmd->motif->libelle)}}</h6>
                                          <!--<p>company type</p>-->
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                          @if($dmd->statut === 0)
                                            <label class="badge badge-danger">En cours</label>
                                            @else
                                            <label class="badge badge-success">Traité</label>
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
                        <!--Note de frais-->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Notes de frais envoyées</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                 <table class="table select-table">
                                  <!--<table class="table select-table" id=table_d>-->
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
                                      @foreach($notedefrais as $ntf)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <div>
                                              <h6>{{ucfirst($ntf->user->name)}}</h6>
                                              <p>{{ucfirst($ntf->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntf->intitulé_projet)}}</h6>
                                          <p>{{ucfirst($ntf->motif->libelle)}}</p>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntf->montant)}} Fcfa</h6>
                                        </td>
                                        <td>
                                          @if($ntf->statut === 0)
                                           <label class="badge badge-danger">En cours</label>
                                           @else
                                           <label class="badge badge-success">Traité</label>
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
                          <div class="col-12 grid-margin stretch-card" style="height: 268%;margin-top: 19px;">
                            <div class="card card-rounded">
                              <div class="card-body" style="height: 8px!important;">
                                <div class="row">
                                  <div class="col-lg-12">
                                     <div class="row">
                                         <div class="col-lg-10">
                                             <div class="overlap-group-10">
                                                  <img class="ellipse-1-1" src="{{asset('public/auth/img/ellipse-1-1@1x.png')}}" />
                                              <img class="icon-awesome-user-lock" src="{{Auth::user()->avatars}}" />
                                             </div>
                                         </div>
                                         <div class="col-lg-2">
                                             <div class="overlap-group1-5">
                                            <img class="rectangle-211" src="{{asset('public/auth/img/rectangle-211-2@1x.png')}}" style="width: 67px;"/>
                                            <div class="title-4 poppins-semi-bold-white-16px" style="font-size: 14px;left: 14%;">{{ucfirst(Auth::user()->profils()->first()->libelle)}}</div>
                                            <div class="title-5 poppins-normal-white-8px" style="position: relative;left: 9%;">Compte</div>
                                          </div>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-lg-12">
                                             <div class="title-2 poppins-normal-gun-powder-25px">{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->prenoms)}}</div>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-lg-12">
                                              <div class="label-ui"><div class="title-3" style="font-size: 13px;margin-left: 4px;margin-top: 7px;">{{ucfirst(Auth::user()->fonctions()->first()->libelle)}}</div></div>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-top: 10px;">
                                         <div class="col-lg-12">
                                                <div class="poppins-normal-delta-15px" style="text-align:center;">Département {{ucfirst(Auth::user()->departement->libelle)}}</div>
                                         </div>
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                         <!-- <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="overlap-group13">
                                          <div class="group-5-1">
                                            <div class="overlap-group-10">
                                              <img class="ellipse-1-1" src="{{asset('public/auth/img/ellipse-1-1@1x.png')}}" />
                                              <img class="icon-awesome-user-lock" src="{{Auth::user()->avatars}}" />
                                            </div>
                                          </div>
                                          <div class="title-name">
                                            <div class="title-2 poppins-normal-gun-powder-25px">{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->prenoms)}}</div>
                                            <div class="label-ui"><div class="title-3" style="font-size: 13px;margin-left: 4px;margin-top: 7px;">{{ucfirst(Auth::user()->fonctions()->first()->libelle)}}</div></div>
                                            <div class="london poppins-normal-delta-15px">Département <br> {{ucfirst(Auth::user()->departement->libelle)}}</div>
                                          </div>
                                          <div class="overlap-group1-5">
                                            <img class="rectangle-211" src="{{asset('public/auth/img/rectangle-211-2@1x.png')}}" style="left: 13%;width: 67px;"/>
                                            <div class="title-4 poppins-semi-bold-white-16px" style="font-size: 14px;left: 14%;">{{ucfirst(Auth::user()->profils()->first()->libelle)}}</div>
                                            <div class="title-5 poppins-normal-white-8px" style="position: relative;left: 9%;">Compte</div>
                                          </div>
                                          <a href="#" class="poppins-medium-spice-15px rectangle-52" style="display: inline-flex;padding: 5px;text-decoration: none;padding-left: 14px;left: 20%;">Mon Compte</a>
                                          <a href="#" class="poppins-medium-white-15px rectangle-51" style="display: inline-flex;padding: 5px;text-decoration: none;padding-left: 21px;left: 78%;">add Profil</a>
                                        </div>
                          </div>
                        </div>-->
                         <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card" style="margin-top: 195px;">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="cerapro-medium-cioccolato-20px">Activités Récentes</h4>
                                      <div class="add-items d-flex mb-0">
                                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                        <a class="btn btn-icons btn-primary text-white me-0 pl-12p" href="{{route('activite')}}">
                                            <i class="mdi mdi-plus"></i>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                          @foreach($activity as $act)
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox" disabled="disabled">{{$act->created_at}}<i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">{{$act->action}}</div>
                                              <div class=" me-3">{{$act->user->name}}</div>
                                            </div>
                                          </div>
                                        </li>
                                          @endforeach
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
                                        <h4 class="cerapro-medium-cioccolato-20px">Dernières connexion</h4>
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
                                      <!--<a class="btn btn-primary btn-lg text-white mb-0 me-0" href="#" style="margin: inherit;margin-left: 78px;">Voir l'historique</a>-->
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