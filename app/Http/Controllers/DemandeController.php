<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use App\Models\Departement;
use App\Models\Motifsconge;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

     	public function __construct(){
        $this->middleware('auth');
		View::share( 'section_title', 'Module utilisateur' );
		View::share( 'menu', 'demandes' );

		View::share( 'nbDirector', User::where("profil_id",4)->count());
		View::share( 'nbManager', User::where("profil_id",3)->count());
		View::share( 'nbuser', User::where("profil_id",2)->count());
		View::share( 'nbUser', User::where("profil_id",1)->count());
		View::share('nbrConge',Demande::where('motif_id', 'conge')->count());

		View::share('users',User::all());
		View::share('demandes',Demande::all());
        View::share('motifConge',Motifsconge::all());

        //Pour le User connecter
        $this->middleware(function ($request,$next){
          switch(Auth::user()->profils()->first()->libelle){
             case "Admin" :
                View::share( 'nbAttente', Demande::where("statut",0)->count());
                View::share( 'nbAccepter', Demande::where("statut",1)->count());
                View::share( 'nbRejeter', Demande::where("statut",2)->count());
                View::share( 'nbReporte', Demande::where("statut",3)->count());
                View::share( 'toutesDemande', Demande::count());
             break;
             case "Manager" :
                $this->id = Auth::user()->departement_id;
                View::share('toutesDemande', Demande::where("departement_id",$this->id)->count());
                View::share( 'nbAttente', Demande::where("departement_id",$this->id)->where("statut",0)->count());
                View::share( 'nbAccepter', Demande::where("departement_id",$this->id)->where("statut",1)->count());
                View::share( 'nbRejeter', Demande::where("departement_id",$this->id)->where("statut",2)->count());
                View::share( 'nbReporte', Demande::where("departement_id",$this->id)->where("statut",3)->count());
             default;
                $this->id = Auth::user()->id;
                View::share('toutesDemande', Demande::where("user_id",$this->id)->count());
                View::share( 'nbAttente', Demande::where("user_id",$this->id)->where("statut",0)->count());
                View::share( 'nbAccepter', Demande::where("user_id",$this->id)->where("statut",1)->count());
                View::share( 'nbRejeter', Demande::where("user_id",$this->id)->where("statut",2)->count());
                View::share( 'nbReporte', Demande::where("user_id",$this->id)->where("statut",3)->count());
         }
        return $next ($request);
       });


    }
   
        public function traite(Request $request){
         
         $id = htmlspecialchars($request->id);
         $index = htmlspecialchars($request->index);
         $demande = Demande::where('id',$id)->where('statut',0)->first();
         if(!$demande){
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre demande');
             return back();
         }
         if($index == 1){
             $demande->statut = 1;
         }elseif($index == 2){
             $demande->statut = 2;
         }else{
             session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre demande');
             return back();   
         }
         $demande->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Demande traite avec succès');
     User::Logs('Traitement de demande');
      return redirect()->route('demandes.create');
     }
     
    public function index()
    {
        $data['module'] = "Demandes de congés collaborateurs";
		$data['page_description'] = "Bienvenue sur votre espace de demandes de congés de vos collaborateurs";
		if(Auth::user()->responsable == 1){
               $data['toutesDemande'] =  Demande::where("departement_id",Auth::user()->departement_id)->count();
                $data['nbAttente'] = Demande::where("departement_id",Auth::user()->departement_id)->where("statut",0)->count();
                $data['nbAccepter'] = Demande::where("departement_id",Auth::user()->departement_id)->where("statut",1)->count();
                $data['nbRejeter'] = Demande::where("departement_id",Auth::user()->departement_id)->where("statut",2)->count();
                $data['nbReporte'] = Demande::where("departement_id",Auth::user()->departement_id)->where("statut",3)->count();
		   $data['demandes'] = Demande::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
		   $data['demandes_encours'] = Demande::where("statut",0)->where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();          
		 /** Recuperation du département et des responsables */
		 $data['collabo'] = User::Where("departement_id",Auth::user()->departement_id)->Where('created_at',now())->get()->take(3);
		}else{
		    $data['toutesDemande'] =  Demande::all()->count();
            $data['nbAttente'] = Demande::where("statut",0)->count();
            $data['nbAccepter'] = Demande::where("statut",1)->count();
            $data['nbRejeter'] = Demande::where("statut",2)->count();
            $data['nbReporte'] = Demande::where("statut",3)->count();
		 $data['demandes'] = Demande::orderBy("id","DESC")->get();
		 $data['demandes_encours'] = Demande::where("statut",0)->orderBy("id","DESC")->get();          
		 /** Recuperation du département et des responsables */
		 $data['collabo'] = User::Where("departement_id",Auth::user()->departement_id)->Where('created_at',now())->get()->take(3); 
		}
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		//User:logs("Affichage de la liste des utilisateurs");

		return view('demandes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       	$data['module'] = "Gerer mes demandes de congés";
		$data['page_description'] = "Bienvenue sur votre espace de gestions de vos demandes de congés";
		/** Afficher les informations  */
        $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['demandes'] = Demande::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }
        elseif(Auth::user()->responsable == 1){
          //$data['demandes'] = Demande::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
          $data['demandes'] = Demande::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
          $data['collabo'] = Demande::Where("departement_id",Auth::user()->departement_id)->Where('created_at',now())->get()->take(3);
        }else{
          $data['demandes'] = Demande::orderBy("id","DESC")->get();
        }
				 /** Recuperation du département et des responsables */
                 $data['departement'] = Departement::find(Auth::user()->departement_id);
                 $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		//Demande:logs("Affichage de la page de demande de congé");

		return view('demandes.create',$data);
    }

	 
	 // Générer un PDF
	public function createpdf() {
		 
        $data['demandes'] = Demande::all();
        $pdf = PDF::loadView('demandes.pdf', $data)->setPaper('a4');
        $name = "Demandes.pdf";
		return $pdf->stream($name);
    }
    
    public function createUserpdf() {
		 
        $data['demandes'] = Demande::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        $pdf = PDF::loadView('demandes.pdf', $data)->setPaper('a4');
        $name = "Demandes.pdf";
		return $pdf->stream($name);
    }
	
	public function createResponsablepdf() {
		 
        $data['demandes'] = Demande::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
        $pdf = PDF::loadView('demandes.pdf', $data)->setPaper('a4');
        $name = "Demandes.pdf";
		return $pdf->stream($name);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
			  "motif_id" => "required|integer",
			  "date_depart" => "required",
			  "date_retour" => "required",
			  "message" => "required",
			  /*"filenames" => "required|mimes:jpeg,pdf,png,jpeg,zip"*/
		],[
            "motif_id" => "le champ motif est obligatoire",
            "date_depart" => "le champ date depart est obligatoire",
            "date_retour" => "le champ date retour est obligatoire",
            "message" => "le champ message est obligatoire"
            ]);

		    $dmd = new Demande;
    		$dmd->motif_id = htmlspecialchars($request->motif_id);
    		$dmd->date_depart = htmlspecialchars($request->date_depart);
    		$dmd->date_retour = htmlspecialchars($request->date_retour);
    		//$dmd->filenames = $request->file->hashName();
    		$dmd->message = htmlspecialchars($request->message);
    		$dmd->user_id = Auth::user()->id;
    		$dmd->departement_id = Auth::user()->departement_id;
    		//Enregistrement de l'image du logo

        /*if(file_exists($request->file('filenames'))){
            $extension = pathinfo($request->file('filenames')->getClientOriginalName(), PATHINFO_EXTENSION);
            $newName = 'logo-'.Carbon::now()->timestamp.'.'.$extension;
            $upload_path = 'fichiers/demandes/';
            if($request->file('filenames')->move($upload_path, $newName)){
                $dmd->fichier  = "http://".$_SERVER['SERVER_NAME']."/fichiers/demandes/".$newName;
            }
        }*/
              if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
           //dd($request->hasFile('file'),$request->file->extension());
        //dd($fichier);
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/conges/'.$annee.'/'.$mois;
        //dd($lien);
        $request->file->move($lien,$fichier);
        $dmd->fichier = URL::to('/').'/'.$lien.'/'.$fichier;
        //dd($dmd->file);
      }

			if($dmd->save()){

			session()->flash('type', 'alert-success');
			session()->flash('message', 'Demande crée avec succès');
			return redirect()->route('demandes.create');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
		}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    	public function edit(Request $request){
		$data['page_title'] = "Modifier une demande - ";
		$data['page_description'] = " ";

		$data['demande'] = Demande::where(['id' => $request->id ])->first();
		if(empty($data['demande'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Demande introuvable');
			return back();
		}

		Demande:logs("Affichage de la page de modification de demande");

		return view('demandes.edit',$data);
	}

    public function editConge(Request $request){
		$data['page_title'] = "Modifier une demande - ";
		$data['page_description'] = " ";

		$data['demande'] = Demande::where(['id' => $request->id ])->first();
		if(empty($data['demande'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Demande introuvable');
			return back();
		}

		Demande:logs("Affichage de la page de modification de demande");

		return view('demandes.editConge',$data);
	}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    	public function update(Request $request){

     $this->validate(request(),[
			  "date_report" => "required",
			  "message" => "required",
		],[
            "date_report" => "le champ date report est obligatoire",
            "message" => "le champ message est obligatoire"
            ]);
		$id = htmlspecialchars($request->id);
		$data["date_report"] = htmlspecialchars($request->date_report);
		$data["message_report"] = htmlspecialchars($request->message);
		$data["statut"] = 3;
		//test de l'enregistrement suivi d'un message selon cas
		if(Demande::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Demande modifié avec succès');
			return redirect()->route('demandes.index');;
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}

	}
	
	public function modifier(Request $request){
        $this->validate(request(),[
			  "motif_id" => "required|integer",
			  "date_depart" => "required",
			  "date_retour" => "required",
			  "message" => "required",
			  /*"filenames" => "required|mimes:jpeg,pdf,png,jpeg,zip"*/
		],[
            "motif_id" => "le champ motif est obligatoire",
            "date_depart" => "le champ date depart est obligatoire",
            "date_retour" => "le champ date retour est obligatoire",
            "message" => "le champ message est obligatoire"
            ]);
		    $id = htmlspecialchars($request->id);
		    $data["motif_id"] = htmlspecialchars($request->motif_id);
    		$data["date_depart"] = htmlspecialchars($request->date_depart);
    		$data["date_retour"] = htmlspecialchars($request->date_retour);
    		$data["message"] = htmlspecialchars($request->message);
    		$data["user_id"] = Auth::user()->id;
    		$data["departement_id"] = Auth::user()->departement_id;
		//test de l'enregistrement suivi d'un message selon cas
		if(Demande::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Demande de congé modifié avec succès');
			return redirect()->route('demandes.create');;
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Demande::where('id', $id)->delete()){
            session()->flash('type', 'alert-success');
			session()->flash('message', "Demande de congé supprimé avec succès");
			return redirect()->route('demandes.create');
        }else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
}
