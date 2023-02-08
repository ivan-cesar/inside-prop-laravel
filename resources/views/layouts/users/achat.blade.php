                    <div class="row">
                      <div class="col-sm-12">
                        <div class="stat statistics-details d-flex align-items-center justify-content-between">
                          <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-4">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/icon-awesome-calendar-check-10@1x.png')}}">
                                  </div>
                                    <h6 style="margin-top: 10px; text-align: center;">{{$somAccepter ?? "-" }} Fcfa</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Traitées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbAccepter ?? "-"}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                                    <div class="col-md-4">
                                    <div class="icon-rejeter">
                                    <img class="icon-awesome-calendar-check" style="width:40px;height:40px" src="{{asset('public/auth/img/icon-material-cancel-12@1x.png')}}">
                                  </div>
                                  <h6 style="margin-top: 10px; text-align: center;"> {{$somRejeter ?? "-" }} Fcfa</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Rejetées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbRejeter ?? "-"}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-non">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/non-trait.png')}}">
                                  </div>
                                  <h6 style="margin-top: 10px; text-align: center;">{{$somAttente ?? "-" }} Fcfa</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Non-Traitées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$nbAttente ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique de mes achats</h4>
                                  </div>
                                  <!--<div class="frame-376">
                                    <span class="number-3 cerapro-medium-mine-shaft-16px">{{$toutesAchat ?? "-"}}</span>
                                    </div>-->
                                  <div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" target="_blank" href="{{route('achats.createUserpdf')}}"><i class="mdi mdi-export"></i>Exporter</a>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table" id="table_dmd">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Type d'achat</th>
                                        <th>Intitulé du projet</th>
                                        <th>Fichier</th>
                                        <th>Date/heure</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($achats as $achat)
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
                                              <h6> {{ucfirst($achat->motif->libelle)}}</h6>
                                              <p> {{ucfirst($achat->user->name)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td><h6>{{ucfirst($achat->intitule_projet)}}</h6></td>
                                        <td>
                                            <img src="https://inside.demopg.com/public/auth/img/icon-metro-file-pdf-12@1x.png"/>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($achat->created_at))}}</h6>
                                        </td>
                                        <td>
                                                @if($achat->statut === 0)
                                      <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($achat->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                        @if($achat->statut === 0)
                                        <td>
									    <div class="iv_row">
									        <div class="iv_edit">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('achats.edit',$achat->id)}}">
									               <i class="menu-icon mdi mdi-pencil"></i>
									           </a>
									        </div>
									        <div class="iv_delete">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('achats.delete',$achat->id)}}" onclick="return confirm('Voulez-vous Supprimer cette demande d'achat ?')">
									               <i class="mdi mdi-delete-sweep"></i>
									           </a>
									        </div>
									    </div>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
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
                    </div>