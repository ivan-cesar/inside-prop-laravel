@extends('layouts.template')
@section('content')
<div class="main-panel">
   <div class="content-wrapper">
     <div class="row">
       <div class="col-sm-12">
         <div class="home-tab">
           <div class="tab-content tab-content-basic">
             <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
               <!--<div class="row">
                 <div class="col-sm-12">
                   <div class="stat statistics-details d-flex align-items-center justify-content-between">
                     <div class="d-none d-md-block">
                       <div class="row">
                         <div class="visitor">
                           <div class="rectangle_29">
                               <img class="icon-awesome-users" src="{{asset('public/auth/img/icon-awesome-users-3@1x.png')}}">
                             </div>
                           <div class="flex-col">
                             <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Mes Collaborateurs</div></div>
                             <h1 class="title poppins-semi-bold-gun-powder-49px">{{$nbrUser??"-"}}</h1>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="d-none d-md-block">
                       <div class="row">
                         <div class="new-user">
                           <div class="overlap-group1-1">
                             <div class="stat"></div>
                             <div class="group-22"><div class="new-user-1 poppins-medium-delta-14px">Femmes</div></div>
                             <div class="ico-feme"></div>
                             <div class="number poppins-semi-bold-gun-powder-49px" style="margin-left: 20px;">{{$nbFemmes??"-"}}</div>
                             <img class="icon-awesome-user-nurse" src="{{asset('public/auth/img/icon-awesome-user-nurse-1@1x.png')}}">
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="d-none d-md-block">
                       <div class="row">
                         <div class="att-stat">
                           <div class="overlap-group2-2">
                             <div class="rectangle_2"></div>
                             <div class="xhoe-message icon-awesome-user-tie"></div>
                           </div>
                           <div class="group-26">
                             <div class="group-24"><div class="email-unread poppins-medium-delta-14px">Hommes</div></div>
                             <div class="text-1 poppins-semi-bold-gun-powder-49px">{{$nbHommes??"-"}}</div>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="d-none d-md-block">
                        <div class="row">
                         <div class="visitor">
                           <div class="icon-4">
                               <img class="icon-material-work" src="{{asset('public/auth/img/icon-material-work-1@1x.png')}}">
                             </div>
                           <div class="flex-col">
                             <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Total Poste département</div></div>
                             <h1 class="title poppins-semi-bold-gun-powder-49px">{{$nbReporte??"-"}}</h1>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>-->
                              <div class="row">
                 <div class="col-sm-12">
                   <div class="stat statistics-details d-flex align-items-center justify-content-between">
                     <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-emp">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/icon-awesome-users-3@1x.png')}}" style="width:55px;left:-9%">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Employés</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbrUser ?? "-"}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                     <div class="d-none d-md-block">
                            <div class="row">
                                    <div class="col-md-4">
                                    <div class="icon-rejeter">
                                    <img class="icon-awesome-calendar-check" style="width:40px;height:44px" src="{{asset('public/auth/img/icon-awesome-user-nurse-1@1x.png')}}">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Femmes</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">{{$nbFemmes ?? "-"}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                     <div class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="icon-hoe_fond">
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/icon-awesome-user-tie-1@1x.png')}}">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Hommes</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$nbHommes ?? "-"}}
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
                                    <img class="icon-awesome-calendar-check" src="{{asset('public/auth/img/icon-material-work-1@1x.png')}}">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Total des Postes</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;">
                                                 {{$nbrFonction ?? "-"}}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                   </div>
                 </div>
               </div>
            @switch(Auth::user()->profils()->first()->libelle)
                @case("Admin")
                   <div class="row">
                       <div class="col-lg-12 d-flex flex-column">
                           <div class="row flex-grow">
                             <div class="col-12 grid-margin stretch-card">
                               <div class="card card-rounded">
                                 <div class="card-body">
                                   <div class="d-sm-flex justify-content-between align-items-start">
                                       <div>
                                         <h4 class="total-candidates cerapro-medium-cioccolato-20px">Liste de mes collaborateurs</h4>
                                       </div>
                                       <!--<div class="frame-376">
                                         <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbrUser}}</span>
                                         </div>
                                       <div>
                                         <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                       </div>-->
                                     </div>
                                   <div class="table-responsive  mt-1">
                                       <table class="table select-table">
                                           <thead>
                                             <tr>
                                               <th>
                                                 <div class="form-check form-check-flat mt-0">
                                                   <label class="form-check-label">
                                                     <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                 </div>
                                               </th>
                                               <th>Collaborateurs</th>
                                               <th>Fonction</th>
                                               <th>Departement</th>
                                               <th>Responsable</th>
                                               <th>Email</th>
                                               <th>Action</th>
                                             </tr>
                                           </thead>
                                           <tbody>
                                             @foreach($users as $user)
                                             <tr data-toggle="modal" data-id="{{ucfirst($user->id)}}" data-target="#orderModal-{{ucfirst($user->id)}}">
                                               <td>
                                                 <div class="form-check form-check-flat mt-0">
                                                   <label class="form-check-label">
                                                   <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                 </div>
                                               </td>
                                               <td>
                                                 <div class="d-flex ">
                                                   <img src="{{ucfirst($user->avatars)}}" alt="user-image">
                                                   <div>
                                                     <h6>{{ucfirst($user->name)}} {{ucfirst($user->prenoms)}}</h6>
                                                   </div>
                                                 </div>
                                               </td>
                                               <td>
                                                 <h6>{{$user->fonctions ? ucfirst($user->fonctions->libelle) : "aucune fonction"}}</h6>
                                               </td>
                                               <td>
                                                   <h6> {{$user->departement ? ucfirst($user->departement->libelle) : "aucun departements"}}</h6>
                                                 </td>
    										   <td>
    										   @if($user->responsable == 1)
    											   Oui
    											 @else
    												 Non
    											@endif
                                                 </td>
                                               <td>
                                                 <h6>{{ucfirst($user->email)}}</h6>
                                               </td>
    											<td>
                                                 <a href="{{route('responsable.affect',$user->id)}}" onClick="return confirm('Voulez vous affecter ce utilisateur en tant que responsable ?? Confirmez votre action ...')">Responsable</a>
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
                @default
                   <div class="row">
                   <div class="col-lg-12 d-flex flex-column">
                       <div class="row flex-grow">
                         <div class="col-12 grid-margin stretch-card">
                           <div class="card card-rounded">
                             <div class="card-body">
                               <div class="d-sm-flex justify-content-between align-items-start">
                                   <div>
                                     <h4 class="total-candidates cerapro-medium-cioccolato-20px">Liste de mes collaborateurs</h4>
                                   </div>
                                   <!--<div class="frame-376">
                                     <span class="number-3 cerapro-medium-mine-shaft-16px">{{$nbrUser}}</span>
                                     </div>
                                   <div>
                                     <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                   </div>-->
                                 </div>
                               <div class="table-responsive  mt-1">
                                   <table class="table select-table">
                                       <thead>
                                         <tr>
                                           <th>
                                             <div class="form-check form-check-flat mt-0">
                                               <label class="form-check-label">
                                                 <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                             </div>
                                           </th>
                                           <th>Collaborateurs</th>
                                           <th>Fonction</th>
                                           <th>Departement</th>
                                           <th>Email</th>
                                         </tr>
                                       </thead>
                                       <tbody>
                                         @foreach($users as $user)
                                         <tr data-toggle="modal" data-id="{{ucfirst($user->id)}}" data-target="#orderModal-{{ucfirst($user->id)}}">
                                           <td>
                                             <div class="form-check form-check-flat mt-0">
                                               <label class="form-check-label">
                                               <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                             </div>
                                           </td>
                                           <td>
                                             <div class="d-flex ">
                                               <img src="{{ucfirst($user->avatars)}}" alt="user-image">
                                               <div>
                                                 <h6>{{ucfirst($user->name)}} {{ucfirst($user->prenoms)}}</h6>
                                               </div>
                                             </div>
                                           </td>
                                           <td>
                                             <h6>{{$user->fonctions ? ucfirst($user->fonctions->libelle) : "aucune fonction"}}</h6>
                                           </td>
                                           <td>
                                               <h6> {{$user->departement ? ucfirst($user->departement->libelle) : "aucun departements"}}</h6>
                                             </td>
                                           <td>
                                             <h6>{{ucfirst($user->email)}}</h6>
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
                @endswitch
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- partial -->
 </div>
 
 @endsection
