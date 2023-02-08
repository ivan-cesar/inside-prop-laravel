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
                                      Modifier la demande {{$demande->user->name}}
                                      </h4>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <form method="post" action="{{route('demandes.update')}}" enctype="multipart/form-data">
                                      @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Date de depart</label>
                                              <input name="id" value="{{$demande->id}}" hidden>
                                              <input class="poppins-normal-black-16px form-control date @error('date_depart') is-invalid @enderror" 
                                              type="text" name="date_depart" value="{{date('d/m/Y H:i',strtotime($demande->date_depart))}}"disabled>
                                              <!-- Le message d'erreur -->
                                                    		@error('date_depart')
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
                                              <label class="poppins-normal-black-16px">Date de report</label>
                                              <input class="poppins-normal-black-16px form-control date @error('date_report') is-invalid @enderror" type="date" name="date_report">
                                              <!-- Le message d'erreur -->
                                                    		@error('date_report')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          
                                          </div>
                                        </div>
                                      </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="poppins-normal-black-16px">Motif de report</label>
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

@endsection
