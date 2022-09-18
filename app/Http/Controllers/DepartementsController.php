<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\Departement;
use App\Models\User;

class DepartementsController extends Controller
{
    public function __construct(){
	    $this->middleware('auth');
       
		View::share( 'section_title', 'Module departement' );
		View::share( 'menu', 'departement' );
		View::share( 'departements', Departement::withCount('users')->get());
		
		view::share('users',User::all());
 
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$data['page_title'] = "Liste des departements - ";
		$data['page_description'] = "";
		
		User:logs("Affichage de la liste des departements");
		
		return view('departements.index',$data);
    }

    public function store(Request $request){
	
		$this->validate(request(),[			 
			  "description" => "required",
			  "libelle" => "required|unique:departements",			  
		]);

		$dept = new Departement;
		$dept->libelle = htmlspecialchars($request->libelle);
		$dept->description = htmlspecialchars($request->description);
		$dept->statut = 1;
		$dept->created_by = Auth::user()->name.' '.Auth::user()->prenoms;		
			
		if($dept->save()){
			

			session()->flash('type', 'alert-success');
			session()->flash('message', 'Département crée avec succès');
			return redirect()->route('departements.index');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        //
    }
}
