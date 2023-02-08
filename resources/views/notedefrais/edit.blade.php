@extends('layouts.template')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
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
                                      Formulaire de Note de Frais
                                      </h4>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <form method="post" action="{{route('notedefrais.update')}}" enctype="multipart/form-data">
                                      @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Intitulé de l'action</label>
                                              <select name="motif_id" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px
                                              @error('motif_id') is-invalid @enderror" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option selected>{{$notefrais->motif->libelle}}</option>
                                                @foreach ($motifFrais as $mConge)
                                                <option value="{{ucfirst($mConge->id)}}">{{ucfirst($mConge->libelle)}}</option>
                                                @endforeach
                                              </select>
                                              <!-- Le message d'erreur -->
                                                    		@error('motif_id')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                              <span class="poppins-normal-black-16px">Ex: Transport</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Projet Lié</label>
                                              <input class="poppins-normal-black-16px form-control date @error('projet') is-invalid @enderror" type="text" name="projet" value="{{$notefrais->projet}}">
                                              <input type="text" name="id" value="{{$notefrais->id}}" hidden>
                                              		<!-- Le message d'erreur -->
                                                    		@error('projet')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                              <span class="poppins-normal-black-16px">Ex: Déplacement pour la journée Loto</span>
                                            </div>
                                          
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Montant Déboursé</label>
                                              <input class="poppins-normal-black-16px form-control date @error('montant') is-invalid @enderror" type="text" name="montant" value="{{$notefrais->montant}}">
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
                                          <textarea name="description" class="poppins-normal-black-16px @error('description') is-invalid @enderror" id='tinyMceExample'>
                                              {!!Html_entity_decode($notefrais->description)!!}
                                          </textarea>
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