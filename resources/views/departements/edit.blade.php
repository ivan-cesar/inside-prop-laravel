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
                  <h4 class="total-candidates cerapro-medium-cioccolato-20px">Modifier le departement {{$departement->libelle}}</h4>
                  <form class="forms-sample" method="post" action="{{route('departements.update')}}">
				  @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="poppins-normal-black-15px" style="font-size:15px">Libellé</label>
                                    <input name="id" value="{{$departement->id}}" hidden>
                                    <input type="text" name="libelle" class="poppins-light-shadow-blue-15px form-control" value ="{{$departement->libelle}}" placeholder="" style="font-size:15px"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="poppins-normal-black-15px" style="font-size:15px">Description</label>
                                  <textarea style="min-height:5rem; font-size:15px" class="poppins-light-shadow-blue-15px form-control" id="exampleFormControlTextarea1" name="description" rows="5"
                                  placeholder"Entrez la description">{{$departement->description}}</textarea>
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
        </div>
        
@endsection