<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Demande;
use App\Models\Departement;
use App\Models\Justification;
use App\Models\Notedefrais;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // View::share('users',User::all());
        View::share('demandes',Demande::all());
        View::share('departements',Departement::all());
        View::share('justifications', Justification::all());
        View::share('achats', Achat::all());
        View::share('notedefrais', Notedefrais::all());
        View::share('nbrConge',Demande::where('motif_id', 'conge')->count());
        View::share('nbrPermission',Demande::where('motif_id', 'permission')->count());
		View::share('nbrAchat',Achat::where('motif_id', 'achat')->count());
		View::share('nbrFrais',Demande::where('motif_id', 'frais')->count());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('home', $data);
    }
}
