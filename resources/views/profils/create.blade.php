@extends('layouts.template')
@section('content')

<div class="main-panel">
<!-- partial -->
        <div class="content-wrapper" style="padding:1.5rem 2.187rem 0 3.5rem!important">
          <div class="row">
			@include('flashmessage')
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulaire d'ajout des droits utilisateurs</h4>
                  <form class="forms-sample" method="post" action="{{route('profils.store')}}">
				  @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="poppins-normal-black-15px" style="font-size:15px">Intitulé du role</label>
                                    <input type="text" name="libelle" class="poppins-light-shadow-blue-15px form-control" placeholder="Profil"/>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5"></textarea>
                                </div>
                            </div>
                        </div>-->
                       <div class="row">
                            <div class="col-md-6" >
                                    <button type="reset" class="manrope-bold-cioccolato-16px btn btn-secondary me-2" style="border-radius: 30px;">Annuler</button>
                            </div>
                            <div class="col-md-6" >
                                    <button type="submit" class="manrope-bold-white-16px btn btn-primary me-2" style="border-radius: 30px;">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
              
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                   <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listes des profils</h4><span class="cerapro-medium-mine-shaft-16px">10</span>
                  <div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="poppins-medium-pale-sky-14px">
										Intitulé du poste
									</th>
									<th class="poppins-medium-pale-sky-14px">
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($profils as $profil)
								<tr>
									<td class="poppins-medium-mine-shaft-14px">
										{{ucfirst($profil->libelle)}}
									</td>
									<td>
									     <div class="container">
									        <div class="row">
									            <div class="col-sm-6">
                                            <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('profils.edit',$profil->id)}}"><i class="menu-icon fa-regular fa-pen-to-square"></i></a>
                                             </div>
                                           <div class="col-sm-6">
                                          	<a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('profils.delete',$profil->id)}}" onclick="return confirm('Voulez-vous Supprimer cet utilisateur ?')"><i class="mdi mdi-delete-sweep"></i></a>
                                          	</div>
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