<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Models\Fonction;
use App\Models\Departement;
use App\Models\Profil;
use App\Models\Responsable;
use App\Models\User;
use URL;
//use App\Models\Country;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __construct(){
	    $this->middleware('auth')->except('validation', 'validation_store');
        $this->middleware('auth');
		View::share( 'section_title', 'Module utilisateur' );
		View::share( 'menu', 'users' );

	/*	View::share( 'nbDirector', User::where("profil_id",4)->count());
		View::share( 'nbManager', User::where("profil_id",3)->count());
		View::share( 'nbuser', User::where("profil_id",2)->count());
		View::share( 'nbUser', User::where("profil_id",1)->count());*/
		View::share( 'profils', Profil::all());
		View::share( 'fonctions', Fonction::all());
		View::share( 'departement', Departement::all());
		View::share('responsable', Responsable::all());
		
		View::share('users',User::all());

                $this->middleware(function ($request,$next){
            /***/
        switch(Auth::user()->profils()->first()->libelle){
            
        
            case "Admin" :
                    View::share('nbrUser',User::count());
                    View::share('nbFemmes',User::where('sexe',1)->count());
		            View::share('nbHommes',User::where('sexe',0)->count());
		            View::share('nbrDepartement',Departement::count());
              break;
            default :
                    $this->departement_id = Auth::user()->departement_id;
                    View::share('nbrFonction',User::where("fonction_id",Auth::user()->fonction_id)->count());
                    View::share('nbrUser',User::where("departement_id",$this->departement_id)->count());
                    View::share('nbFemmes',User::where('sexe',1)->where("departement_id",$this->departement_id)->count());
		            View::share('nbHommes',User::where('sexe',0)->where("departement_id",$this->departement_id)->count());
		            //View::share('nbrDepartement',Departement::);
             
        }
        /***/

         return $next ($request);
        });
		$this->middleware('auth');

    }


	public function index(){
		$data['module'] = "Collaborateur";
		$data['page_description'] = "Bienvenue sur votre consultation d'info de vos collaborateurs";
      if(Auth::user()->responsable == 1){
          $data['users'] = User::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
        }else{
		$data['users'] = User::orderBy("id","DESC")->get();
        }
		User:logs("Affichage de la liste des utilisateurs");

		return view('users.index',$data);
    }

	public function create(){
		$data['module'] = "Enregistrer un nouvel collaborateurs";
		$data['page_description'] = "Bienvenue sur votre espace enregistrement de vos collaborateurs";
		$data['matricule'] = User::newMatricule();
		//dd($data['matricule']);

		User:logs("Affichage de la page de creation d'un utilisateur");

		return view('users.create',$data);
    }

	public function store(Request $request){

		$this->validate(request(),[
			  "nom" => "required",
			  "prenoms" => "required",
			  "email" => "required|email|max:255|unique:users",
			  "adresse" => "required",
			  "fonction" => "required|integer",
			  "departement" => "required|integer",
			  "telephone" => "required",
			  "numero_cni"=> "required",
			  "debut" => "required|date",
			  "role" => "required|integer",
			  //"responsable" => "required|integer",
			  "sexe" => "required|integer",
			  "image" => "nullable",


		],
		[
		   	  "nom" => "Le champ nom est obligatoire",
			  "prenoms" => "Le champ prénoms est obligatoire",
			  "email" => "Le champ email est obligatoire",
			  "adresse" => "Le champ adresse est obligatoire",
			  "fonction" => "Le champ fonction est obligatoire",
			  "departement" => "Le champ departement est obligatoire",
			  "telephone" => "Le champ téléphone est obligatoire",
			  "numero_cni"=> "Le champ numero de la cni est obligatoire",
			  "debut" => "Le champ la date debut est obligatoire",
			  "role" => "Le champ rôle est obligatoire",
			  "sexe" => "Le champ sexe est obligatoire",
		    ]);



		$usr = new User;
		$user_matricule = User::where('matricule',htmlspecialchars($request->matricule))->first();
		if (!$user_matricule) {
			$usr->matricule = htmlspecialchars($request->matricule);
		}else{
			$usr->matricule = User::newMatricule();
		}
		$usr->name = htmlspecialchars($request->nom);
		$usr->prenoms = htmlspecialchars($request->prenoms);
		$usr->email = htmlspecialchars($request->email);
		$usr->telephone = htmlspecialchars($request->telephone);
		$usr->avatars = "/images/avatars/avatar.png";
		$usr->profil_id = htmlspecialchars($request->role);
		$usr->fonction_id = htmlspecialchars($request->fonction);
		$usr->debut = htmlspecialchars($request->debut);
		$usr->adresse = htmlspecialchars($request->adresse);
		$usr->sexe = htmlspecialchars($request->sexe);
		$usr->numero_cni = htmlspecialchars($request->numero_cni);
		$usr->departement_id = htmlspecialchars($request->departement);
		$usr->statut = 1;
		$usr->created_by = Auth::user()->nom.' '.Auth::user()->prenoms;

		$password = '1234567890';
		$usr->password = Hash::make($password);

		$user['nom'] = htmlspecialchars($request->nom);
		$user['prenoms'] = htmlspecialchars($request->prenoms);
		$user['email'] =   htmlspecialchars($request->email);
		$user['pass'] = $password;
		$user['urlMailValidation'] = 'email='.strtolower($user['email']);
		//$user['urlNameValidation'] = 'nom='.strtolower($user['nom']);

        if ($request->hasFile('file')) {
                $fichier = time().'.'.$request->file->extension();
                $annee = date('Y');
                $mois = date('m');
                $lien = 'fichiers/users/'.$annee.'/'.$mois;
                $request->file->move($lien,$fichier);
                $usr->avatars = URL::to('/').'/'.$lien.'/'.$fichier;
              }

		$user['profil_id'] =   htmlspecialchars($request->role);
		//$roleValues=[2,3,4];

		/*$users = User::whereIn('profil_id',$user['profil_id'])
						->where('statut',1)
						->get();*/
		//dd($request->all(),$usr);
		
		if($usr->save()){

			@Mail::send('emails.notification',$user, function($message) use($user) {
				$message->from('contact@inside.demopg.com','PROPULSE GROUP')->to($user['email'])->subject('Accès INSIDE PROPULSE GROUP ');
			});
		/*
			foreach ($users as $user){
			   $user['emailuser'] = $user->email;
			   @Mail::send('emails.notifuser', $user, function($message) use($user) {
					$message->from('infos@propulsegroup.com','PROPULSE GROUP')
					   ->to($user['emailuser'])
					   ->subject('Un nouvel utilisateur a été enregistré');
			   });
			}
			*/

			session()->flash('type', 'alert-success');
			session()->flash('message', 'Utilisateur crée avec succès');
			return redirect()->route('users.index');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
		}
	}




	public function edit(Request $request){
		$data['page_title'] = "Modifier un utilisateur - ";
		$data['page_description'] = " ";

		$data['user'] = User::where(['id' => $request->id ])->first();
		if(empty($data['user'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Utilisateur introuvable');
			return back();
		}

		//User:logs("Affichage de la page de modification d'un utilisateur");

		return view('users.edit',$data);
	}

	public function update(Request $request){

		$this->validate(request(),[
		      "id" => "required",
			  "nom" => "required",
			  "prenoms" => "required",
			  "adresse" => "required",
			  "fonction" => "required",
			  "telephone" => "required",
			  "debut" => "required|date",
			  "role" => "nullable|integer",
			  "sexe" => "required|integer",

		]);

		$id = htmlspecialchars($request->id);
		$data["name"] = htmlspecialchars($request->nom);
		$data["prenoms"] = htmlspecialchars($request->prenoms);
		$data["fonction_id"] = htmlspecialchars($request->fonction);
		$data["telephone"] = htmlspecialchars($request->telephone);
		$data["debut"] = htmlspecialchars($request->debut);
		$data["adresse"] = htmlspecialchars($request->adresse);
		$data["sexe"] = htmlspecialchars($request->sexe);


        /*if ($request->file()){
            $file = $request->file('avatars');
            $ext = strtolower($file->getClientOriginalExtension());
            $avatar = time().'_'.Str::slug($request->prenoms).'_erp.'.$ext;
            $request->avatars->move('images/avatars', $avatar);
            $data["avatars"] = '/images/avatars/'.$avatar;
        }*/

		if ($request->role){
            $data["role"] = htmlspecialchars($request->role);
        }
		//test de l'enregistrement suivi d'un message selon cas
		if(User::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Utilisateur modifié avec succès');
			return redirect()->route('users.index');;
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}

	}


	public function editstate(Request $request){
        $id = htmlspecialchars($request->id);
        $user =User::where('id',$id)->first();

        if(!$user){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Utilisateur introuvable');
			return back();
        }
		if($user->statut==1){
			$user->statut =0;
			$user->save();
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Compte utilisateur désactivé avec succès');
			//User:logs("Désactivation du compte utilisateur:".$user->nom .' '.$user->prenoms);
			return redirect()->route('users.index');
		}else{
			$user->statut =1;
			$user->save();
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Compte utilisateur activé avec succès');
			//User::logs("Activation du compte utilisateur : ".$user->nom .' '.$user->prenoms);
			return redirect()->route('users.index');
		}

    }

	public function destroy(Request $request){
        //
        $id = htmlspecialchars($request->id);
        $user = User::where(['id' => $id])->first();

        if(!$user){

			session()->flash('type', 'alert-danger');
			session()->flash('message', "Utilisateur introuvable");
			return back();
		}
		$user->delete();

		session()->flash('type', 'alert-success');
		session()->flash('message', 'Utilisateur supprimé avec succès');
		return back();
    }

    public function validation(Request $request){
		$data['page_title'] = "Ajouter un utilisateur - ";
		$data['page_description'] = "";


		return view('users.validation',$data);
    }

	public function validation_store(Request $request){

		//dd($request->all());
		$this->validate(request(),[
			  "email" => "required",
			  "password" => "required",
			  "password_conf" => "required",
		]);

		$data['email'] =   htmlspecialchars($request->email);
		$data['password'] = Hash::make(htmlspecialchars($request->password));

		$user=User::where('email',$data['email'])->first();

		if(!$user){
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'XXXXXXX');
			return back();
		}
		$user->password= $data['password'];
		$user->date_validation= Carbon::now();
		if($user->save()){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Utilisateur crée avec succès');
			return redirect()->route('home');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
		}
	}


}
