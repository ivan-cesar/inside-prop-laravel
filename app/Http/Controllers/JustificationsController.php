<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Justification;
use App\Models\Motifsjustification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class JustificationsController extends Controller
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
		View::share( 'menu', 'justifications');

		View::share( 'nbDirector', User::where("profil_id",4)->count());
		View::share( 'nbManager', User::where("profil_id",3)->count());
		View::share( 'nbuser', User::where("profil_id",2)->count());
		View::share( 'nbUser', User::where("profil_id",1)->count());
		View::share('users',User::all());
        View::share('motifs',Motifsjustification::all());

        View::share( 'nbUser', User::where("profil_id",1)->count());
     
                  
    $this->middleware(function ($request,$next)
    {

        switch(Auth::user()->profils()->first()->libelle)
        {
            
            case "Admin":
                View::share( 'nbTraites', Justification::where("statut",1)->count());
                View::share( 'nbRejeter', Justification::where("statut",2)->count());
                View::share( 'nbNonTraites', Justification::where("statut",0)->count());
                View::share( 'toutesJustifications', Justification::count());
                View::share('users',User::count());
                break;
            case "Manager":
                $this->departement_id = Auth::user()->departement_id;
                View::share( 'nbTraites', Justification::where("statut",1)->where("departement_id",$this->departement_id)->count());
                View::share( 'nbRejeter', Justification::where("statut",2)->where("departement_id",$this->departement_id)->count());
                View::share( 'nbNonTraites', Justification::where("statut",0)->where("departement_id",$this->departement_id)->count());
                View::share( 'toutesJustifications', Justification::where("departement_id",$this->departement_id)->count());
                View::share('users',User::where("departement_id",$this->departement_id)->count());
            default:
                $this->id = Auth::user()->id;
                View::share('toutesDemande', Justification::where("user_id",$this->id)->count());
                View::share( 'nbNonTraites', Justification::where("user_id",$this->id)->where("statut",0)->count());
                View::share( 'nbTraites', Justification::where("user_id",$this->id)->where("statut",1)->count());
                View::share( 'nbRejeter', Justification::where("user_id",$this->id)->where("statut",2)->count());
                View::share( 'toutesJustifications', Justification::where("user_id",$this->id)->count());
        }
         return $next ($request);
    });
     
 }
    public function index()
    {
        $data['module'] = "Justifications collaborateurs";
		$data['page_description'] = "Bienvenue sur votre espace de justifications d'absences de vos collaborateurs";
		//$data['demandes'] = Justification::orderBy("id","DESC")->get();
					/** Afficher les informations  */
        $value=[1,2];
                //dd(Auth::user()->responsable);
        $respo = [1,3];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['justifications'] = Justification::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }
        elseif(!in_array(Auth::user()->profil_id,$respo)){
            $data['justifications_encours'] = Justification::where("statut",0)->where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();          
            $data['justifications'] = Justification::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
        }else{
            $data['justifications_encours'] = Justification::where("statut",0)->orderBy("id","DESC")->get();          
            $data['justifications'] = Justification::orderBy("id","DESC")->get();
        }
		 /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		//User:logs("Affichage de la liste des utilisateurs");

		return view('justifications.index',$data);
    }
    
    	 
	 // Générer un PDF
	public function createpdf() {
		 
        $data['justifications'] = Justification::all();
		//dd($data['absence']);
        $pdf = PDF::loadView('justifications.pdf', $data)->setPaper('a4');
        $name = "Justifications.pdf";
		return $pdf->stream($name);
    }
    
    
        public function createUserpdf() {
		 
        $data['justifications'] = Justification::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
		//dd($data['absence']);
        $pdf = PDF::loadView('justifications.pdf', $data)->setPaper('a4');
        $name = "Justifications.pdf";
		return $pdf->stream($name);
    }
	
	public function createResponsablepdf() {
		 
        $data['justifications'] = Justification::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
		//dd($data['absence']);
        $pdf = PDF::loadView('justifications.pdf', $data)->setPaper('a4');
        $name = "Justifications.pdf";
		return $pdf->stream($name);
    }
    
         public function traite(Request $request){
         
         $id = htmlspecialchars($request->id);
         $index = htmlspecialchars($request->index);
         $demande = Justification::where('id',$id)->where('statut',0)->first();
         if(!$demande){
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre justifications');
             return back();
         }
         if($index == 1){
             $demande->statut = 1;
         }elseif($index == 2){
             $demande->statut = 2;
         }else{
             session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre justifications');
             return back();   
         }
         $demande->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Justification traité avec succès');
     User::Logs('Traitement de justification');
      return redirect()->route('justifications.create');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       	$data['module'] = "Gerer mes justifications d'absences";
		$data['page_description'] = "Bienvenue sur votre espace de gestion de vos justifications d'absences";
			/** Afficher les informations  */
        $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['justifications'] = Justification::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }
        elseif(Auth::user()->responsable == 1){
          //$data['justifications'] = Justification::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
          $data['justifications'] = Justification::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }else{
          $data['justifications'] = Justification::orderBy("id","DESC")->get();
        }
		 /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		//Demande:logs("Affichage de la page de demande de congé");

		return view('justifications.create',$data);
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
			  "description" => "required",

			  /*"filenames" => "required|mimes:jpeg,pdf,png,jpeg,zip"*/
		],[
            "motif_id" => "le champ motif est obligatoire",
            "date_depart" => "le champ date depart est obligatoire",
            "date_retour" => "le champ date retour est obligatoire",
            "description" => "le champ description est obligatoire"
            ]);

		    $jst = new Justification;
    		$jst->motif_id = htmlspecialchars($request->motif_id);
    		$jst->date_depart = htmlspecialchars($request->date_depart);
    		$jst->date_retour = htmlspecialchars($request->date_retour);
    		//$dmd->filenames = $request->file->hashName();
    		$jst->description = htmlspecialchars($request->description);
    		$jst->user_id = Auth::user()->id;
    		$jst->departement_id = Auth::user()->departement_id;

    		//Enregistrement de l'image de la justification
                      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
           //dd($request->hasFile('file'),$request->file->extension());
        //dd($fichier);
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/justifications/'.$annee.'/'.$mois;
        //dd($lien);
        $request->file->move($lien,$fichier);
        $jst->fichier = URL::to('/').'/'.$lien.'/'.$fichier;
        //dd($dmd->file);
      }

			if($jst->save()){

			session()->flash('type', 'alert-success');
			session()->flash('message', 'Demande crée avec succès');
			return redirect()->route('justifications.create');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
		}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function show(Justification $justification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
        public function edit(Request $request){
		$data['page_title'] = "Modifier une justification - ";
		$data['page_description'] = " ";

		$data['justification'] = Justification::where(['id' => $request->id ])->first();
		if(empty($data['justification'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'justification introuvable');
			return back();
		}

		Justification:logs("Affichage de la page de modification de demande");

		return view('justifications.edit',$data);
	}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
               $this->validate(request(),[
			  "motif_id" => "required|integer",
			  "date_depart" => "required",
			  "date_retour" => "required",
			  "description" => "required",

			  /*"filenames" => "required|mimes:jpeg,pdf,png,jpeg,zip"*/
		],[
            "motif_id" => "le champ motif est obligatoire",
            "date_depart" => "le champ date depart est obligatoire",
            "date_retour" => "le champ date retour est obligatoire",
            "description" => "le champ description est obligatoire"
            ]);
            $id = htmlspecialchars($request->id);
            $data['motif_id'] = htmlspecialchars($request->motif_id);
    		$data['date_depart'] = htmlspecialchars($request->date_depart);
    		$data['date_retour'] = htmlspecialchars($request->date_retour);
    		$data['description'] = htmlspecialchars($request->description);
    		$data['user_id'] = Auth::user()->id;
    		$data['departement_id'] = Auth::user()->departement_id;
         		//test de l'enregistrement suivi d'un message selon cas
         		//dd($data);
		if(Justification::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', "Justification d'absence modifié avec succès");
			return redirect()->route('justifications.create');;
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Justification::where('id', $id)->delete()){
            session()->flash('type', 'alert-success');
			session()->flash('message', "Justification d'absence supprimé avec succès");
			return redirect()->route('justifications.create');
        }else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
}
