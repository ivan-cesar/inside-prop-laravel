<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Departement;
use App\Models\Motifsachat;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use PDF;


class AchatsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        View::share( 'section_title', 'Module utilisateur' );


        View::share('users',User::all());
        View::share('achats',Achat::all());
        View::share('motifs',Motifsachat::all());
        /*View::share( 'nbAttente', Achat::where("statut",0)->count());
        View::share( 'nbRejeter', Achat::where("statut",1)->count());
        View::share( 'nbAccepter', Achat::where("statut",2)->count());*/
        View::share( 'somAttente', Achat::where("statut",0)->sum('montant'));
        View::share( 'somRejeter', Achat::where("statut",2)->sum('montant'));
        View::share( 'somAccepter', Achat::where("statut",1)->sum('montant'));
        View::share('totalMontantTraite', Achat::sum('montant'));
        View::share( 'toutesAchat', Achat::count());
        $this->middleware(function ($request,$next){
            /***/
        switch(Auth::user()->profils()->first()->libelle){
            
        
            case "Admin" :
                View::share( 'nbAttente', Achat::where("statut",0)->count());
                View::share( 'nbRejeter', Achat::where("statut",1)->count());
                View::share( 'nbAccepter', Achat::where("statut",2)->count());
                View::share( 'toutesAchat', Achat::count());
                View::share('nbrCollaborateur',User::count());
                break;
            case "Manager":
                $this->departement_id = Auth::user()->departement_id;
                View::share( 'nbAttente', Achat::where("statut",0)->where("departement_id",$this->departement_id)->count());
                View::share( 'nbRejeter', Achat::where("statut",2)->where("departement_id",$this->departement_id)->count());
                View::share( 'nbAccepter', Achat::where("statut",1)->where("departement_id",$this->departement_id)->count());
                View::share( 'toutesAchat', Achat::where("departement_id",$this->departement_id)->count());
                View::share('nbrCollaborateur',User::where("departement_id",$this->departement_id)->count());
                View::share('activity', Activity::where("user_id",Auth::user()->id)->orderBy('created_at','desc')->get()->take(5));
            default :
                $this->departement_id = Auth::user()->id;
                View::share( 'nbAttente', Achat::where("statut",0)->where("user_id",$this->departement_id)->count());
                View::share( 'nbRejeter', Achat::where("statut",2)->where("user_id",$this->departement_id)->count());
                View::share( 'nbAccepter', Achat::where("statut",1)->where("user_id",$this->departement_id)->count());
                View::share( 'toutesAchat', Achat::where("user_id",$this->departement_id)->count());

        }
        /***/

         return $next ($request);
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['module'] = "Demandes d'achats collaborateurs";
        $data['page_description'] = "Bienvenue sur votre espace de demandes d'achats de vos collaborateurs";
        //dd(Achat::all());
                $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['achats'] = Achat::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }elseif((Auth::user()->responsable == 1)  && (Auth::user()->departement_id == 6) ){
          $data['achats'] = Achat::orderBy("id","DESC")->get();
          $data['nbAttente'] = Achat::where("statut",0)->count();
          $data['nbRejeter'] = Achat::where("statut",2)->count();
          $data['nbAccepter'] = Achat::where("statut",1)->count();
          $data['toutesAchat'] = Achat::count();
          $data['achats_encours'] = Achat::where("statut",0)->orderBy("id","DESC")->get();          
        }elseif((Auth::user()->responsable == 1)){
          $data['achats'] = Achat::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
          $data['achats_encours'] = Achat::where("statut",0)->where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();          
          //$data['activity'] = Activity::where("user_id",Auth::user()->id)->orderBy('created_at','desc')->get()->take(5);
        }else{
             $data['achats_encours'] = Achat::where("statut",0)->orderBy("id","DESC")->get();          
             $data['achats'] = Achat::orderBy("id","DESC")->get();
             $data['activity'] = Activity::orderBy('created_at','desc')->get()->take(8);
        }
        
         /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
            //dd($data['responsable'],$data['departement']);
                             /*Graphique*/
        
        $noteDeFrais = Achat::all();
        $noteDeFrais1 = Achat::where('statut',1)->get();		
		$months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        //Pour les Note de frais de chaque mois
        $k = 0;
        $q = [];
        foreach ($months as $key => $value) {
            foreach ($noteDeFrais as $note){
                if ($note->created_at->month == $value) {
                    $q[$k] = $note->montant;					
                    $k++;
                }
            }			
            $ntFrais [] = array_sum($q);
            $q = [];
        }
		
		//Pour les Note de frais statut 1
        $l = 0;
        $m = [];
        foreach ($months as $key => $value) {
            foreach ($noteDeFrais1 as $note){
                if ($note->created_at->month == $value) {
                    $m[$l] = $note->montant;					
                    $l++;
                }
            }			
            $ntFrais1 [] = array_sum($m);
            $m = [];
        }
		$data['chart_data2'] = json_encode($ntFrais1, JSON_NUMERIC_CHECK);		
		$data['chart_data'] = json_encode($ntFrais, JSON_NUMERIC_CHECK);
        User:logs("Demande d'Achat");
        return view('achats.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = "Gerer mes demandes d'achats";
        $data['page_description'] = "Bienvenue sur votre espace de gestions de vos demandes d'achats";
        	/** Afficher les informations  */
 
                $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['achats'] = Achat::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }elseif(Auth::user()->responsable == 1){
          //$data['achats'] = Achat::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
          $data['achats'] = Achat::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }else{
        $data['achats'] = Achat::orderBy("id","DESC")->get();
        }
        /** Recuperation du département et des responsables */
        $data['departement'] = Departement::find(Auth::user()->departement_id);
        $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
        User:logs("Demande d'Achat");

        return view('achats.create',$data);
    }
     public function traite(Request $request){
         $id = htmlspecialchars($request->id);
         $index = htmlspecialchars($request->index);
         $demande = Achat::where('id',$id)->where('statut',0)->first();
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
      session()->flash('message', 'Achat traité avec succès');
     User::Logs("Traitement d'achat");
      return redirect()->route('achats.index');
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
            "intitule_projet" => "required",
            "description" => "required",
            "montant" => "required",
            "file" => "nullable",
      ],[
            "motif_id" => "le champ motif est obligatoire",
            "intitule_projet" => "le champ intitule projet est obligatoire",
            "description" => "le champ description est obligatoire",
            "montant" => "le champ montant est obligatoire"
            ]);
     
      $achat = new Achat();
      $achat->motif_id = htmlspecialchars($request->motif_id);
      //$achat->projet = htmlspecialchars($request->projet);
      $achat->montant = htmlspecialchars($request->montant);
      $achat->intitule_projet = htmlspecialchars($request->intitule_projet);
      $achat->description = htmlspecialchars($request->description);
      $achat->user_id = Auth::user()->id;
      $achat->departement_id = Auth::user()->departement_id;


      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/achats/'.$annee.'/'.$mois;
        $request->file->move($lien,$fichier);
        $achat->fichier = URL::to('/').'/'.$lien.'/'.$fichier;
      }
      $achat->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Demande crée avec succès');
      return redirect()->route('achats.create');

    }

	 
	 // Générer un PDF
	public function createpdf() {
		 
        $data['achat'] = Achat::all();
		//dd($data['absence']);
        $pdf = PDF::loadView('achats.pdf', $data)->setPaper('a4');
        $name = "Achats.pdf";
		return $pdf->stream($name);
    }

        	public function createUserpdf() {
		 
        $data['achat'] = Achat::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
		//dd($data['absence']);
        $pdf = PDF::loadView('achats.pdf', $data)->setPaper('a4');
        $name = "Achat.pdf";
		return $pdf->stream($name);
    }
	
	public function createResponsablepdf() {
		 
        $data['achat'] = Achat::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
		//dd($data['absence']);
        $pdf = PDF::loadView('achats.pdf', $data)->setPaper('a4');
        $name = "Achat.pdf";
		return $pdf->stream($name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data['page_title'] = "Modifier une demande d'achat - ";
		$data['page_description'] = " ";

		$data['achat'] = Achat::where(['id' => $request->id ])->first();
		if(empty($data['achat'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Demande introuvable');
			return back();
		}

/** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
            //dd($data['responsable'],$data['departement']);
		Achat:logs("Affichage de la page de modification d'achat");

		return view('achats.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(),[
            "motif_id" => "required|integer",
            "intitule_projet" => "required",
            "description" => "required",
            "montant" => "required",
            "file" => "nullable",
      ],[
            "motif_id" => "le champ motif est obligatoire",
            "intitule_projet" => "le champ intitule projet est obligatoire",
            "description" => "le champ description est obligatoire",
            "montant" => "le champ montant est obligatoire"
            ]);
        $id = htmlspecialchars($request->id);
      $data['motif_id'] = htmlspecialchars($request->motif_id);
      $data['montant'] = htmlspecialchars($request->montant);
      $data['intitule_projet'] = htmlspecialchars($request->intitule_projet);
      $data['description'] = htmlspecialchars($request->description);
      $data['user_id'] = Auth::user()->id;
      $data['departement_id'] = Auth::user()->departement_id;
      		if(Achat::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', "Demande d'achat modifié avec succès");
			return redirect()->route('achats.create');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Achat::where('id', $id)->delete()){
            session()->flash('type', 'alert-success');
			session()->flash('message', "Demande d'achat supprimé avec succès");
			return redirect()->route('achats.create');
        }else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
}
