<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fonction;
use App\Models\User;
use Illuminate\Support\Facades\View;
class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     	public function __construct(){
        $this->middleware('auth');
		View::share( 'section_title', 'Module utilisateur' );
		View::share( 'menu', 'users' );	
		
		View::share( 'nbDirector', User::where("profil_id",4)->count());
		View::share( 'nbManager', User::where("profil_id",3)->count());
		View::share( 'nbuser', User::where("profil_id",2)->count());
		View::share( 'nbUser', User::where("profil_id",1)->count());
		
		view::share('fonctions',Fonction::all());
		view::share('users',User::all());
		
		$this->middleware('auth');
 
    }
    
	public function index(){
		$data['module'] = "Management - Gestion de Poste";
		$data['page_description'] = "Bienvenue sur votre espace d'ajout des postes utilisateurs";
		$data['users'] = User::orderBy("id","DESC")->get();
		
		User:logs("Affichage de la liste des fonctions");
		
		return view('fonctions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create(){
		$data['module'] = "Management - Gestion de Poste";
		$data['page_description'] = "Bienvenue sur votre espace d'ajout des postes utilisateurs";
		
		User:logs("Affichage de la page de creation d'une fonction");
		
		return view('fonctions.create',$data);
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
			  "libelle" => "required",
			  "description" => "required",
		]);
				$fonction = new Fonction;
		$fonction->libelle = htmlspecialchars($request->libelle);
		$fonction->description = htmlspecialchars($request->description);
				if($fonction->save()){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'La fonction crée avec succès');
			return redirect()->route('fonctions.create');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
		}

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
