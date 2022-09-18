<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use App\Models\Departement;
use App\Models\Motifsconge;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


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


    }
     
    public function index()
    {
        $data['page_title'] = "Liste des demandes - ";
		$data['page_description'] = "";
		$data['demandes'] = Demande::orderBy("id","DESC")->get();
		 /** Recuperation du département et des responsables */
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
       	$data['page_title'] = "Ajouter une Demande - ";
		$data['page_description'] = "";
				 /** Recuperation du département et des responsables */
                 $data['departement'] = Departement::find(Auth::user()->departement_id);
                 $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		//Demande:logs("Affichage de la page de demande de congé");
		
		return view('demandes.create',$data);
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
		]);
		
		    $dmd = new Demande;
    		$dmd->motif_id = htmlspecialchars($request->motif_id);
    		$dmd->date_depart = htmlspecialchars($request->date_depart);
    		$dmd->date_retour = htmlspecialchars($request->date_retour);
    		//$dmd->filenames = $request->file->hashName();
    		$dmd->message = htmlspecialchars($request->message);
    		$dmd->user_id = Auth::user()->id;
    		//Enregistrement de l'image du logo
        
        if(file_exists($request->file('filenames'))){
            $extension = pathinfo($request->file('filenames')->getClientOriginalName(), PATHINFO_EXTENSION);
            $newName = 'logo-'.Carbon::now()->timestamp.'.'.$extension;
            $upload_path = 'public/demandes/';
            if($request->file('filenames')->move($upload_path, $newName)){
                $dmd->fichier  = "http://".$_SERVER['SERVER_NAME']."/public/demandes/".$newName;
            }
        }
    
			if($dmd->save()){

			session()->flash('type', 'alert-success');
			session()->flash('message', 'Demande crée avec succès');
			return redirect()->route('demandes.index');
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
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
