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
                        <div class="stat statistics-details d-flex align-items-center justify-content-between" style="width: 98%;">
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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Payées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbPayé ?? "-"}}</h1>
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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Non-Payées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbNonPayé ?? "-"}}</h1>
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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">En cours</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$nbEnCours ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-money">
                                    <img class="icon-awesome-calendar-check" src="https://inside.demopg.com/public/auth/img/frais.png">
                                  </div>
                                  <h6 style="margin-top: 10px; text-align: center;">{{ number_format($somTotal,'0','','.') ?? "-" }} Fcfa</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Total Note de Frais</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$toutesNotedefrais ?? "-"}}
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
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body" style="height: 500px;">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="total-candidates cerapro-medium-cioccolato-20px">Total Note Frais traitées</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">{{ number_format($totalMontantTraite,'0','','.') ?? ""}} Fcfa</h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div class="chartjs-wrapper" style="margin-top: 0rem !important;">
                                  <div style="width:100%;">
                                        <canvas id="canvas" width="700" height="300"></canvas>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card-balance">
              <div class="overlap-group12">
                <div class="wednesday-march-16nd-2021-1214-am poppins-normal-white-14px"><?php echo date("Y"); ?> - <?php echo date("Y") +1; ?></div>
                <div class="title-name-card">
                  <div class="my-balance poppins-medium-white-15px-2">
                    <span class="poppins-medium-white-15px">Montant Annuel <br /></span
                    ><span class="poppins-medium-white-10px">Demande d&#39;achat</span>
                  </div>
                  <div class="x2352500 poppins-semi-bold-white-25px-2">
                    <span class="poppins-semi-bold-white-25px">{{ucfirst( number_format($somTotal,'0','','.') ?? '')}} </span
                    ><span class="poppins-semi-bold-white-25px">FCFA</span>
                  </div>
                </div>
                <div class="overlap-group1-6">
                  <img class="subtract-2" src="{{asset('public/auth/img/subtract-128@1x.png')}}" />
                  <img class="subtract-3" src="{{asset('public/auth/img/subtract-129@1x.png')}}" />
                  <img class="ellipse-4-1" src="{{asset('public/auth/img/ellipse-4-1@1x.png')}}" />
                </div>
                <div class="x064-menu-3">
                  <img class="vector-10" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                  <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                  <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                </div>
              </div>
              <div class="overlap-group-11">
                <div class="rectangle-48"></div>
                <i class="menu-icon  mdi mdi-wallet" style="color:#fff;"></i>
                <div class="main-wallet poppins-medium-white-13px">Visualiser</div>
                <div class="x040-wallet-1"></div>
              </div>
            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card-balance">
              <div class="overlap-group12">
                <div class="wednesday-march-16nd-2021-1214-am poppins-normal-white-14px"><?php echo date("Y"); ?> - <?php echo date("Y") +1; ?></div>
                <div class="title-name-card">
                  <div class="my-balance poppins-medium-white-15px-2">
                    <span class="poppins-medium-white-15px">Montant Mensuel <br /></span
                    ><span class="poppins-medium-white-10px">Demande d&#39;achat</span>
                  </div>
                  <div class="x2352500 poppins-semi-bold-white-25px-2">
                    <span class="poppins-semi-bold-white-25px">{{ucfirst( number_format($somTotalMensuel,'0','','.') ?? '')}}</span
                    ><span class="poppins-semi-bold-white-25px">FCFA</span>
                  </div>
                </div>
                <div class="overlap-group1-6">
                  <img class="subtract-2" src="{{asset('public/auth/img/subtract-128@1x.png')}}" />
                  <img class="subtract-3" src="{{asset('public/auth/img/subtract-129@1x.png')}}" />
                  <img class="ellipse-4-1" src="{{asset('public/auth/img/ellipse-4-1@1x.png')}}" />
                </div>
                <div class="x064-menu-3">
                  <img class="vector-10" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                  <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                  <img class="vector-5" src="{{asset('public/auth/img/vector-113@1x.png')}}" />
                </div>
              </div>
              <div class="overlap-group-11">
                <div class="rectangle-48"></div>
                <div class="main-wallet poppins-medium-white-13px">Visualiser</div>
                <div class="x040-wallet-1"></div>
              </div>
            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        @if(Auth::user()->departement_id == 6)
                        <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Demandes En Cours</h4>
                                  </div>
                                  
                                @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('notedefrais.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('notedefrais.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Projet Lié</th>
                                        <th>Montant</th>
                                        <th>Date/heure</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($notedefrais_encours as $ntf)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($ntf->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($ntf->user->name)}}</h6>
                                              <p>{{ucfirst($ntf->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntf->motif->libelle)}}</h6>
                                          <p>company type</p>
                                        </td>
                                        <td>
                                            <h6>{{ucfirst( number_format($ntf->montant,'0','','.') ?? "")}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($ntf->created_at))}}</h6>
                                        </td>
                                       <td>
                                        @if($ntf->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $ntf->id?>">En cours</label>
                                      @elseif($ntf->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
            <div class="modal fade" id="exampleModalCenter-<?= $ntf->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $ntf->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$ntf->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$ntf->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($ntf->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($ntf->description)!!}">{!! html_entity_decode($ntf->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	   <?php  
	            		         $fileextension = pathinfo($ntf->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		     ?>
	            	<embed  src="{{ucfirst($ntf->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('notedefrais.traite',['id'=>$ntf->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('notedefrais.traite',['id'=>$ntf->id,'index'=>2])}}">Rejeter</a>
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
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Demandes En Cours</h4>
                                  </div>
                                           @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('notedefrais.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('notedefrais.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Projet Lié</th>
                                        <th>Montant</th>
                                        <th>Date/heure</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($notedefrais_encours as $ntf)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($ntf->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($ntf->user->name)}}</h6>
                                              <p>{{ucfirst($ntf->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntf->motif->libelle)}}</h6>
                                          <p>company type</p>
                                        </td>
                                        <td>
                                            <h6>{{ucfirst( number_format($ntf->montant,'0','','.') ?? "")}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{date('d/m/Y H:i',strtotime($ntf->created_at))}}</h6>

                                        </td>
                        @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                              @if($ntf->user->responsable != 1)
                               <td>
                                        @if($ntf->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="font-weight: bold;background-color: rgba(39, 155, 238, 0.82);color: #fff;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $ntf->id?>">Voir le contenu</label>
                                      @elseif($ntf->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
            <div class="modal fade" id="exampleModalCenter-<?= $ntf->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $ntf->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$ntf->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$ntf->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($ntf->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($ntf->description)!!}">{!! html_entity_decode($ntf->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	   <?php  
	            		         $fileextension = pathinfo($ntf->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		     ?>
	            	<embed  src="{{ucfirst($ntf->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            </div>
	            <!--<div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('notedefrais.traite',['id'=>$ntf->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('notedefrais.traite',['id'=>$ntf->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            </div>-->
	          </form>
		      </div>
		    </div>
		  </div>
		</div>

                              @else
                               <td>
                                        @if($ntf->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="font-weight: bold;background-color: rgba(39, 155, 238, 0.82);color: #fff;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $ntf->id?>">Voir le contenu</label>
                                      @elseif($ntf->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
            <div class="modal fade" id="exampleModalCenter-<?= $ntf->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-<?= $ntf->id?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3">Statut de la demande de {{$ntf->user->name}}</h3>
		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Utilsateur</label>
		      			<input type="text" class="form-control" value="{{$ntf->user->name}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Type de demande</label>
		      			<input type="text" class="form-control" value="{{ucfirst($ntf->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($ntf->description)!!}">{!! html_entity_decode($ntf->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            	   <?php  
	            		         $fileextension = pathinfo($ntf->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		     ?>
	            	<embed  src="{{ucfirst($ntf->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            </div>
	            <!--<div class="form-group mb-2 row">
	            	<div class="col-sm-6">
	            	    <a class="form-control btn btn-success rounded submit px-3" href="{{route('notedefrais.traite',['id'=>$ntf->id,'index'=>1])}}">Payé</a>
	            	</div>
	            	<div class="col-sm-6">
	            	   	<a class="form-control btn btn-danger rounded submit px-3" href="{{route('notedefrais.traite',['id'=>$ntf->id,'index'=>2])}}">Rejeter</a>
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
                                        @if($ntf->statut === 0)
                                      <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($ntf->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                      </tr>
                            @endswitch
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
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique des notes de frais</h4>
                                  </div>
                                           @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('notedefrais.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('notedefrais.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                        <th>Projet Lié</th>
                                        <th>Type de note de frais</th>
                                        <th>Date / Heure</th>
                                        <th>Montant</th>
                                        <th>Status</th>
                                        <th>Piece Jointe</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($notedefrais as $ntfrais)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="{{ucfirst($ntfrais->user->avatars)}}" alt="user-image">
                                            <div>
                                              <h6>{{ucfirst($ntfrais->user->name)}}</h6>
                                              <p>{{ucfirst($ntfrais->user->fonctions->libelle)}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->projet)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($ntfrais->motif->libelle)}}</h6>
                                        </td>
                                        <td>
                                            <h6>{{date('d/m/Y H:i',strtotime($ntfrais->created_at))}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst( number_format($ntfrais->montant,'0','','.') ?? "")}} Fcfa</h6>
                                        </td>
                                        <td>
                                          @if($ntfrais->statut === 0)
                                      <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                      @elseif($ntfrais->statut === 1)
                                      <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                      @else
                                      <label class="badge badge-danger">Rejeter</label>
                                      @endif
                                        </td>
                                        <td>
                                            <img src="https://inside.demopg.com/public/auth/img/icon-metro-file-pdf-12@1x.png"/>
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
