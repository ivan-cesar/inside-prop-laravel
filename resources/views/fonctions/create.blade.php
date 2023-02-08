@extends('layouts.template')
@section('content')

<div class="main-panel">
<!-- partial -->
             
        <div class="content-wrapper" style="padding:1.5rem 2.187rem 0 3.5rem!important">
          <div class="row">
			@include('flashmessage')
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="total-candidates cerapro-medium-cioccolato-20px">Formulaire d'ajout des postes</h4>
                  <form class="forms-sample" method="post" action="{{route('fonctions.store')}}">
				  @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="poppins-normal-black-15px" style="font-size: 15px !important;">Intitulé poste</label>
                                    <input type="text" name="libelle" class="form-control poppins-light-shadow-blue-15px" placeholder=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="poppins-normal-black-15px" style="font-size: 15px !important;">Description</label>
                                  <textarea style="min-height:5rem;" class="form-control poppins-light-shadow-blue-15px" id="exampleFormControlTextarea1" name="description" rows="5"
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
        <!-- ffff-->
         <div class="content-wrapper" style="padding:  0 0 1.5rem 0 !important;">
          <div class="row">
			@include('flashmessage')
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="total-candidates cerapro-medium-cioccolato-20px">Liste des postes</h4>
                  <div class="table-responsive">
						<table class="table table-hover" id="poste_table">
							<thead>
								<tr>
									<th>
										Intitulé
									</th>
									<th>
										Description
									</th>
									<th>
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($fonctions as $fonction)
								<tr>
									<td class="poppins-medium-mine-shaft-14px">
										<h6>{{ucfirst($fonction->libelle)}}</h6>
									</td>
									<!--<td class="poppins-medium-mine-shaft-14px">
									    <div class="container">
									        <div class="row">
									            <div class="col-sm-12">
									              <h6>  {{{$fonction->description}}}</h6>
									             </div>
									       </div>
									   </div>
									</td>-->
									<td class="poppins-medium-mine-shaft-14px">
									              <p>  {{{$fonction->description}}}</p>
									</td>
									<td>
									    <div class="container">
									        <div class="row">
									            <div class="col-sm-6">
									        <a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('fonctions.edit',$fonction->id)}}"><i class="menu-icon fa-regular fa-pen-to-square"></i></a>
									        </div>
                                           <div class="col-sm-6">
									    	<a style="font-size: 2rem; color:#ff6e00;" class="dropdown-item" href="{{route('fonctions.delete',$fonction->id)}}" onclick="return confirm('Voulez-vous Supprimer cet utilisateur ?')"> <i class="mdi mdi-delete-sweep"></i></a>
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
        <script>
            $(document).ready(function () {
    $('#poste_table').DataTable({
        pagingType: 'full_numbers',
    });
});
        </script>
@endsection