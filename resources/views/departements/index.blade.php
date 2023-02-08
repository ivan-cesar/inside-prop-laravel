@extends('layouts.template')
@section('content')

<div class="main-panel">
<!-- partial -->
             
        <div class="content-wrapper">
          <div class="row">
			@include('flashmessage')
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="total-candidates cerapro-medium-cioccolato-20px">Formulaire d'ajout des departements</h4>
                  <form class="forms-sample" method="post" action="{{route('departements.store')}}">
				  @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="poppins-normal-black-15px" style="font-size:15px">Libellé</label>
                                    <input type="text" name="libelle" class="poppins-light-shadow-blue-15px form-control" placeholder="" style="font-size:15px"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="poppins-normal-black-15px" style="font-size:15px">Description</label>
                                  <textarea style="min-height:5rem; font-size:15px" class="poppins-light-shadow-blue-15px form-control" id="exampleFormControlTextarea1" name="description" rows="5"
                                  placeholder"Entrez la description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6" style="position: relative; left: 35rem;">
                               
                                    <button type="reset" class="manrope-bold-cioccolato-16px btn btn-secondary me-2" style="border-radius: 30px;">Annuler</button>
                                
                                    <button type="submit" class="manrope-bold-white-16px btn btn-primary me-2" style="border-radius: 30px;">Enregistrer</button>
                                
                            </div>
                            
                       
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
			</div>
        </div>
		  <div class="row">
			@include('flashmessage')
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
				<div class="card-body">
					<h4 class="total-candidates cerapro-medium-cioccolato-20px">Gestion des départements</h4>
					<div class="table-responsive mt-1">
						<table class="table select-table">
							<thead>
								<tr>
									<th>
										Libellé
									</th>
									<th>
										Responsable
									</th>
									<th>
										Nb User
									</th>									
									
									<th>
										Statut
									</th>
									<th>
										Crée le 
									</th>
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($departements as $dept)
								<tr>
									<td class="poppins-medium-mine-shaft-14px">
										{{ucfirst($dept->libelle)}}
									</td>
									<td class="poppins-medium-mine-shaft-14px">
										{{ucfirst($dept->getResponsable($dept->id))}}
									</td>
									<td class="poppins-medium-mine-shaft-14px">
									    {{ucfirst($dept->users_count)}}
									</td>
									<td class="poppins-medium-mine-shaft-14px">
										
										@if($dept->statut == 0)
											<label class="badge badge-danger">Inactif</label>
										@else
											<label class="badge badge-success">Actif</label>
										@endif
									</td>
									
									<td class="poppins-medium-mine-shaft-14px">
										
										{{date('d/m/Y',strtotime($dept->created_at))}}
									</td>
									<td>
										  <div class="dropdown">
                                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('departements.edit',$dept->id)}}">Modifier</a>
                                          	<a class="dropdown-item" href="{{route('departements.delete',$dept->id)}}" onclick="return confirm('Voulez-vous Supprimer cet departement ?')"> Supprimer</a>

                                          </div>
                                        </div>
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
        
@endsection