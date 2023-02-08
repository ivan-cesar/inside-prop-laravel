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
                     @case("Manager")
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="stat statistics-details d-flex align-items-center justify-content-between">
                          <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-4">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/icon-awesome-calendar-check-10@1x.png')}}">
                                  </div>
                                    <h6 style="margin-top: 10px; text-align: center;">{{ number_format($somAccepter,'0','','.') ?? "-" }} Fcfa</h6>
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
                                  <h6 style="margin-top: 10px; text-align: center;"> {{ number_format($somRejeter,'0','','.') ?? "-" }} Fcfa</h6>
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
                                  <h6 style="margin-top: 10px; text-align: center;">{{ number_format($somAttente,'0','','.') ?? "-" }} Fcfa</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">En Attente</div></div>
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
                                    <div class="icon-cfa">
                                    <div class="xac-message"></div>
                                  </div>
                                  <h6 style="margin-top: 10px; text-align: center;">{{ number_format($somAttente,'0','','.') ?? "-" }} Fcfa</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Nombre d'achat</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$toutesAchat ?? "-"}}
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
                                        <th>Date/heure</th>
                                        <th>Statut</th>
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
                                            </div>
                                          </div>
                                        </td>
                                        <td><h6>{{ucfirst($achat->intitule_projet)}}</h6></td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($achat->created_at))}}</h6>
                                        </td>
                                        <td>
                                        @if($achat->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $achat->id?>">En cours</label>
                                      @elseif($achat->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
                                         <div class="modal fade" id="exampleModalCenter-<?= $achat->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $achat->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$achat->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$achat->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($achat->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($achat->description)!!}">{!! html_entity_decode($achat->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	<embed  src="{{ucfirst($achat->fichier)}}" width=800 height=500 type='application/pdf'/>
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('achats.traite',['id'=>$achat->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('achats.traite',['id'=>$achat->id,'index'=>2])}}">Rejeter</a>
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
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--<div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                            
                        </div>
                      </div>-->
                    </div>
                    @break
                    @default
                    @include('layouts.users.achat')
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
                                      Formulaire de demande d'Achat
                                      </h4>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <form method="post" action="{{route('achats.store')}}" enctype="multipart/form-data">
                                      @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Type d'achat</label>
                                              <select name="motif_id" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px
                                              @error('motif_id') is-invalid @enderror" data-select2-id="1" tabindex="-1" 
                                              aria-hidden="true" required>
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
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Intitulé du Projet</label>
                                              <input class="poppins-normal-black-16px form-control date @error('intitule_projet') is-invalid @enderror" type="text" name="intitule_projet">
                                              <!-- Le message d'erreur -->
                                                    		@error('intitule_projet')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Montant</label>
                                              <input class="poppins-normal-black-16px form-control date @error('montant') is-invalid @enderror" type="text" name="montant">
                                              <!-- Le message d'erreur -->
                                                    		@error('montant')
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
                                                        <input name="file" type="file" class="uploader" onchange="readURL(this);" accept="image/*,.pdf,.docx">
                                                <img class="rectangle-54" style="top:8px;"src="{{asset('public/auth/img/rectangle-54-1@1x.png')}}" id='image'>
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