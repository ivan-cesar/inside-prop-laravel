@extends('layouts.template')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
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
                          <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-report">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/reporte.png')}}">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Reportées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$nbReporte ?? "-"}}
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
                    @switch(Auth::user()->profils()->first()->libelle)
                      @case("Manager")
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique de mes Congés</h4>
                                  </div>
                                  <!--<div class="frame-376">
                                    <span class="number-3 cerapro-medium-mine-shaft-16px">{{ $toutesDemande ?? '-'}}</span>
                                    </div>-->
                                  <div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" target="_blank" href="{{route('demandes.createUserpdf')}}"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Type de demande</th>
                                        <th>Description</th>
                                        <th>Date/heure</th>
                                        <th>Statut</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($demandes as $demande)
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
                                              <h6>{{ucfirst($demande->motif->libelle)}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td><h6>{!!html_entity_decode($demande->message)!!}</h6></td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($demande->created_at))}}</h6>
                                        </td>
                                        <td>
                                           @switch($demande->statut)
                                          @case("0")
                                            <label class="badge badge-warning" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                          @break
                                          @case("1")
                                            <label class="badge badge-success" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                          @break
                                          @case("2")
                                            <label class="badge badge-danger">Rejeter</label>
                                          @break
                                          @default
                                            <label class="badge badge-info" data-toggle="modal" data-target="#exampleModalCenter-<?= $demande->id?>">Reporté</label>
                                          @endswitch
                                        </td>
                                      </tr>
                                              <div class="modal fade" id="exampleModalCenter-<?=$demande->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?=$demande->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Raison de report de la demande de {{$demande->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      	    <div class="form-group mb-2">
		      			<label for="name">Date de report</label>
		      			<input type="text" class="form-control" value="{{date('d/m/Y H:i',strtotime($demande->date_report))}}" disabled>
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="name">Motif de report</label>
		      			<input class="form-control" type="text" value"{!! html_entity_decode($demande->message_report)!!}" disabled>
		      		</div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>

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
                                   <h4 class="cerapro-medium-cioccolato-20px">Demande Envoyée</h4>
                                   <div class="add-items d-flex mb-0">
                                     <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                     @if($collabo->isNotEmpty())
                                     <button class="add btn-rounded todo-list-add-btn text-white me-0 pl-12p"style="border-radius: 15px;background: #ff0000;border: #ff0000;">New</button>
                                     @else
                                     @endif
                                   </div>
                                 </div>
                                 <p class="caption">Congés collaborateurs</p>
                                  @forelse($collabo as $key => $act)
                                 <div class="mt-3">
                                   <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                     <div class="d-flex">
                                       <img class="img-sm rounded-10" src="{{ucfirst(collabo->user->avatars)}}" alt="profile">
                                       <div class="wrapper ms-3">
                                         <div class="row">
                                           <div class="col-sm-6 poppins-medium-gun-powder-14px">{{ucfirst(collabo->user->name)}}</div>
                                           <div class="col-sm-6 poppins-normal-gun-powder-14px">{{ucfirst(collabo->motif->libelle)}}</div>
                                         </div>
                                       </div>
                                     </div>
                                     <div class="rectangle-107 border-1px-old-copper-2 text-muted text-small">
                                       <a class="done poppins-medium-old-copper-14px" href="#">Voir</a>
                                     </div>
                                   </div>
                                 </div>
                                @empty
                                <div class="mt-3">
                                  <div class="col-sm-12 poppins-medium-gun-powder-14px" style="text-align: center;font-size: 20px;font-weight: 900;margin-top: 57px;">Aucune nouvelle demande</div>
                                   </div>
                                 </div>
                                @endforelse
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                      </div>

                          @break
                    @default
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique de mes Congés</h4>
                                  </div>
                                  <!--<div class="frame-376">
                                    <span class="number-3 cerapro-medium-mine-shaft-16px">{{ $toutesDemande ?? '-'}}</span>
                                    </div>-->
                                  <div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" target="_blank" href="{{route('demandes.createUserpdf')}}"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Type de demande</th>
                                        <th>Description</th>
                                        <th>Date/heure</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($demandes as $demande)
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
                                              <h6>{{ucfirst($demande->motif->libelle)}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td><h6>{!!html_entity_decode($demande->message)!!}</h6></td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($demande->created_at))}}</h6>
                                        </td>
                                        <td>
                                           @switch($demande->statut)
                                          @case("0")
                                            <label class="badge badge-warning" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                          @break
                                          @case("1")
                                            <label class="badge badge-success" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;"> Accepter</label>
                                          @break
                                          @case("2")
                                            <label class="badge badge-danger">Rejeter</label>
                                          @break
                                          @default
                                            <label class="badge badge-info" data-toggle="modal" data-target="#exampleModalCenter-<?= $demande->id?>">Reporté</label>
                                          @endswitch
                                        </td>
                                        @if($demande->statut == 0)
                                        <td>
									    <div class="iv_row">
									        <div class="iv_edit">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('demandes.editConge',$demande->id)}}">
									               <i class="menu-icon mdi mdi-pencil"></i>
									           </a>
									        </div>
									        <div class="iv_delete">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('demandes.delete',$demande->id)}}" onclick="return confirm('Voulez-vous Supprimer cette demande de congé ?')">
									               <i class="mdi mdi-delete-sweep"></i>
									           </a>
									        </div>
									    </div>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                      </tr>
        <div class="modal fade" id="exampleModalCenter-<?=$demande->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?=$demande->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Raison de report de la demande de {{$demande->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      	    <div class="form-group mb-2">
		      			<label for="name">Date de report</label>
		      			<input type="text" class="form-control" value="{{date('d/m/Y H:i',strtotime($demande->date_report))}}" disabled>
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="name">Motif de report</label>
		      			<input type="text" class="form-control" value="{!! html_entity_decode($demande->message_report)!!}" disabled>
		      		</div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>

                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endswitch
                    </div>
                    
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
                                      Formulaire de demande de congé
                                      </h4>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <form method="post" action="{{route('demandes.store')}}" enctype="multipart/form-data">
                                      @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Type de congé</label>
                                              <select name="motif_id" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px
                                              @error('motif_id') is-invalid @enderror" data-select2-id="1" tabindex="-1"
                                              aria-hidden="true">
                                                <option selected>Sélectionnez un motif</option>
                                                @foreach ($motifConge as $mConge)
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
                                              <input class="poppins-normal-black-16px form-control date @error('date_retour') is-invalid @enderror" type="date" name="date_retour">
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
                                                <div class="bg" style="box-shadow: 1px 0px 4px 1px black; border: 1px dashed black;border-radius: 12px;height: 194px;width: 385px;margin-top: 12px;">
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
                                          <textarea name="message" class="poppins-normal-black-16px @error('message') is-invalid @enderror" id='tinyMceExample'></textarea>
                                          <!-- Le message d'erreur -->
                                                    		@error('message')
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
