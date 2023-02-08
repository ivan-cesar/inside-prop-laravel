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
                                            <div class="group-20"><div class="visitor-1 poppins-medium-delta-14px">Total des départements</div></div>
                                        </div>
                                        <div class="col-md-12">
                                             <h1 class="title poppins-semi-bold-gun-powder-49px" style="text-align: left!important;top:20%;position:relative;">
                                                 {{$nbrDepartement ?? "-"}}
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
                     @include('flashmessage')
                     <div class="col-12 grid-margin stretch-card">
                       <div class="card card-rounded">
                         <div class="card-body">
                           <div class="d-sm-flex justify-content-between align-items-start">
                             <div>
                               <h4 class="total-candidates cerapro-medium-cioccolato-20px">Formulaire d'ajout d'employé</h4>
                             </div>
                           </div>
                           <div class="table-responsive  mt-1">
                             <form action="{{route('users.store')}}"  method="post" enctype="multipart/form-data">
                               @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Matricule</label>
                                                <input type="text" name="matricule" class="form-control poppins-normal-black-15px text-box-copy-3-3 border-1px-cararra" type="text" value="{{$matricule}}" placeholder="PG/2022/04/M/0001" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Nom</label>
                                              <input type="text" name="nom" class="form-control poppins-normal-black-15px text-box-copy-3-4 border-1px-cararra @error('nom') is-invalid @enderror" placeholder="Entrez le nom du collaborateur"/>
                                                            <!-- Le message d'erreur -->
                                                    		@error('nom')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>

                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Prénoms</label>
                                                <input type="text" name="prenoms" class="form-control poppins-normal-black-15px text-box-copy-3-1 border-1px-cararra @error('prenoms') is-invalid @enderror" placeholder="Entrez le prénom du collaborateur"/>
                                                            <!-- Le message d'erreur -->
                                                    		@error('prenoms')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Email Entreprise</label>
                                                <input type="email" name="email" class="form-control poppins-normal-black-15px text-box-copy-3 border-1px-cararra @error('email') is-invalid @enderror" placeholder="Adresse Electronique Entreprise"/>
                                                            <!-- Le message d'erreur -->
                                                    		@error('email')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>

                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Contact Téléphonique</label>
                                                <input type="text" name="telephone" class="form-control poppins-normal-black-15px text-box-copy-3-1 border-1px-cararra @error('telephone') is-invalid @enderror" placeholder="Numéro de Téléphone"/>
                                                            <!-- Le message d'erreur -->
                                                    		@error('telephone')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Adresse Géographique</label>
                                              <input type="text" name="adresse" class="form-control poppins-normal-black-15px text-box-copy-3 border-1px-cararra @error('adresse') is-invalid @enderror" placeholder="Lieu de residence"/>
                                                            <!-- Le message d'erreur -->
                                                    		@error('adresse')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>

                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Numéro CNI</label>
                                                <input type="text" name="numero_cni" class="form-control poppins-normal-black-15px text-box-copy-3-1 border-1px-cararra @error('numero_cni') is-invalid @enderror" placeholder="Numéro de votre carte d'identité"/>
                                                            <!-- Le message d'erreur -->
                                                    		@error('numero_cni')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          </div>
                                        </div>
                                         <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Attribué une role</label>
                                              <select name="role" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px @error('role') is-invalid @enderror" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                    <option value="">Sélectionnez un Profil</option>
                                                    <option value="3">User</option>				  
                                                    <option value="1">Admin</option>				  
                                                    <option value="2">Manager</option>				  
                                                    <option value="4">Director</option>				  
                                                </select>
                                                            <!-- Le message d'erreur -->
                                                    		@error('role')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="row">
                                               <div class="col-md-12">
                                                 <div class="form-group">
                                                  <label class="poppins-normal-black-16px">Fonction</label>
                                                  <select name="fonction" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px @error('fonction') is-invalid @enderror" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                    <option selected>Sélectionnez la fonction</option>
                                                      @foreach ($fonctions as $item)
                                                      <option value="{{$item->id}}">{{ucfirst($item->libelle)}}</option>
                                                      @endforeach
                                                  </select>
                                                            <!-- Le message d'erreur -->
                                                    		@error('fonction')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                               </div>
                                               <div class="col-md-12">
                                                <div class="form-group">
                                              <label class="poppins-normal-black-16px">Departement</label>
                                              <select name="departement" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px @error('departement') is-invalid @enderror" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option>Sélectionnez le departement</option>
                                                  @foreach ($departement as $dptmt)
                                                  <option value="{{$dptmt->id}}">{{ucfirst($dptmt->libelle)}} -> Responsable : {{$dptmt->getResponsable($dptmt->id)}}</option>
                                                  @endforeach
                                              </select>
                                                            <!-- Le message d'erreur -->
                                                    		@error('departement')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                            </div>
                                               </div>
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                <label class="poppins-normal-black-16px">Date de Prise de fonction</label>
                                                  <input type="date" name="debut" class="form-control date poppins-normal-black-15px text-box-copy-3-1 border-1px-cararra @error('debut') is-invalid @enderror" />
                                                            <!-- Le message d'erreur -->
                                                    		@error('debut')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                                </div>
                                              </div>
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                <label class="poppins-normal-black-16px">Sexe</label>
                                                  <select name="sexe" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px @error('sexe') is-invalid @enderror" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                    <option>Sélectionnez un sexe</option>
                                                    <option value="0">Homme</option>				  
                                                    <option value="1">Femme</option>				  
                                                </select>
                                                            <!-- Le message d'erreur -->
                                                    		@error('sexe')
                                                    		<div class="invalid-feedback">{{ $message }}</div>
                                                    		@enderror
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                               <div class="overlap-group6-1">
                                              <div class="bg"><img class="bg-1" src="{{asset('public/auth/img/bg-10@1x.png')}}"></div>
                                              <div class="button-browse-file border-1px-cararra" id="formFile1">
                                                <img class="icon-upload" src="{{asset('public/auth/img/icon-upload-7@1x.png')}}">
                                                <div class="ajouter-une-photo">
                                                    Ajouter une photo
                                                </div>
                                              </div>
                                            <input name="file" type="file" class="uploader" onchange="readURL(this);" accept="image/*,.pdf">
                                              <img class="rectangle-385" alt="Profile image" id="image" src="{{asset('public/auth/img/rectangle-385@1x.png')}}">
                                            </div>
                                            </div>
                                          </div>
                                        </div>
                                         <!--<div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="poppins-normal-black-16px">Responsable Departement</label>
                                              <select name="" class="form-control js-example-basic-single w-100 select2-hidden-accessible poppins-normal-black-16px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                    <option value="">Sélectionnez le responsable hiérarchique</option>
                                                     @foreach($responsable as $respo)
                                                    <option value="{{$respo->id}}" >{{ucfirst($respo->libelle)}}</option>
                                                    @endforeach			  
                                                </select>
                                            </div>
                                          </div>
                                        </div>-->
                                        <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 0px !important;margin-top: 2.5rem;">
                                          <div class="input-group-append">
                                            <button class="btn btn-sm button-next manrope-bold-white-16px" type="reset">Annuler</button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 0px !important;margin-top: 2.5rem;">
                                          <div class="input-group-append">
                                            <button class="btn btn-sm button-next manrope-bold-white-16px" type="submit">Soumettre</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                      </div>
                                     
                                    </div>
                                  </form>
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
                                     <h4 class="total-candidates cerapro-medium-cioccolato-20px">Liste des Utilisateurs</h4>
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
                                           <th>Intitulé du Role</th>
                                         </tr>
                                       </thead>
                                       <tbody>
                                         @foreach($users as $user)
                                         <tr>
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
                                           <td>
                                               @if($user->profils->libelle == "Admin")
                                                  <h6 class="badge badge-danger">{{$user->fonctions ? ucfirst($user->profils->libelle) : "aucune fonction"}}</h6>
                                               @elseif($user->profils->libelle == "Manager")
                                                  <h6 class="badge badge-warning">{{$user->fonctions ? ucfirst($user->profils->libelle) : "aucune fonction"}}</h6>
                                               @else
                                                  <h6 class="badge badge-success">{{$user->fonctions ? ucfirst($user->profils->libelle) : "aucune fonction"}}</h6>
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
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
.uploader {
opacity: 0;
position: absolute;
z-index: 1;
left: 0;
top: 78%;
cursor: pointer;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 @endsection
