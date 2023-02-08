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
                                 <div class="icon-report">
                                    <img class="icon-awesome-calendar-check" src="https://inside.demopg.com/public/auth/img/reporte.png">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Reportées</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$nbReporte ?? "-"}}
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
                     <div class="col-12 grid-margin stretch-card">
                       <div class="card card-rounded">
                         <div class="card-body">
                           <div class="d-sm-flex justify-content-between align-items-start">
                             <div>
                               <h4 class="total-candidates cerapro-medium-cioccolato-20px">Demande de congés en cours</h4>
                             </div>
                             <!--<div class="frame-376">
                               <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbAttente??"-"}}</span>
                               </div>-->
                          @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('demandes.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('demandes.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                   <th>Pieces Jointe</th>
                                   <th>Statut</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 @foreach($demandes_encours as $dmd)
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
                                         <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                       </div>
                                     </div>
                                   </td>
                                   <td>
                                     <h6>{{ucfirst($dmd->motif->libelle)}}</h6>
                                     <p>{!! html_entity_decode($dmd->message) !!}</p>
                                   </td>
                                   <td>
                                       <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                     </td>
                                   <td>
                                     <img src="{{asset('public/auth/img/icon-metro-file-pdf-12@1x.png')}}" alt="">
                                   </td>
                     @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                            <td>
                                @if($dmd->user->responsable != 1)
                                           @switch($dmd->statut)
                                          @case("0")
                                            <label class="badge badge-warning"  data-toggle="modal" style="font-weight: bold;background-color: rgba(39, 155, 238, 0.82);color: #fff;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $dmd->id?>">Voir le contenu</label>
                                          @break
                                          @case("1")
                                            <label class="badge badge-success" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                          @break
                                          @case("2")
                                            <label class="badge badge-danger">Rejeter</label>
                                          @break
                                          @default
                                            <label class="badge badge-info" >Reporté</label>
                                          @endswitch
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
		      			<input type="text" class="form-control" value="{{ucfirst($dmd->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($dmd->description)!!}">{!! html_entity_decode($dmd->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		     <?php  
	            		         $fileextension = pathinfo($dmd->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		     ?>

	            	<embed  src="{{ucfirst($dmd->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            </div>
	            <!--<div class="form-group mb-2 row">
	            	<div class="col-sm-4">
	            	    <a type="submit" class="form-control btn btn-success rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-4">
	            	   	<a type="submit" class="form-control btn btn-danger rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            	<div class="col-sm-4">
	            	   	<a type="submit" class="form-control btn btn-warning rounded submit px-3" href="{{route('demandes.edit',['id'=>$dmd->id])}}">Reporté</a>
	            	</div>
	            </div>-->
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
		                          @else
		                          
		                          @switch($dmd->statut)
                                          @case("0")
                                            <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $dmd->id?>">En cours</label>
                                          @break
                                          @case("1")
                                            <label class="badge badge-success" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                          @break
                                          @case("2")
                                            <label class="badge badge-danger">Rejeter</label>
                                          @break
                                          @default
                                            <label class="badge badge-info" >Reporté</label>
                                          @endswitch
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
		      			<input type="text" class="form-control" value="{{ucfirst($dmd->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($dmd->description)!!}">{!! html_entity_decode($dmd->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		     <?php  
	            		         $fileextension = pathinfo($dmd->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		     ?>

	            	<embed  src="{{ucfirst($dmd->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-4">
	            	    <a type="submit" class="form-control btn btn-success rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-4">
	            	   	<a type="submit" class="form-control btn btn-danger rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            	<div class="col-sm-4">
	            	   	<a type="submit" class="form-control btn btn-warning rounded submit px-3" href="{{route('demandes.edit',['id'=>$dmd->id])}}">Reporté</a>
	            	</div>
	            </div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
		                          @endif
                              @break
                            @default
                            <td>
                                           @switch($dmd->statut)
                                          @case("0")
                                            <label class="badge badge-warning"  data-toggle="modal" style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;" data-target="#exampleModalCenter-<?= $dmd->id?>">En cours</label>
                                          @break
                                          @case("1")
                                            <label class="badge badge-success" style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                          @break
                                          @case("2")
                                            <label class="badge badge-danger">Rejeter</label>
                                          @break
                                          @default
                                            <label class="badge badge-info" >Reporté</label>
                                          @endswitch
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
		      			<input type="text" class="form-control" value="{{ucfirst($dmd->motif->libelle)}}">
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Description</label>
		      			<textaera class="form-control" value="{!! html_entity_decode($dmd->description)!!}">{!! html_entity_decode($dmd->description)!!}</textaera>
		      		</div>
	            <div class="form-group mb-2 row">
	            	<label for="password"> 	Piece Jointe</label>
	            		     <?php  
	            		         $fileextension = pathinfo($dmd->fichier, PATHINFO_EXTENSION);
	            		         $pdf = "application/pdf";
	            		         $image = "image/$fileextension";
	            		         $extension = $fileextension != "pdf" ? $image : $pdf;
	            		     ?>

	            	<embed  src="{{ucfirst($dmd->fichier)}}" width=800 height=500 type='{{$extension}}'/>
	            </div>
	            <div class="form-group mb-2 row">
	            	<div class="col-sm-4">
	            	    <a type="submit" class="form-control btn btn-success rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>1])}}">Accepter</a>
	            	</div>
	            	<div class="col-sm-4">
	            	   	<a type="submit" class="form-control btn btn-danger rounded submit px-3" href="{{route('demandes.traite',['id'=>$dmd->id,'index'=>2])}}">Rejeter</a>
	            	</div>
	            	<div class="col-sm-4">
	            	   	<a type="submit" class="form-control btn btn-warning rounded submit px-3" href="{{route('demandes.edit',['id'=>$dmd->id])}}">Reporté</a>
	            	</div>
	            </div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>
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
                 <div class="col-lg-4 d-flex flex-column">
                   <div class="row flex-grow">
                       <div class="col-12 grid-margin stretch-card">
                         <div class="card card-rounded">
                           <div class="card-body">
                             <div class="row">
                               <div class="col-lg-12">
                                 <div class="d-flex justify-content-between align-items-center">
                                   <h4 class="cerapro-medium-cioccolato-20px">Dernier Ajout (Utilisateur)</h4>
                                   <div class="add-items d-flex mb-0">
                                     <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                     @if($collabo->isNotEmpty())
                                     <button class="add btn-rounded todo-list-add-btn text-white me-0 pl-12p"style="border-radius: 15px;background: #ff0000;border: #ff0000;">New</button>
                                     @else
                                     @endif
                                   </div>
                                 </div>
                                 <p class="caption">Liste des actions éffectuées</p>
                                @forelse($collabo as $key => $act)
                                 <div class="mt-3">
                                   <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                     <div class="d-flex">
                                       <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                       <div class="wrapper ms-3">
                                         <div class="row">
                                           <div class="col-sm-6 poppins-medium-gun-powder-14px">{{ucfirst(collabo->user->name)}}</div>
                                           <div class="col-sm-6 poppins-normal-gun-powder-14px">{{ucfirst(collabo->motif->libelle)}}</div>
                                         </div>
                                       </div>
                                     </div>
                                     <div class="rectangle-107 border-1px-old-copper-2 text-muted text-small">
                                       <a class="done poppins-medium-old-copper-14px" href="#">Voir</a>
                                     </div>
                                   </div>
                                 </div>
                                @empty
                                <div class="mt-3">
                                  <div class="col-sm-12 poppins-medium-gun-powder-14px" style="text-align: center;font-size: 20px;font-weight: 900;margin-top: 57px;">Aucune nouvelle Collaborateur</div>
                                   </div>
                                 </div>
                                @endforelse
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
                                   <!--<div class="frame-376">
                                     <span class="number-3 cerapro-medium-mine-shaft-16px">{{$toutesDemande}}</span>
                                     </div>-->
                      @switch(Auth::user()->profils()->first()->libelle)
                            @case("Admin")
                             <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('demandes.createpdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
                             </div>
                                   @break
                            @default
                            <div>
                               <a class="btn btn-primary btn-lg text-white mb-0 me-0" href="{{route('demandes.createResponsablepdf')}}" target="_blank"><i class="mdi mdi-export"></i>Exporter</a>
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
                                         @foreach($demandes as $dmd)
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
                                                 <p>{{ucfirst($dmd->user->fonctions->libelle)}}</p>
                                               </div>
                                             </div>
                                           </td>
                                           <td>
                                             <h6>{{ucfirst($dmd->motif->libelle)}}</h6>
                                             <p>{!! html_entity_decode($dmd->message) !!}</p>
                                           </td>
                                           <td>
                                               <h6>{{date('d/m/Y H:i',strtotime($dmd->created_at))}}</h6>
                                             </td>
                                           <td>
                                               <img src="{{asset('public/auth/img/icon-metro-file-pdf-12@1x.png')}}" alt="">
                                           </td>
                                           <td>
                                      @switch($dmd->statut)
                                          @case("0")
                                            <label class="badge badge-warning"  style="background-color: #fdf3e8;color: #845d3d;border: 1px solid #fdf3e8;">En cours</label>
                                          @break
                                          @case("1")
                                            <label class="badge badge-success"  style="background-color: #B0FFC2;border: 1px solid #B0FFC2;">Accepter</label>
                                          @break
                                          @case("2")
                                            <label class="badge badge-danger" >Rejeter</label>
                                          @break
                                          @default
                                            <label class="badge badge-warning" style="color: #755102;">Reporté</label>
                                          @endswitch
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
