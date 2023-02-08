@extends('layouts.template')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                        @switch(Auth::user()->profils()->first()->libelle)
                           @case ("Admin")
                              <div class="row">
                      <div class="col-sm-12">
                        <div class="stat statistics-details d-flex align-items-center justify-content-between">
                          <div class="d-none d-md-block">
                            <div class="row">
                              <div class="visitor">
                                <div class="icon-4">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/icon-awesome-calendar-check-10@1x.png')}}">
                                  </div>
                                <div class="flex-col">
                                  <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Acceptées</div></div>
                                  <h1 class="title poppins-semi-bold-gun-powder-49px">{{$nbTraites ?? "-"}}</h1>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                              <div class="new-user">
                                <div class="overlap-group1-1">
                                  <div class="stat"></div>
                                  <div class="group-22"><div class="new-user-1 poppins-medium-delta-14px">Rejetées</div></div>
                                  <div class="rejet-ico"></div>
                                  <div class="number poppins-semi-bold-gun-powder-49px" style="margin-left: 20px;">{{$nbRejeter ?? "-"}}</div>
                                  <img class="icon-close" src="{{asset('public/auth/img/icon-material-cancel-12@1x.png')}}">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                              <div class="att-stat">
                                <div class="overlap-group2-2">
                                  <div class="rectangle_29"></div>
                                  <div class="x0-message"></div>
                                </div>
                                <div class="group-26">
                                  <div class="group-24"><div class="email-unread poppins-medium-delta-14px">En attente</div></div>
                                  <div class="text-1 poppins-semi-bold-gun-powder-49px">{{$nbNonTraites ?? "-"}}</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                              @break
                           @default
                           <div class="row">
                      <div class="col-sm-12">
                        <div class="stat statistics-details d-flex align-items-center justify-content-between">
                                                    <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-4">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/icon-awesome-calendar-check-10@1x.png')}}">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Acceptées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbTraites ?? "-"}}</h1>
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
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">En attente</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$nbNonTraites ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                        @endswitch
                    @switch(Auth::user()->profils()->first()->libelle)
                         @case ("Manager")
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Mes Justifications</h4>
                                  </div>
                                  <!--<div class="frame-376">
                                    <span class="number-3 cerapro-medium-mine-shaft-16px">{{$toutesJustifications ?? "-"}}</span>
                                    </div>-->
                                  <div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" target="_blank" href="{{route('justifications.createUserpdf')}}"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Motif de justification</th>
                                        <th>Description</th>
                                        <th>Date/heure</th>
                                        <th>Piece Jointe</th>
                                        <th>Statut</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($justifications as $jst)
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
                                              <h6>{{ucfirst($jst->motif->libelle)}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{!!html_entity_decode($jst->description)!!}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($jst->created_at))}}</h6>
                                        </td>
                                        <td>
                                          <h6><img src="https://inside.demopg.com/public/auth/img/icon-metro-file-pdf-12@1x.png"/></h6>
                                        </td>
                                        <td>
                                        @if($jst->statut === 0)
                                      <label class="badge badge-warning" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($jst->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
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
                    </div>
                       @break
                    @default
                                          <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Mes Justifications</h4>
                                  </div>
                                  <!--<div class="frame-376">
                                    <span class="number-3 cerapro-medium-mine-shaft-16px">{{$toutesJustifications ?? "-"}}</span>
                                    </div>-->
                                  <div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" target="_blank" href="{{route('justifications.createUserpdf')}}"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Motif de justification</th>
                                        <th>Description</th>
                                        <th>Date/heure</th>
                                        <th>Piece Jointe</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($justifications as $jst)
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
                                              <h6>{{ucfirst($jst->motif->libelle)}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{!!html_entity_decode($jst->description)!!}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($jst->created_at))}}</h6>
                                        </td>
                                        <td>
                                          <h6><img src="https://inside.demopg.com/public/auth/img/icon-metro-file-pdf-12@1x.png"/></h6>
                                        </td>
                                        <td>
                                        @if($jst->statut === 0)
                                      <label class="badge badge-warning" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($jst->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                         @if($jst->statut === 0)
                                         <td>
                                          <div class="iv_row">
									        <div class="iv_edit">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('justifications.edit',$jst->id)}}">
									               <i class="menu-icon mdi mdi-pencil"></i>
									           </a>
									        </div>
									        <div class="iv_delete">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('justifications.delete',$jst->id)}}" onclick="return confirm('Voulez-vous Supprimer cette Justification d'absence ?')">
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
                    @endswitch
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                            @include('flashmessage')
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">
                                      Formulaire de justification
                                      </h4>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <form method="post" action="{{route('justifications.store')}}" enctype="multipart/form-data">
                                      @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Motif de justification</label>
                                              <select name="motif_id" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px
                                              @error('motif_id') is-invalid @enderror" data-select2-id="1" tabindex="-1" 
                                              aria-hidden="true">
                                                <option selected>Sélectionnez un motif</option>
                                                @foreach ($motifs as $mConge)
                                                <option value="{{ucfirst($mConge->id)}}">{{ucfirst($mConge->libelle)}}</option>
                                                @endforeach
                                              </select>
                                              <!-- Le message d'erreur -->
                                                    		@error('motif_id')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Date de depart</label>
                                              <input class="poppins-normal-black-16px form-control date @error('date_depart') is-invalid @enderror" type="date" name="date_depart">
                                              <!-- Le message d'erreur -->
                                                    		@error('date_depart')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Date de retour</label>
                                              <input class="poppins-normal-black-16px form-control date @error('date_depart') is-invalid @enderror" type="date" name="date_retour">
                                               <!-- Le message d'erreur -->
                                                    		@error('date_retour')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Ajouter un Fichier</label>
                                              <div class="overlap-group8">
                                                <div class="bg" style="box-shadow: 1px 0px 4px 1px black; border: 1px dashed black;border-radius: 12px;height: 201px;width: 385px;margin-top: 12px;">
                                                    <!--<img class="bg-1" src="{{asset('public/auth/img/bg-13@1x.png')}}"></div>-->
                                                <p class="choisir-les-fichiers-tlcharger manrope-bold-black-14px" style="top:84px;">Choisir les fichiers à télécharger</p>
                                                <div class="ou manrope-normal-shadow-blue-14px" style="top:109px;">ou</div>
                                                <button type="submit" class="button-browse-file border-1px-cararra" style="position: relative;top: 77%;left: 25%;">
                                                  <img class="icon-upload" src="{{asset('public/auth/img/icon-upload-1@1x.png')}}">
                                                  <div class="parcourir-les-fichiers manrope-bold-shadow-blue-14px" style="font-size: 14px;padding-top: 6px;">Parcourir les fichiers</div>
                                                </button>
                                                        <input name="file" type="file" class="uploader" onchange="readURL(this);" accept="image/*,.pdf,.docx" multiple>
                                                <img class="rectangle-54" style="top:8px;"src="{{asset('public/auth/img/rectangle-54-1@1x.png')}}" id="image">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="poppins-normal-black-16px">Informations complementaire</label>
                                          <textarea name="description" class="poppins-normal-black-16px @error('description') is-invalid @enderror" id='tinyMceExample'></textarea>
                                           <!-- Le message d'erreur -->
                                                    		@error('description')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                         <div class="form-group">
                                          <label class="poppins-normal-black-16px">Departement</label>
                                            <input class="poppins-normal-black-16px form-control" type="text" value="{{$departement->libelle ?? "Aucun departement"}}" name="departement" disabled>
                                         </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="poppins-normal-black-16px">Responsable Departement</label>
                                          <input class="poppins-normal-black-16px form-control" type="text" value="{{$responsable->name ?? "Aucun responsable"}}" name="responsable" disabled>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-9">
                                        <div class="form-group">
                                          <div class="form-check form-check-warning">
                                            <label class="poppins-normal-black-16px form-check-label">
                                              <input type="checkbox" class="form-check-input" checked="">
                                              M'envoyer une copie par e-mail
                                            <i class="input-helper"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <div class="input-group-append">
                                            <button class="btn btn-sm button-next manrope-bold-white-16px" type="submit">Soumettre</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
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
        <!-- partial -->
      </div>
            <script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                extension = e.target.result.split(".").pop();
                var tes = extension.slice(0, 15);
                $('#image')
                    .attr('src', tes == "data:image/jpeg" ? e.target.result : "https://inside.demopg.com/public/auth/img/pdf.png")
                    .width(127)
                    .height(84);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
.uploader {
opacity: 0;
position: absolute;
z-index: 1;
left: 0;
top: 82%;
cursor: pointer;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
