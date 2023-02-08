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
                                  <h6 style="margin-top: 10px; text-align: center;">{{ number_format($totalMontantTraite,'0','','.') ?? "-" }} Fcfa</h6>
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
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body" style="height: 400px!important;">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="total-candidates cerapro-medium-cioccolato-20px">Total Demande d'Achats traitées</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">{{ number_format($totalMontantTraite,'0','','.')}} Fcfa</h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div class="chartjs-wrapper">
                                  <!--<canvas id="performaneLine"></canvas>-->
                                  <canvas id="canvas" width="700" style="height:340%"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        @if(Auth::user()->departement_id == 6) 
                        @include('flashmessage')
                                              <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Demande d'achat en cours</h4>
                                  </div>
                                @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('achats.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('achats.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Utilisateurs</th>
                                        <th>Type d'achat </th>
                                        <th>Intitulé du projet </th>
                                        <th>Date/heure</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($achats_encours as $acht)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($acht->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($acht->user->name)}}</h6>
                                              <p>{{ucfirst($acht->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($acht->motif->libelle)}}</h6>
                                        </td>
                                         <td>
                                          <h6>{{ucfirst($acht->intitule_projet ?? '-')}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($acht->created_at))}}</h6>
                                        </td>
                                        <td>
                                        @if($acht->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $acht->id?>">En cours</label>
                                      @elseif($acht->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
            <div class="modal fade" id="exampleModalCenter-<?= $acht->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $acht->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$acht->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$acht->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($acht->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($acht->description)!!}">{!! html_entity_decode($acht->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	<embed  src="{{ucfirst($acht->fichier)}}" width=800 height=500 type='application/pdf'/>
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('achats.traite',['id'=>$acht->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('achats.traite',['id'=>$acht->id,'index'=>2])}}">Rejeter</a>
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

                        @else
                                              <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Demande d'achat en cours</h4>
                                  </div>
                                 @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('achats.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('achats.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Type d'achat </th>
                                        <th>Intitulé du projet </th>
                                        <th>Date/heure</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($achats_encours as $acht)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($acht->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($acht->user->name)}}</h6>
                                              <p>{{ucfirst($acht->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($acht->motif->libelle)}}</h6>
                                        </td>
                                         <td>
                                          <h6>{{ucfirst($acht->intitule_projet)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($acht->created_at))}}</h6>
                                        </td>
                        @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                                        <td>
                                            @if($acht->user->responsable != 1)
                                        @if($acht->statut === 0)
                                        <label class="badge badge-warning"  data-toggle="modal" style="font-weight: bold;background-color: rgba(39, 155, 238, 0.82);color: #fff;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $acht->id?>">Voir le contenu</label>
                                      @elseif($acht->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                    <div class="modal fade" id="exampleModalCenter-<?= $acht->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $acht->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$acht->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$acht->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($acht->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($acht->description)!!}">{!! html_entity_decode($acht->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	<embed  src="{{ucfirst($acht->fichier)}}" width=800 height=500 type='application/pdf'/>
	            </div>
	            <!--<div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('achats.traite',['id'=>$acht->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('achats.traite',['id'=>$acht->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>-->
	          </form>
		      </div>
		    </div>
		  </div>
		</div>

                                        @else
                                         @if($acht->statut === 0)
                                        <label class="badge badge-warning"  data-toggle="modal" style="font-weight: bold;background-color: rgba(39, 155, 238, 0.82);color: #fff;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $acht->id?>">Voir le contenu</label>
                                      @elseif($acht->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                    <div class="modal fade" id="exampleModalCenter-<?= $acht->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $acht->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$acht->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$acht->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($acht->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($acht->description)!!}">{!! html_entity_decode($acht->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	<embed  src="{{ucfirst($acht->fichier)}}" width=800 height=500 type='application/pdf'/>
	            </div>
	            <!--<div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('achats.traite',['id'=>$acht->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('achats.traite',['id'=>$acht->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>-->
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
                                        
                                        @endif
                                    @break
                            @default
                            <td>
                                        @if($acht->statut === 0)
                                      <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($acht->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                            @endswitch
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

                        @endif
                      
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="total-candidates cerapro-medium-cioccolato-20px">Activités Récentes</h4>
                                      <div class="add-items d-flex mb-0">
                                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> 
                                        <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>-->
                                      </div>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                          @foreach($activity as $act)
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox" disabled="disabled">{{$act->created_at}}<i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">{{$act->action}}</div>
                                              <div class=" me-3">{{$act->user->name}}</div>
                                            </div>
                                          </div>
                                        </li>
                                        @endforeach
                                      </ul>
                                    </div>
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
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique des demandes</h4>
                                  </div>
                                                            @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('achats.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('achats.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Type d'achat</th>
                                        <th>Date / Heure</th>
                                        <th>Pièce Jointe</th>
                                        <th>Statut</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($achats as $acht)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($acht->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($acht->user->name)}}</h6>
                                              <p>{{ucfirst($acht->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($acht->motif->libelle)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($acht->date_depart))}}</h6>
                                        </td>
                                        <td>
                                            <img src="https://inside.demopg.com/public/auth/img/icon-metro-file-pdf-12@1x.png"/>
                                        </td>
                                        <td>
                                        @if($acht->statut === 0)
                                      <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($acht->statut === 1)
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
        <!-- content-wrapper ends -->

      </div>
      <!-- Charts JS-->
    <script>
        var  MONTHS = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mais', 'Juin', 'Juillet','Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        var noteFrais={{$chart_data}};
        var noteFrais1={{$chart_data2}};

        var config1 = {
            type: 'line',
            data: {
                labels:MONTHS,
                datasets: [
					{
						label: 'Non-Traité ',
						backgroundColor: 'rgba(86, 38, 3, 0.18)',
						borderColor: '#562603',
						data: noteFrais,
						borderWidth: 1.5,
                        fill: true, 

					},
					{
						label: 'Traité',
						backgroundColor: 'rgba(255, 100, 3, 0.2)',
						borderColor: '#ff6303',
						data: noteFrais1,
						fill: true,
						borderWidth: 1.5,

					}
				]
            },
            options: {
                legend: { 
                          position: 'bottom', 
                          alignment:'end' 
                    
                },
                
                responsive: true,

                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '{{date('Y')}}',
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Montant',

                        },
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        };
/*var options = {
          //title: 'Register Users Month Wise',
          curveType: 'function',
          legend: { position: 'bottom' }
        };*/
        window.onload = function() {
            var ctx1 = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx1, config1);            
        };
        var colorNames = Object.keys(window.chartColors);

    </script>
  @endsection