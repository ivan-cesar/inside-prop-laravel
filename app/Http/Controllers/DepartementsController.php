<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\Departement;
use App\Models\Responsable;
use App\Models\User;

class DepartementsController extends Controller
{
    public function __construct(){
	    $this->middleware('auth');
       
		View::share( 'section_title', 'Module departement' );
		View::share( 'menu', 'departement' );
		View::share( 'departements', Departement::withCount('users')->get());
		View::share( 'departement', Departement::all());
		
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
		$data['module'] = "Management - Gestion de Departement";
		$data['page_description'] = "Bienvenue sur votre espace d'ajout de departement";
		
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


    public function affect(Request $request){
		//dd($request->all());
        $newResponsable = User::where("id",$request->id)->first();

        $departement = Departement::where("id",$newResponsable->departement_id)->first();
        if($departement->user_id != null){
            $oldUser=User::where('id',$departement->user_id)->first();
            //dd($oldUser);
            $oldUser->responsable =0;
            $oldUser->save();
            $historique = Responsable::where("user_id",$oldUser->id)->where("departement_id",$departement->id)->where("statut",1)->first();
            $historique->statut = 0;
            $historique->to = Carbon::now();
            $historique->save();
        
        }else{
            $historique = new Responsable;
            $historique->user_id = $newResponsable->id;
            $historique->departement_id = $departement->id;
            $historique->from = Carbon::now();
            $historique->to = null;
            $historique->statut = 1;
            $historique->save();
            $newResponsable->responsable=1;
            $newResponsable->save();
        }
        //dd($departement,$newResponsable);
        $departement->user_id = $newResponsable->id;
        $departement->save(); 
		
		
		session()->flash('type', 'alert-success');
		session()->flash('message', 'Offer updated successfully.');
		return back();
        return $newResponsable;
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
    public function edit(Request $request)
    {
       //
		$data['module'] = "Management - Modifier le Departement";
		$data['page_description'] = "";
		
		$data['departement'] = Departement::where(['id' => $request->id ])->first();
		if(empty($data['departement'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Departement introuvable');
			return back();
		}
		
		User:logs("Modification d'un departement");
		return view('departements.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        	$this->validate(request(),[			 
			  "description" => "required",
			  "libelle" => "required|unique:departements",			  
		]);

		$id = htmlspecialchars($request->id);
		$data['libelle'] = htmlspecialchars($request->libelle);
		$data['description'] = htmlspecialchars($request->description);
		$data['statut'] = 1;
		//$data['created_by'] = Auth::user()->name.' '.Auth::user()->prenoms;		
			
	//test de l'enregistrement suivi d'un message selon cas
		if(Departement::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Departement modifié avec succès');
			return redirect()->route('departements.index');;
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Departement ::where('id', $id)->delete()){
            session()->flash('type', 'alert-success');
			session()->flash('message', "Departement supprimé avec succès");
			return redirect()->route('departement s.create');
        }else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
    
}
