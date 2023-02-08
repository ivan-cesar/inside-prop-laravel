<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\View;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
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
		
		view::share('profils',Profil::all());
		view::share('users',User::all());
		
		$this->middleware('auth');
 
    }
    public function index()
    {
        $data['module'] = "Management - Gestion de Profil";
		$data['page_description'] = "";
		$data['users'] = User::orderBy("id","DESC")->get();
		
		User:logs("Affichage de la liste des profils");
		
		return view('profils.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = "Management - Gestion de Profil";
		$data['page_description'] = "Bienvenue sur votre espace d'ajout des droits utilisateurs";
		
		User:logs("Affichage de la page de creation d'un profil");
		
		return view('profils.create',$data);
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
		]);
				$prf = new Profil;
		$prf->libelle = htmlspecialchars($request->libelle);
				if($prf->save()){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Le Profil crée avec succès');
			return redirect()->route('profils.create');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
