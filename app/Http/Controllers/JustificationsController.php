<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Support\Facades\View;
use App\Models\Justification;
use App\Models\Motifsjustification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
		View::share('justifications',Justification::all());
        View::share('motifs',Motifsjustification::all());
		
    }
     
    public function index()
    {
        $data['page_title'] = "Liste des demandes - ";
		$data['page_description'] = "";
		$data['demandes'] = Justification::orderBy("id","DESC")->get();
		 /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		//User:logs("Affichage de la liste des utilisateurs");
		
		return view('justifications.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       	$data['page_title'] = "Ajouter une Justification - ";
		$data['page_description'] = "";
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
		]);
		
		    $jst = new Justification;
    		$jst->motif_id = htmlspecialchars($request->motif_id);
    		$jst->date_depart = htmlspecialchars($request->date_depart);
    		$jst->date_retour = htmlspecialchars($request->date_retour);
    		//$dmd->filenames = $request->file->hashName();
    		$jst->description = htmlspecialchars($request->description);
    		$jst->user_id = Auth::user()->id;
    		//Enregistrement de l'image du logo
        
        if(file_exists($request->file('fichier'))){
            $extension = pathinfo($request->file('fichier')->getClientOriginalName(), PATHINFO_EXTENSION);
            $newName = 'logo-'.Carbon::now()->timestamp.'.'.$extension;
            $upload_path = 'public/justifications/';
            if($request->file('fichier')->move($upload_path, $newName)){
                $jst->fichier  = "http://".$_SERVER['SERVER_NAME']."/public/justifications/".$newName;
            }
        }
    
			if($jst->save()){

			session()->flash('type', 'alert-success');
			session()->flash('message', 'Demande crée avec succès');
			return redirect()->route('justifications.index');
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
    public function edit(Justification $justification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Justification $justification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Justification $justification)
    {
        //
    }
}
