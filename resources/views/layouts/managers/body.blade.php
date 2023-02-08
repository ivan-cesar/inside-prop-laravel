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
                              <div class="row visitor">
                                  <div class="col-md-6">
                                      <div class="overlap-group-4">
                                        <img class="icon-awesome-user-check" src="{{asset('public/auth/img/icon-awesome-user-check-1@1x.png')}}">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="row ">
                                      <div class="col-md-12">
                                        <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Mes Collaborateurs</div></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <h1 class="title poppins-semi-bold-gun-powder-49px" style="line-height: 82px;">{{$nbrUser ?? "-"}}</h1>
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
                                        <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Achats Approuvés</div></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <h1 class="title poppins-semi-bold-gun-powder-49px" style="line-height: 82px;">{{$nbrFrais ?? "-"}}</h1>
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
                                        <div class="ellipse-17"></div>
                                        <div class="number-1"><?= $nbrDemande = DB::table('demandes')->count();?></div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="row ">
                                      <div class="col-md-12">
                                        <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Mes Demandes</div></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <h1 class="title poppins-semi-bold-gun-powder-49px" style="line-height: 82px;"><?= $nbrDemande = DB::table('demandes')->count();?></h1>
                                     </div>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <div class="d-none d-md-block">
                              <div class="row visitor">
                                  <div class="col-md-6">
                                      <div class="chart" style="top: -37px;position: relative;">
                                                <div class="overlap-group-5">
                                                  <img class="vector-8-1" src="{{asset('public/auth/img/vector-10-1@1x.png')}}">
                                                  <div class="rectangle-30"></div>
                                                </div>
                                                <div class="overlap-group">
                                                  <img class="vector" src="{{asset('public/auth/img/vector-10-1@1x.png')}}">
                                                  <div class="rectangle-31"></div>
                                                </div>
                                                <div class="overlap-group2-3">
                                                  <img class="vector" src="{{asset('public/auth/img/vector-10-1@1x.png')}}">
                                                  <div class="rectangle-32"></div>
                                                </div>
                                                <div class="overlap-group">
                                                  <img class="vector" src="{{asset('public/auth/img/vector-10-1@1x.png')}}">
                                                  <div class="rectangle-33"></div>
                                                </div>
                                              </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="row ">
                                      <div class="col-md-12">
                                        <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Justifications</div></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <h1 class="title poppins-semi-bold-gun-powder-49px" style="line-height: 82px;"><?= $nbrJustification = DB::table('justifications')->count();?></h1>
                                     </div>
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
                          <div class="col-12 grid-margin stretch-card" style="margin-bottom: 0px!important;">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Demandes d'Absences</h4>
                                  </div>
                                  <!--<div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                  <!--<table class="table select-table display" id="table_dmd">-->
                                  <table class="table select-table display">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Utilisateurs</th>
                                        <th>Type de demande</th>
                                        <th>Date/heure</th>
                                        <th>Statut</th>
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
                                            <img src="{{ucfirst($dmd->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($dmd->user->name)}}</h6>
                                              <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                          @if($dmd->statut === 0)
                                            <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
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
                        

                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card" style="background: #fff;border-radius: 15px;margin-bottom: 0px;">
                            <div class="card card-rounded" style="height: 67%!important;">
                              <div class="card-body">
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
                                            <img class="rectangle-211" src="{{asset('public/auth/img/rectangle-211-2@1x.png')}}" style="width: 67px;left: 70%!important;top: -2%!important;"/>
                                            <div class="title-4 poppins-semi-bold-white-16px" style="font-size: 14px; left: 73%!important;">{{ucfirst(Auth::user()->profils()->first()->libelle)}}</div>
                                            <div class="title-5 poppins-normal-white-8px" style="position: relative; left: 120%!important;">Compte</div>
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
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 d-flex flex-column">
                            <div class="row flex-grow">
                          <div class="col-md-12 grid-margin stretch-card" style="padding-right: 0px;">
                            <div class="card-balance" style="width: 97%!important;">
              <div class="overlap-group12" style="left: 7%!important;">
                <div class="wednesday-march-16nd-2021-1214-am poppins-normal-white-14px">{{ now()->year }} - {{ now()->year + 1 }}</div>
                <div class="title-name-card">
                  <div class="my-balance poppins-medium-white-15px-2">
                    <span class="poppins-medium-white-15px">Montant Annuel <br /></span
                    ><span class="poppins-medium-white-10px">Demande d'achat</span>
                  </div>
                  <div class="x2352500 poppins-semi-bold-white-25px-2">
                    <span class="poppins-semi-bold-white-25px">{{ number_format($totalMontant,'0','','.') ?? ""}}</span
                    ><span class="poppins-semi-bold-white-25px">FCFA</span>
                  </div>
                </div>
                <div class="overlap-group1-6">
                  <img class="subtract-2" src="{{asset('public/auth/img/subtract-128@1x.png')}}" />
                  <img class="subtract-3" src="{{asset('public/auth/img/subtract-129@1x.png')}}" />
                  <img class="ellipse-4-1" src="{{asset('public/auth/img/ellipse-4-1@1x.png')}}" />
                </div>
                <div class="x064-menu-3">
                  <a href="#" style="text-decoration:none">
                      <img class="vector-10" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                      <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                      <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                   </a>
                </div>
              </div>
              <div class="overlap-group-11">
                <div class="rectangle-48"></div>
                <div class="main-wallet poppins-medium-white-13px">
                    <a href="#" style="text-decoration:none;color:#fff;">
                        Visualiser
                         </a>
                        </div>
                <div class="x040-wallet-1"></div>
              </div>
            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 d-flex flex-column">
                            <div class="row flex-grow">
                          <div class="col-md-12 grid-margin stretch-card" style="padding-right: 0px;margin-left:20px">
                            <div class="card-balance" style="width: 97%!important;">
              <div class="overlap-group12" style="left: 7%!important;">
                <div class="wednesday-march-16nd-2021-1214-am poppins-normal-white-14px">{{ now()->year }} - {{ now()->year + 1 }}</div>
                <div class="title-name-card">
                  <div class="my-balance poppins-medium-white-15px-2">
                    <span class="poppins-medium-white-15px">Montant Mensuel <br /></span
                    ><span class="poppins-medium-white-10px">Demande d'achat</span>
                  </div>
                  <div class="x2352500 poppins-semi-bold-white-25px-2">
                    <span class="poppins-semi-bold-white-25px">{{ number_format($somTotalMensuel,'0','','.') ?? ""}}</span
                    ><span class="poppins-semi-bold-white-25px">FCFA</span>
                  </div>
                </div>
                <div class="overlap-group1-6">
                  <img class="subtract-2" src="{{asset('public/auth/img/subtract-128@1x.png')}}" />
                  <img class="subtract-3" src="{{asset('public/auth/img/subtract-129@1x.png')}}" />
                  <img class="ellipse-4-1" src="{{asset('public/auth/img/ellipse-4-1@1x.png')}}" />
                </div>
                <div class="x064-menu-3">
                  <a href="#" style="text-decoration:none">
                      <img class="vector-10" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                      <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                      <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                   </a>
                </div>
              </div>
              <div class="overlap-group-11">
                <div class="rectangle-48"></div>
                <div class="main-wallet poppins-medium-white-13px">
                    <a href="#" style="text-decoration:none;color:#fff;">
                        Visualiser
                         </a>
                        </div>
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
                                    <h4 class="cerapro-medium-cioccolato-20px">Demandes d'Achats</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                  <!--<table class="table select-table" id="table_d">-->
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Utilisateurs</th>
                                        <th>Type de demande</th>
                                        <th>Date/heure</th>
                                        <th>Statut</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($achats as $ntfrais)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($ntfrais->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($ntfrais->user->name)}}</h6>
                                              <p>{{ucfirst($ntfrais->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->motif->libelle)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->created_at)}}</h6>
                                        </td>
                                        <td>
                                          @if($ntfrais->statut === 0)
                                           <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
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

                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Demandes de Congés</h4>
                                  </div>
                                  <!--<div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                  <!--<table class="table select-table display" id="table_dmd">-->
                                  <table class="table select-table display">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Utilisateurs</th>
                                        <th>Type de demande</th>
                                        <th>Date/heure</th>
                                        <th>Statut</th>
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
                                            <img src="{{ucfirst($dmd->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($dmd->user->name)}}</h6>
                                              <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($dmd->motif->libelle)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                          @if($dmd->statut === 0)
                                            <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
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
                                    <h4 class="cerapro-medium-cioccolato-20px">Justifications d'Absences</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                  <!--<table class="table select-table" id="table_d">-->
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Utilisateurs</th>
                                        <th>Type de demande</th>
                                        <th>Date/heure</th>
                                        <th>Statut</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($justifications as $ntfrais)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($dmd->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($ntfrais->user->name)}}</h6>
                                              <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->motif->libelle)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->created_at)}} Fcfa</h6>
                                        </td>
                                        <td>
                                          @if($ntfrais->statut === 0)
                                           <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
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
                         <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Note de Frais</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                  <!--<table class="table select-table" id="table_d">-->
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Utilisateurs</th>
                                        <th>Projets Lié</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
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
                                            <img src="{{ucfirst($ntfrais->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($ntfrais->user->name)}}</h6>
                                              <p>{{ucfirst($ntfrais->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->projet)}}</h6>
                                          <br>
                                          <p>{{ucfirst($ntfrais->motifFrais)}}</p>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->montant)}} Fcfa</h6>
                                        </td>
                                        <td>
                                          @if($ntfrais->statut === 0)
                                           <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
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
                                                 <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="cerapro-medium-cioccolato-20px">Listes des Employés</h4>
                                  </div>
                                  <!--<div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>-->
                                </div>
                                <div class="table-responsive  mt-1">
                                  <!--<table class="table select-table" id="table_d">-->
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Utilisateurs</th>
                                        <th>Departement</th>
                                        <th>Date d'Arriver</th>
                                        <th>Statut</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($users as $ntfrais)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($ntfrais->avatars) ?? ""}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($ntfrais->name)}}</h6>
                                              <p>{{ucfirst($ntfrais->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->departement->libelle)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->created_at)}}</h6>
                                        </td>
                                        <td>
                                          @if($ntfrais->statut === 0)
                                           <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
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