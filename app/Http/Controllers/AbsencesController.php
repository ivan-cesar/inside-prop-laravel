<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absence;
use App\Models\Motifsabsence;
use App\Models\Departement;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        View::share( 'section_title', 'Module utilisateur' );


        View::share('users',User::all());
        View::share('absences',Absence::with('motifs')->get());
        View::share('motifAbsences',Motifsabsence::all());

    }
    public function create()
    {
        $data['page_title'] = "Ajouter une Absence - ";
        $data['page_description'] = "";
        /** Recuperation du département et des responsables */
        $data['departement'] = Departement::find(Auth::user()->departement_id);
        $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
        //dd($data['responsable'],$data['departement']);
        //Absence:logs("Affichage de la page de demande de congé");

        return view('absences.create',$data);
    }
    public function index()
    {
        $data['page_title'] = "Liste des absences - ";
        $data['page_description'] = "";
        $data['absences'] = Absence::orderBy("id","DESC")->get();
         /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
            //dd($data['responsable'],$data['departement']);
        //User:logs("Affichage de la liste des utilisateurs");
        return view('absences.index',$data);
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            "motif_id" => "required|integer",
            "date_depart" => "required",
            "date_retour" => "required",
            "heure_depart" => "required",
            "heure_arriver" => "required",
            "description" => "required",
            "file" => "nullable",
      ]);
     
      $absence = new Absence();
      $absence->motif_id = htmlspecialchars($request->motif_id);
      $absence->date_depart = htmlspecialchars($request->date_depart);
      $absence->date_retour = htmlspecialchars($request->date_retour);
      $absence->heure_depart = htmlspecialchars($request->heure_depart);
      $absence->heure_arriver = htmlspecialchars($request->heure_arriver);
      $absence->description = htmlspecialchars($request->description);
      $absence->user_id = Auth::user()->id;

      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/'.$annee.'/'.$mois;
        $request->fichier->move($lien,$fichier);
        $absence->file = URL::to('/').'/'.$lien.'/'.$fichier;
      }
      $absence->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Demande crée avec succès');
      return redirect()->route('users.index');

    }
}
