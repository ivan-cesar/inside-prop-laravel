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
                @case ("Admin")
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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Traitées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbTraites ?? "-"}}</h1>
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
                                                 {{$nbNonTraites ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="icon-coll">
                                      <div class="x01-message"></div>
                                  </div>
                                 
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Collaborateurs</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$users ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                  </div>
                </div>
              </div>
                   @break
                @default
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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Traitées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbTraites ?? "-"}}</h1>
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
                                                 {{$nbNonTraites ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="icon-coll">
                                      <div class="x01-message"></div>
                                  </div>
                                 
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Collaborateurs</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$users ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                  </div>
                </div>
              </div>

            @endswitch
              <div class="row">
                <div class="col-lg-12 d-flex flex-column">
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                              <h4 class="total-candidates cerapro-medium-cioccolato-20px">Justifications En cours</h4>
                            </div>
                            <!--<div class="frame-376">
                              <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbNonTraites??"-"}}</span>
                              </div>-->
                        @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('justifications.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('justifications.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                         @endswitch
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
                                  <th>Utilsateurs</th>
                                  <th>Motif de justification</th>
                                  <th>Description</th>
                                  <th>Date/heure</th>
                                  <th>pièce Jointe </th>
                                  <th>Statut</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($justifications_encours as $justification)
                                <tr>
                                  <td>
                                    <div class="form-check form-check-flat mt-0">
                                      <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-flex ">
                                      <img src="{{ucfirst($justification->user->avatars)}}" alt="user-image">
                                      <div>
                                        <h6>{{ucfirst($justification->user->name)}}</h6>
                                        <p>{{ucfirst($justification->user->fonctions()->first()->libelle)}}</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>{{ucfirst($justification->motif->libelle)}}</h6>
                                    <p>company type</p>
                                  </td>
                                  <td>
                                    <h6>{!!html_entity_decode($justification->description)!!}</h6>
                                  </td>
                                  <td>
                                    <h6>{{date('d/m/Y H:i',strtotime($justification->created_at))}}</h6>
                                  </td>
                                  <td>
                                      <img src="{{asset('public/auth/img/icon-metro-file-pdf-12@1x.png')}}" alt="fichiers">
                                  </td>
                            @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                                  <td>
                                      @if($justification->user->responsable != 1)
                                            @if($justification->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="font-weight: bold;background-color: rgba(39, 155, 238, 0.82);color: #fff;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $justification->id?>">Voir le contenu</label>
                                      @elseif($justification->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
         <div class="modal fade" id="exampleModalCenter-<?= $justification->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $justification->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$justification->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$justification->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($justification->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($justification->description)!!}">{!! html_entity_decode($justification->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		 <?php  
	            		         $fileextension = pathinfo($justification->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		         //dd($extension,$justification->fichier);
	            		 ?>
	            		      @if(($extension == "jpg") || ($extension == "jpeg") || ($extension == "png"))
	            		          <img src="{{ucfirst($justification->fichier)}}" width=800 height=500>
	            		     @elseif($extension == "pdf")
	            		     	  <embed  src="{{ucfirst($justification->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            		     @else
	            		     @endif

	            </div>
	            <!--<div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('justifications.traite',['id'=>$justification->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('justifications.traite',['id'=>$justification->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>-->
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
                                      @else
                               @if($justification->user->responsable != 1)
                                        @if($justification->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $justification->id?>">En cours</label>
                                      @elseif($justification->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
         <div class="modal fade" id="exampleModalCenter-<?= $justification->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $justification->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$justification->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$justification->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($justification->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($justification->description)!!}">{!! html_entity_decode($justification->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		 <?php  
	            		         $fileextension = pathinfo($justification->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		         //dd($extension,$justification->fichier);
	            		 ?>
	            		      @if(($extension == "jpg") || ($extension == "jpeg") || ($extension == "png"))
	            		          <img src="{{ucfirst($justification->fichier)}}" width=800 height=500>
	            		     @elseif($extension == "pdf")
	            		     	  <embed  src="{{ucfirst($justification->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            		     @else
	            		     @endif

	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('justifications.traite',['id'=>$justification->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('justifications.traite',['id'=>$justification->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
		                              @else
    		                               @if($justification->statut === 0)
                                          <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                          @elseif($justification->statut === 1)
                                          <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                          @else
                                          <label class="badge badge-danger">Rejeter</label>
                                          @endif
                                            </td>
                                          </tr>
		                              @endif
		                              @endif
                                      @break
                            @default
                            @if($justification->user->responsable != 1)
                                                        <td>
                                        @if($justification->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $justification->id?>">En cours</label>
                                      @elseif($justification->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
         <div class="modal fade" id="exampleModalCenter-<?= $justification->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $justification->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$justification->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$justification->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($justification->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($justification->description)!!}">{!! html_entity_decode($justification->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		 <?php  
	            		         $fileextension = pathinfo($justification->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		         //dd($extension,$justification->fichier);
	            		 ?>
	            		      @if(($extension == "jpg") || ($extension == "jpeg") || ($extension == "png"))
	            		          <img src="{{ucfirst($justification->fichier)}}" width=800 height=500>
	            		     @elseif($extension == "pdf")
	            		     	  <embed  src="{{ucfirst($justification->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            		     @else
	            		     @endif

	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('justifications.traite',['id'=>$justification->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('justifications.traite',['id'=>$justification->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
                            @else
                                                        <td>
                                        @if($justification->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($justification->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
                            @endif

                              @endswitch
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                              <div>
                                <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique des Justifications</h4>
                              </div>
                              <!--<div class="frame-376">
                                <span class="number-3 cerapro-medium-mine-shaft-16px">{{$toutesJustifications??"-"}}</span>
                                </div>-->
                              @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('justifications.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('justifications.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                         @endswitch
                            </div>
                          <div class="table-responsive  mt-1">
                              <table class="table select-table" id="table_d">
                                  <thead>
                                    <tr>
                                      <th>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </th>
                                      <th>Utilisateurs</th>
                                      <th>Motif de justification </th>
                                      <th>Description</th>
                                      <th>Date/heure</th>
                                      <th>Piece Jointe</th>
                                      <th>Statut</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($justifications as $justification)
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="{{ucfirst($justification->user->avatars)}}" alt="user-image">
                                          <div>
                                            <h6>{{ucfirst($justification->user->name)}}</h6>
                                            <p>{{ucfirst($justification->user->fonctions()->first()->libelle)}}</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>{{ucfirst($justification->motif->libelle)}}</h6>
                                        <p>company type</p>
                                      </td>
                                      <td>
                                        <h6>{!!html_entity_decode($justification->description)!!}</h6>
                                      </td>
                                      <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($justification->created_at))}}</h6>
                                        </td>
                                      <td>
                                          <img src="{{asset('public/auth/img/icon-metro-file-pdf-12@1x.png')}}" alt="">
                                      </td>
                                      <td>
                                        @if($justification->statut === 0)
                                      <label class="badge badge-warning" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($justification->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
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
