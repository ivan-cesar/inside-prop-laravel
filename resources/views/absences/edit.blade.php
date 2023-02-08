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
                      <div class="col-lg-12 d-flex flex-column">
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
                                  <form action="{{route('absences.update')}}" enctype="multipart/form-data" method="post">
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
                                                 <option value="{{ucfirst($absences->motifs->id)}}">{{ucfirst($absences->motifs->libelle)}}</option>
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
                                              <input class="poppins-normal-black-16px form-control date @error('date_depart') is-invalid @enderror" type="date" name="date_depart" value="{{$absences->date_depart}}">
                                              <input name="id" value="{{$absences->id}}" hidden>
                                                            <!-- Le message d'erreur -->
                                                    		@error('date_depart')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Date de retour</label>
                                              <input class="poppins-normal-black-16px form-control date @error('date_retour') is-invalid @enderror" type="date" name="date_retour" value="{{$absences->date_retour}}">
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
                                              <input class="poppins-normal-black-16px form-control date @error('heure_depart') is-invalid @enderror" type="time" name="heure_depart" value="{{$absences->heure_depart}}">
                                              <!-- Le message d'erreur -->
                                                    		@error('heure_depart')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Heure d'arriver</label>
                                              <input class="poppins-normal-black-16px form-control date @error('heure_arriver') is-invalid @enderror" type="time" name="heure_arriver" value="{{$absences->heure_arriver}}">
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
                                                <input name="file" type="file" class="uploader" onchange="readURL(this);" accept="image/*,.pdf,.docx">
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
                                          <textarea class="poppins-normal-black-16px @error('description') is-invalid @enderror" id='tinyMceExample' name="description">
                                              {!!Html_entity_decode($absences->description)!!}
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
                                            <input class="poppins-normal-black-16px form-control" type="text" value="{{ucfirst($departement->libelle ?? "-")}}" disabled>
                                         </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="poppins-normal-black-16px">Responsable Departement</label>
                                          <input class="poppins-normal-black-16px form-control" type="text" value="{{ucfirst($responsable->name ?? "-")}}"  disabled>
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