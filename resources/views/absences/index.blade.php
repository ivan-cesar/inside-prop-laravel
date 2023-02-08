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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Traitées</div></div>
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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Non-Traitées</div></div>
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
                                                 {{$nbrCollaborateur ?? "-"}}
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
                        @switch(Auth::user()->profils()->first()->libelle)
                          @case("Admin")
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                              <h4 class="total-candidates cerapro-medium-cioccolato-20px">Demandes En Cours</h4>
                            </div>
                            <!--<div class="frame-376">
                              <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbrAttente ?? '-' }}</span>
                              </div>-->
                          @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                  <th>Type de demande</th>
                                  <th>Date/heure</th>
                                  <th>Statut</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($absences_encours as $dmd)
                                <tr>
                                  <td>
                                    <div class="form-check form-check-flat mt-0">
                                      <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-flex ">
                                      <img src="{{ucfirst($dmd->user->avatars)}}" alt="user-image">
                                      <div>
                                        <h6>{{ucfirst($dmd->user->name)}}</h6>
                                        <p>{{ucfirst($dmd->user->fonctions()->first()->libelle)}}</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                    <!--<p>{!! html_entity_decode($dmd->description)!!}</p>-->
                                  </td>
                                  <td>
                                    <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                  </td>
                                  <td>
                                      @if($dmd->user->responsable != 1)
                                      
                                     @if($dmd->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="font-weight: bold;background-color: rgba(39, 155, 238, 0.82);color: #fff;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $dmd->id?>">Voir le contenu</label>
                                      @elseif($dmd->statut === 1)
                                      <label class="badge badge-success"  data-toggle="modal" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;" data-target="#exampleModalCenter-<?= $dmd->is?>">Accepter</label>
                                      @else
                                      <label class="badge badge-danger"  data-toggle="modal" data-target="#exampleModalCenter-<?= $dmd->is?>">Rejeter</label>
                                      @endif
                                  </td>
                                </tr>
            <div class="modal fade" id="exampleModalCenter-<?=$dmd->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?=$dmd->id?>" aria-hidden="true">
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
		      			<!--<textaera class="form-control" value="{!! html_entity_decode($dmd->description)!!}">{!! html_entity_decode($dmd->description)!!}</textaera>-->
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		     <?php  
	            		         $pdf = "application/pdf";
	            		         $image = "image/$dmd->extension";
	            		         $extension = $dmd->extension != "pdf" ? $image : $pdf;
	            		         //dd($extension,$dmd->file);
	            		     ?>
	            	@if($dmd->file != "/images/avatars/avatar.png")
	            	 <embed src="{{$dmd->file}}" width=800 height=500 type="{{$extension}}"/>
	            	 @else
	            	 <h4>Aucun document</h4>
	            	 @endif
	            </div>
	            <!--<div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a type="submit" class="form-control btn btn-success rounded submit px-3" href="{{route('absences.traite',['id'=>$dmd->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a type="submit" class="form-control btn btn-danger rounded submit px-3" href="{{route('absences.traite',['id'=>$dmd->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>-->
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
                                      
                                      
                                      @else

                                    @if($dmd->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $dmd->id?>">En cours</label>
                                      @elseif($dmd->statut === 1)
                                      <label class="badge badge-success"  data-toggle="modal" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;" data-target="#exampleModalCenter-<?= $dmd->is?>">Accepter</label>
                                      @else
                                      <label class="badge badge-danger"  data-toggle="modal" data-target="#exampleModalCenter-<?= $dmd->is?>">Rejeter</label>
                                      @endif
                                  </td>
                                </tr>
            <div class="modal fade" id="exampleModalCenter-<?=$dmd->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?=$dmd->id?>" aria-hidden="true">
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
		      			<!--<textaera class="form-control" value="{!! html_entity_decode($dmd->description)!!}">{!! html_entity_decode($dmd->description)!!}</textaera>-->
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		     <?php  
	            		         $pdf = "application/pdf";
	            		         $image = "image/$dmd->extension";
	            		         $extension = $dmd->extension != "pdf" ? $image : $pdf;
	            		         //dd($extension,$dmd->file);
	            		     ?>
	            		@if($dmd->file != "/images/avatars/avatar.png")
	            	 <embed src="{{$dmd->file}}" width=800 height=500 type="{{$extension}}"/>
	            	 @else
	            	 <h4>Aucun document</h4>
	            	 @endif
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a type="submit" class="form-control btn btn-success rounded submit px-3" href="{{route('absences.traite',['id'=>$dmd->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a type="submit" class="form-control btn btn-danger rounded submit px-3" href="{{route('absences.traite',['id'=>$dmd->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
		      @endif
                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                          @break
                          @default
                        <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                              <h4 class="total-candidates cerapro-medium-cioccolato-20px">Demandes En Cours</h4>
                            </div>
                            <!--<div class="frame-376">
                              <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbrAttente ?? '-' }}</span>
                              </div>-->
                          @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                  <th>Type de demande</th>
                                  <th>Date/heure</th>
                                  <th>Statut</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($absences_encours as $dmd)
                                <tr>
                                  <td>
                                    <div class="form-check form-check-flat mt-0">
                                      <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-flex ">
                                      <img src="{{ucfirst($dmd->user->avatars)}}" alt="user-image">
                                      <div>
                                        <h6>{{ucfirst($dmd->user->name)}}</h6>
                                        <p>{{ucfirst($dmd->user->fonctions()->first()->libelle)}}</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                    <p>
                                        @php
                                        $cara = {!! html_entity_decode($dmd->description) !!};
                                        {!! Str::words($cara, 20, ' ...') !!}
                                        @endphp
                                    </p>
                                  </td>
                                  <td>
                                    <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                  </td>
                                  <td>
                                    @if($dmd->user->responsable != 1)  
                                      
                                      
                                    @if($dmd->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $dmd->id?>">En cours</label>
                                      @elseif($dmd->statut === 1)
                                      <label class="badge badge-success"  data-toggle="modal" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;" data-target="#exampleModalCenter-<?= $dmd->is?>">Accepter</label>
                                      @else
                                      <label class="badge badge-danger"  data-toggle="modal" data-target="#exampleModalCenter-<?= $dmd->is?>">Rejeter</label>
                                      @endif
                                  </td>
                                </tr>
            <div class="modal fade" id="exampleModalCenter-<?=$dmd->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?=$dmd->id?>" aria-hidden="true">
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
		      			<!--<textaera class="form-control" value="{!! html_entity_decode($dmd->description)!!}">{!! html_entity_decode($dmd->description)!!}</textaera>-->
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		     <?php  
	            		         $pdf = "application/pdf";
	            		         $image = "image/$dmd->extension";
	            		         $extension = $dmd->extension != "pdf" ? $image : $pdf;
	            		         //dd($extension,$dmd->file);
	            		     ?>
	            		     
	            	 @if($dmd->file != "/images/avatars/avatar.png")
	            	  <embed src="{{$dmd->file}}" width=800 height=500 type="{{$extension}}"/>
	            	 @else
	            	  <h4>Aucun document</h4>
	            	 @endif
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a type="submit" class="form-control btn btn-success rounded submit px-3" href="{{route('absences.traite',['id'=>$dmd->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a type="submit" class="form-control btn btn-danger rounded submit px-3" href="{{route('absences.traite',['id'=>$dmd->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
		                        @else
		                        @if($dmd->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($dmd->statut === 1)
                                      <label class="badge badge-success"  data-toggle="modal" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger"  data-toggle="modal">Rejeter</label>
                                      @endif
                                  </td>
                                </tr>
		                        @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                        @endswitch

                  
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                              <div>
                                <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique des demandes</h4>
                              </div>
                              <!--<div class="frame-376">
                                <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbrAbsence ?? '-'}}</span>
                                </div>-->
                              @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('absences.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                      <th>Type de demande</th>
                                      <th>Date/heure</th>
                                      <th>Piece Jointe</th>
                                      <th>Statut</th>
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
                                          <img src="{{ucfirst($dmd->user->avatars)}}" alt="user-image">
                                          <div>
                                            <h6>{{ucfirst($dmd->user->name)}}</h6>
                                            <p>{{ucfirst($dmd->user->fonctions()->first()->libelle)}}</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>{{ucfirst($dmd->motifs->libelle)}}</h6>
                                        <!--<p>{!! html_entity_decode($dmd->description)!!}</p>-->
                                      </td>
                                      <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                        </td>
                                      <td>
                                          <img src="{{asset('public/auth/img/icon-metro-file-pdf-12@1x.png')}}" alt="">
                                      </td>
                                      <td>
                                           @if($dmd->statut === 0)
                                      <label class="badge badge-warning" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($dmd->statut === 1)
                                      <label class="badge badge-success" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
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
<script>

$(document).ready(function (){
    $('#table_dmd').DataTable();
});
$(document).ready(function (){
    $('#table_d').DataTable();
});
</script>
@endsection
