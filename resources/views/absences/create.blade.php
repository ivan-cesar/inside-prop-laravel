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
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbrAccepter ?? "-"}}</h1>
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
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbrRejeter ?? "-"}}</h1>
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
                                                 {{$nbrAttente ?? "-"}}
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
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique de demande</h4>
                                  </div>
                                  <!--<div class="frame-376">
                                    <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbrAttente ?? "-"}}</span>
                                    </div>-->
                                @switch(Auth::user()->profils()->first()->libelle)
                                  @case("Manager")
                                  <div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createUserpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                                  </div>
                                   @break
                                  @default
                                 <div>
                                    <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createUserpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                                  </div>
                                @endswitch
                                </div>
                                
                                @switch(Auth::user()->profils()->first()->libelle)
                                  @case("Manager")
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
                                              <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{!!html_entity_decode($dmd->description)!!}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                        @if($dmd->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $dmd->id?>">En cours</label>
                                      @elseif($dmd->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                        <td>
                                            <div class="container">
									        <div class="row">
									            <div class="col-sm-6">
									        <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="#"><i class="menu-icon mdi mdi-pencil"></i></a>
									        </div>
                                           <div class="col-sm-6">
									    	<a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="#" onclick="return confirm('Voulez-vous Supprimer cet utilisateur ?')"> <i class="mdi mdi-delete-sweep"></i></a>
                                           </div>
                                            </div>
									    </div>
                                        </td>
                                      </tr>
                <div class="modal fade" id="exampleModalCenter-<?= $dmd->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $dmd->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$dmd->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$dmd->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($dmd->motifs->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($dmd->description)!!}">{!! html_entity_decode($dmd->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	<embed  src="{{ucfirst($dmd->fichier)}}" width=800 height=500 type='application/pdf'/>
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>2])}}">Rejeter</a>
	            	</div>
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
                                    @break
                                  @default
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
                                            <!--<img src="images/faces/face1.jpg" alt="">-->
                                            <div>
                                              <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{!!html_entity_decode($dmd->description)!!}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                        <td>
                                        @if($dmd->statut === 0)
                                      <label class="badge badge-warning" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($dmd->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                        @if($dmd->statut == 0)
                                        <td>
									    <div class="iv_row">
									        <div class="iv_edit">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('absences.edit',$dmd->id)}}">
									               <i class="menu-icon mdi mdi-pencil"></i>
									           </a>
									        </div>
									        <div class="iv_delete">
									           <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('absences.delete',$dmd->id)}}" onclick="return confirm('Voulez-vous Supprimer cette demande d'absence ?')">
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
                                @endswitch
                                
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                            @include('flashmessage')
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">
                                      Formulaire d'Autorisation d'absence
                                      </h4>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <form action="{{route('absences.store')}}" enctype="multipart/form-data" method="post">
                                      @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Motif de depart</label>
                                              <select name="motif_id" type="type" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px
                                              @error('motif_id') is-invalid @enderror" data-select2-id="1" tabindex="-1"
                                              aria-hidden="true" required>
                                                <option selected>Sélectionnez un motif</option>
                                                @foreach ($motifAbsences as $item)
                                                  <option value="{{ucfirst($item->id)}}">{{ucfirst($item->libelle)}}</option>
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
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Heure de depart</label>
                                              <input class="poppins-normal-black-16px form-control date @error('heure_depart') is-invalid @enderror" type="time" name="heure_depart">
                                              <!-- Le message d'erreur -->
                                                    		@error('heure_depart')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Heure d'arriver</label>
                                              <input class="poppins-normal-black-16px form-control date @error('heure_arriver') is-invalid @enderror" type="time" name="heure_arriver">
                                              <!-- Le message d'erreur -->
                                                    		@error('heure_arriver')
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
                                              <div class="overlap-group8" style="top: 47%;">
                                                <div class="bg" style="width: 96%;"><img class="bg-1" src="{{asset('public/auth/img/bg-13@1x.png')}}"></div>
                                                <p class="choisir-les-fichiers-tlcharger manrope-bold-black-14px">Choisir les fichiers à télécharger</p>
                                                <div class="ou manrope-normal-shadow-blue-14px">ou</div>
                                                <button type="submit" class="button-browse-file border-1px-cararra" style="position: relative;left: 27%;top:82%">
                                                  <img class="icon-upload" src="{{asset('public/auth/img/icon-upload-1@1x.png')}}">
                                                  <div class="parcourir-les-fichiers manrope-bold-shadow-blue-14px"style="font-size: 14px;padding-top: 6px;">Parcourir les fichiers</div>
                                                </button>
                                                <input name="file" type="file" class="uploader" onchange="readURL(this);" accept="image/*,.pdf,.docx" multiple>
                                                <img class="rectangle-54" style="left: 112px;top: 13px;"alt="Profile image" id='image' src="{{asset('public/auth/img/rectangle-54-1@1x.png')}}">
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
                                          <textarea class="poppins-normal-black-16px @error('description') is-invalid @enderror" id='tinyMceExample' name="description"></textarea>
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
                                            <input class="poppins-normal-black-16px form-control" type="text" value="{{ucfirst($departement->libelle)}}" disabled>
                                         </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="poppins-normal-black-16px">Responsable Departement</label>
                                          <input class="poppins-normal-black-16px form-control" type="text" value="{{ucfirst($responsable->name ?? "")}}"  disabled>
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