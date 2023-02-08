<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Demande;
use App\Models\Departement;
use App\Models\Justification;
use App\Models\Notedefrais;
use App\Models\Absence;
use App\Models\Activity;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     private $id;
    public function __construct()
    {
        $this->middleware('auth');


        //View::share('demandes',Demande::all());
        View::share('departements',Departement::all());
        View::share('totalMontant', Notedefrais::sum('montant'));
        View::share('totalMontantTraite', Notedefrais::where('statut','1')->sum('montant'));
        $startDate = Carbon::createFromFormat('Y-m-d', '2022-11-29')->startOfDay();
        $endDate = $startDate->addDays(30)->endOfDay();
        View::share( 'somTotalMensuel', Notedefrais::whereBetween('created_at', [$startDate, $endDate])->sum('montant'));
        View::share('nbrConge',Demande::where('motif_id', 'conge')->count());
        View::share('nbrPermission',Demande::where('motif_id', 'permission')->count());
		View::share('nbrAchat',Achat::where('motif_id', 'achat')->count());
		View::share('nbrFrais',Demande::where('motif_id', 'frais')->count());
        View::share('nbrUser',User::count());
        
        //Pour le User connecter
        $this->middleware(function ($request,$next){
        $this->id = Auth::user()->id;
        $this->departement = Auth::user()->departement_id;
        View::share('toutesNotedefrais',Notedefrais::where("user_id",$this->id)->count());
        View::share('nbrAbsence',Absence::where("user_id",$this->id)->count());
        View::share('nbrAchat',Achat::where("user_id",$this->id)->count());
        View::share('users',User::where("departement_id",$this->departement)->where('created_at',now())->orderBy("id","DESC")->get());
        return $next ($request);
       });
        

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
                        //dd(Auth::user());
        //$data['users'] = User::all();
        $data['module'] = "Tableau de Bord";
        $data['page_description'] = "Hello, ".Auth::User()->name ." ".Auth::User()->prenoms. " Bienvenue sur votre Back Office";
                /** Afficher les informations  */
        $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['demandes'] = Demande::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get()->take(3);
            $data['absences'] = Absence::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get()->take(3);
            $data['achats'] =   Achat::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get()->take(3);
            $data['justifications'] = Justification::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get()->take(3);
            $data['notedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get()->take(3);
            $data['activity'] = Activity::where("user_id",Auth::user()->id)->orderBy('created_at','desc')->get()->take(5);

        }elseif((Auth::user()->responsable == 1)  && (Auth::user()->departement_id == 6) ){
          $data['demandes'] = Demande::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['users'] = User::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['notedefrais'] = Notedefrais::orderBy("id","DESC")->get()->take(3);
          $data['achats'] = Achat::orderBy("id","DESC")->get()->take(3);
          $data['absences'] = Absence::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['justifications'] = Justification::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['activity'] = Activity::orderBy("id","DESC")->get()->take(5);
        }
        elseif(Auth::user()->responsable == 1){
          /*$data['demandes'] = Demande::where("departement_id",Auth::user()->departement_id)->where('created_at',now())->orderBy("id","DESC")->get();
          $data['users'] = User::where("departement_id",Auth::user()->departement_id)->where('created_at',now())->orderBy("id","DESC")->get();
          $data['notedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->where('created_at',now())->orderBy("id","DESC")->get();*/
          $data['demandes'] = Demande::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['users'] = User::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['notedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['achats'] = Achat::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['absences'] = Absence::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['justifications'] = Justification::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get()->take(3);
          $data['activity'] = Activity::orderBy("id","DESC")->get()->take(5);
        }else{
          $data['demandes'] = Demande::orderBy("id","DESC")->get()->take(3);
          $data['absences'] = Absence::orderBy("id","DESC")->get()->take(3);
          $data['achats'] =   Achat::orderBy("id","DESC")->get()->take(3);
          $data['justifications'] = Justification::orderBy("id","DESC")->get()->take(3);
          $data['notedefrais'] = Notedefrais::orderBy("id","DESC")->get()->take(3);
          $data['users'] = User::orderBy("id","DESC")->get()->take(3);
          $data['activity'] = Activity::orderBy('created_at','desc')->get()->take(20);
        }
        			/** Afficher les informations 
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['notedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->where('created_at',now())->orderBy("id","DESC")->get();
        }elseif(Auth::user()->responsable == 1){
          $data['notedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->where('created_at',now())->orderBy("id","DESC")->get();
        }else{
          $data['notedefrais'] = Notedefrais::orderBy("id","DESC")->get()->take(3);
        }*/
                			/** Afficher les informations  */

        /*if(!in_array(Auth::user()->profil_id,$value)){
            $data['achats'] = Achat::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }elseif(Auth::user()->responsable == 1){
          $data['achats'] = Achat::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
        }else{
          $data['achats'] = Achat::orderBy("id","DESC")->get();
        }*/
        
        /*Graphique*/
        
        $noteDeFrais = Notedefrais::all();
        $noteDeFrais1 = Notedefrais::where('statut',1)->get();		
		$months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        //Pour les Note de frais de chaque mois
        $k = 0;
        $q = [];
        foreach ($months as $key => $value) {
            foreach ($noteDeFrais as $note){
                if ($note->created_at->month == $value) {
                    $q[$k] = $note->montant;					
                    $k++;
                }
            }			
            $ntFrais [] = array_sum($q);
            $q = [];
        }
		
		//Pour les Note de frais statut 1
        $l = 0;
        $m = [];
        foreach ($months as $key => $value) {
            foreach ($noteDeFrais1 as $note){
                if ($note->created_at->month == $value) {
                    $m[$l] = $note->montant;					
                    $l++;
                }
            }			
            $ntFrais1 [] = array_sum($m);
            $m = [];
        }
		$data['chart_data2'] = json_encode($ntFrais1, JSON_NUMERIC_CHECK);		
		$data['chart_data'] = json_encode($ntFrais, JSON_NUMERIC_CHECK);
		
        User::Logs('Afficher tableau de bord');
        return view('home', $data);

    }
}
