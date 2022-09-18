<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Departement;
use App\Models\Motifsachat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AchatsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        View::share( 'section_title', 'Module utilisateur' );


        View::share('users',User::all());
        View::share('achats',Achat::all());
        View::share('motifs',Motifsachat::all());


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Liste des achats - ";
        $data['page_description'] = "";
        $data['achats'] = Achat::orderBy("id","DESC")->get();
         /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
            //dd($data['responsable'],$data['departement']);
        //User:logs("Affichage de la liste des utilisateurs");
        return view('achats.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Ajouter une Achat - ";
        $data['page_description'] = "";
        /** Recuperation du département et des responsables */
        $data['departement'] = Departement::find(Auth::user()->departement_id);
        $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
        //Absence:logs("Affichage de la page de demande de congé");

        return view('achats.create',$data);
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
            "intitulé_projet" => "required",
            "description" => "required",
            "montant" => "required|integer",
            "file" => "nullable",
      ]);
     
      $achat = new Achat();
      $achat->motif_id = htmlspecialchars($request->motif_id);
      $achat->projet = htmlspecialchars($request->projet);
      $achat->montant = htmlspecialchars($request->montant);
      $achat->intitulé_projet = htmlspecialchars($request->intitulé_projet);
      $achat->description = htmlspecialchars($request->description);
      $achat->user_id = Auth::user()->id;

      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/'.$annee.'/'.$mois;
        $request->fichier->move($lien,$fichier);
        $achat->file = URL::to('/').'/'.$lien.'/'.$fichier;
      }
      $achat->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Demande crée avec succès');
      return redirect()->route('users.index');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
