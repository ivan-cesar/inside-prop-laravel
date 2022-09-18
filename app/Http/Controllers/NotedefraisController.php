<?php

namespace App\Http\Controllers;

use App\Models\Motifsfrais;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departement;
use App\Models\Notedefrais;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class NotedefraisController extends Controller
{
    //
         	public function __construct(){
        $this->middleware('auth');
		View::share( 'section_title', 'Module utilisateur' );
		View::share( 'menu', 'demandes' );	
	
		View::share('users',User::all());
		View::share('notedefrais',Notedefrais::all());
		View::share('motifFrais',Motifsfrais::all());



    }
    
     public function create()
    {
       	$data['page_title'] = "Ajouter une Note de frais - ";
		$data['page_description'] = "";

		 /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		
		//Demande:logs("Affichage de la page de demande de congé");
		
		return view('notedefrais.create',$data);
    }
    
    public function index()
    {
        $data['page_title'] = "Liste des utilisateurs - ";
		$data['page_description'] = "";
		$data['users'] = User::orderBy("id","DESC")->get();
		
		User:logs("Affichage de la liste des utilisateurs");
		
		return view('notedefrais.index',$data);
    }

	public function store(Request $request)
    {
        $this->validate(request(),[
            "motif_id" => "required|integer",
            "projet" => "required",
            "montant" => "required|integer",
            "description" => "required",
      ]);
     
      $ntfrais = new Notedefrais();
      $ntfrais->motif_id = htmlspecialchars($request->motif_id);
      $ntfrais->projet = htmlspecialchars($request->projet);
      $ntfrais->montant = htmlspecialchars($request->montant);
      $ntfrais->description = htmlspecialchars($request->description);
      $ntfrais->user_id = Auth::user()->id;

      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/'.$annee.'/'.$mois;
        $request->fichier->move($lien,$fichier);
        $ntfrais->file = URL::to('/').'/'.$lien.'/'.$fichier;
      }
      $ntfrais->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Demande crée avec succès');
      return redirect()->route('notedefrais.index');

    }
}
