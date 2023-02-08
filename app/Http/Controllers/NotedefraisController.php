<?php

namespace App\Http\Controllers;

use App\Models\Motifsfrais;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departement;
use App\Models\Notedefrais;
use App\Models\Activity;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use PDF;
class NotedefraisController extends Controller
{
    //
         	public function __construct(){
        $this->middleware('auth');
		View::share( 'section_title', 'Module utilisateur' );
		View::share( 'menu', 'demandes' );	
	
		View::share('users',User::all());
		//View::share('notedefrais',Notedefrais::orderBy("id","DESC")->get());
		View::share('motifFrais',Motifsfrais::all());
		View::share('totalMontantTraite', Notedefrais::where('statut','1')->sum('montant'));
        View::share( 'somRejeter', Notedefrais::where("statut",2)->sum('montant'));
        View::share( 'somAccepter', Notedefrais::where("statut",1)->sum('montant'));
         $startDate = Carbon::createFromFormat('Y-m-d', '2022-11-29')->startOfDay();
         $endDate = $startDate->addDays(30)->endOfDay();
        View::share( 'somTotalMensuel', Notedefrais::whereBetween('created_at', [$startDate, $endDate])->sum('montant'));



    }
    
    public function create()
    {
       	$data['module'] = "Gerer mes notes de frais";
		$data['page_description'] = "Bienvenue sur votre espace de gestion de vos notes de frais";
        			/** Afficher les informations  */
        $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['notedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
                    $data['nbEnCours'] =  Notedefrais::where("statut",0)->where("user_id",Auth::user()->id)->count();
                    $data['nbNonPayé'] = Notedefrais::where("statut",2)->where("user_id",Auth::user()->id)->count();
                    $data['nbPayé'] = Notedefrais::where("statut",1)->where("user_id",Auth::user()->id)->count();
                    $data['toutesNotedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->count();
                    $data['nbrCollaborateur'] = User::where("departement_id",Auth::user()->departement_id)->count();
                    $data['somTotal'] =  Notedefrais::where("user_id",Auth::user()->id)->sum('montant');
                    $data['somAttente'] = Notedefrais::where("statut",0)->where("user_id",Auth::user()->id)->sum('montant');

        }
        elseif(Auth::user()->responsable == 1){
               $data['notedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
                    $data['nbEnCours'] =  Notedefrais::where("statut",0)->where("user_id",Auth::user()->id)->count();
                    $data['nbNonPayé'] = Notedefrais::where("statut",2)->where("user_id",Auth::user()->id)->count();
                    $data['nbPayé'] = Notedefrais::where("statut",1)->where("user_id",Auth::user()->id)->count();
                    $data['toutesNotedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->count();
                    /*$data['notedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
                    $data['nbEnCours'] =  Notedefrais::where("statut",0)->where("departement_id",Auth::user()->departement_id)->count();
                    $data['nbNonPayé'] = Notedefrais::where("statut",2)->where("departement_id",Auth::user()->departement_id)->count();
                    $data['nbPayé'] = Notedefrais::where("statut",1)->where("departement_id",Auth::user()->departement_id)->count();
                    $data['toutesNotedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->count();*/
                    $data['nbrCollaborateur'] = User::where("departement_id",Auth::user()->departement_id)->count();
                    $data['somTotal'] =  Notedefrais::where("user_id",Auth::user()->id)->sum('montant');
                    $data['somAttente'] = Notedefrais::where("statut",0)->where("user_id",Auth::user()->id)->sum('montant');
          
        }else{
            //dd(Auth::user());
          $data['notedefrais'] = Notedefrais::orderBy("id","DESC")->get();
          $data['somTotal'] =  Notedefrais::sum('montant');
          $data['somAttente'] = Notedefrais::where("statut",0)->sum('montant');
            //$data['notedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }
		 /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
		
		//Demande:logs("Affichage de la page de demande de congé");
		
		return view('notedefrais.create',$data);
    }
    public function traite(Request $request){
         
         $id = htmlspecialchars($request->id);
         $index = htmlspecialchars($request->index);
         $demande = Notedefrais::where('id',$id)->where('statut',0)->first();
         if(!$demande){
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre note de frais');
             return back();
         }
         if($index == 1){
             $demande->statut = 1;
         }elseif($index == 2){
             $demande->statut = 2;
         }else{
             session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre note de frais');
             return back();   
         }
         $demande->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Note de frais traite avec succès');
     User::Logs('Traitement de note de frais');
      return redirect()->route('notedefrais.index');
     }
    public function index()
    {
        $data['module'] = "Notes de Frais collaborateurs";
		$data['page_description'] = "Bienvenue sur votre espace de notes de frais de vos collaborateurs";
		$data['users'] = User::orderBy("id","DESC")->get();
		        
                $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['notedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        }
        elseif((Auth::user()->responsable == 1)  && (Auth::user()->departement_id == 6) ){
          $data['nbEnCours'] =  Notedefrais::where("statut",0)->count();
          $data['nbNonPayé'] = Notedefrais::where("statut",2)->count();
          $data['nbPayé'] = Notedefrais::where("statut",1)->count();
          $data['toutesNotedefrais'] = Notedefrais::count();
          $data['notedefrais'] = Notedefrais::orderBy("id","DESC")->get();
          $data['activity'] = Activity::where("user_id",Auth::user()->id)->orderBy('created_at','desc')->get()->take(8);
          $data['notedefrais_encours'] = Notedefrais::where("statut",0)->orderBy("id","DESC")->get();          

        }
        elseif(Auth::user()->responsable == 1){
                    $data['notedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
                    $data['nbEnCours'] =  Notedefrais::where("statut",0)->where("departement_id",Auth::user()->departement_id)->count();
                    $data['nbNonPayé'] = Notedefrais::where("statut",2)->where("departement_id",Auth::user()->departement_id)->count();
                    $data['nbPayé'] = Notedefrais::where("statut",1)->where("departement_id",Auth::user()->departement_id)->count();
                    $data['toutesNotedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->count();
                    $data['activity'] = Activity::where("user_id",Auth::user()->id)->orderBy('created_at','desc')->get()->take(8);
          //$data['notedefrais'] = Notedefrais::orderBy("id","DESC")->get();
          $data['notedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
          $data['notedefrais_encours'] = Notedefrais::where("statut",0)->where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();          
        }
        else{
            $data['activity'] = Activity::orderBy('created_at','desc')->get()->take(9);
            $data['nbEnCours'] =  Notedefrais::where("statut",0)->count();
            $data['nbNonPayé'] = Notedefrais::where("statut",2)->count();
            $data['nbPayé'] = Notedefrais::where("statut",1)->count();
            $data['toutesNotedefrais'] = Notedefrais::count();
            $data['notedefrais'] = Notedefrais::orderBy("id","DESC")->get();
            $data['notedefrais_encours'] = Notedefrais::where("statut",0)->orderBy("id","DESC")->get();          

        }
        
         /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
         
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
		
		
		User:logs("Affichage de la liste des utilisateurs");
		
		return view('notedefrais.index',$data);
    }
    
    	 // Générer un PDF
	public function createpdf() {
		 
        $data['notedefrais'] = Notedefrais::all();
		//dd($data['absence']);
        $pdf = PDF::loadView('notedefrais.pdf', $data)->setPaper('a4');
        $name = "Notedefrais.pdf";
		return $pdf->stream($name);
    }
    
    
    public function createUserpdf() {
		 
        $data['notedefrais'] = Notedefrais::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
		//dd($data['absence']);
        $pdf = PDF::loadView('notedefrais.pdf', $data)->setPaper('a4');
        $name = "Notedefrais.pdf";
		return $pdf->stream($name);
    }
	
	public function createResponsablepdf() {
		 if((Auth::user()->responsable == 1)  && (Auth::user()->departement_id == 6)){
		  $data['notedefrais'] = Notedefrais::all();
		//dd($data['absence']);
        $pdf = PDF::loadView('notedefrais.pdf', $data)->setPaper('a4');
        $name = "Notedefrais.pdf";
		return $pdf->stream($name);
		 }else{
		  $data['notedefrais'] = Notedefrais::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
		//dd($data['absence']);
        $pdf = PDF::loadView('notedefrais.pdf', $data)->setPaper('a4');
        $name = "Notedefrais.pdf";
		return $pdf->stream($name);
		 }

    }


	public function store(Request $request)
    {
        $this->validate(request(),[
            "motif_id" => "required|integer",
            "projet" => "required",
            "montant" => "required|integer",
            "description" => "required",
      ],[
         "motif_id" => 'le champ motif est obligatoire',
         "projet" => 'le champ projet est obligatoire',
         "montant" => 'le champ montant est obligatoire',
         "description" => 'le champ descripton est obligatoire'
          ]);
      $ntfrais = new Notedefrais();
      $ntfrais->motif_id = htmlspecialchars($request->motif_id);
      $ntfrais->projet = htmlspecialchars($request->projet);
      $ntfrais->montant = htmlspecialchars($request->montant);
      $ntfrais->description = htmlspecialchars($request->description);
      $ntfrais->user_id = Auth::user()->id;
      $ntfrais->departement_id = Auth::user()->departement_id;


      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/notefrais/'.$annee.'/'.$mois;
        $request->file->move($lien,$fichier);
        $ntfrais->fichier = URL::to('/').'/'.$lien.'/'.$fichier;
      }
      if($ntfrais->save()){
        session()->flash('type', 'alert-success');
        session()->flash('message', 'Note de frais crée avec succès');
        return redirect()->route('notedefrais.create');
      }else{
          	session()->flash('type', 'alert-danger');
			session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
			return back();
      }


    }
    public function edit(Request $request){
        
        $data['page_title'] = "Modifier une absence - ";
		$data['page_description'] = " ";

		$data['notefrais'] = Notedefrais::where(['id' => $request->id ])->first();
		if(empty($data['notefrais'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Demande introuvable');
			return back();
		}

         /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
            //dd($data['responsable'],$data['departement']);
		Demande:logs("Affichage de la page de modification de demande");

		return view('notedefrais.edit',$data);
    }
    public function update(Request $request){
        $this->validate(request(),[
            "motif_id" => "required|integer",
            "projet" => "required",
            "montant" => "required|integer",
            "description" => "required",
      ],[
         "motif_id" => 'le champ motif est obligatoire',
         "projet" => 'le champ projet est obligatoire',
         "montant" => 'le champ montant est obligatoire',
         "description" => 'le champ descripton est obligatoire'
          ]);
          $id = htmlspecialchars($request->id);
      $data['motif_id'] = htmlspecialchars($request->motif_id);
      $data['projet'] = htmlspecialchars($request->projet);
      $data['montant'] = htmlspecialchars($request->montant);
      $data['description'] = htmlspecialchars($request->description);
      $data['user_id'] = Auth::user()->id;
      $data['departement_id'] = Auth::user()->departement_id;


      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/notefrais/'.$annee.'/'.$mois;
        $request->file->move($lien,$fichier);
        $data['fichier'] = URL::to('/').'/'.$lien.'/'.$fichier;
      }
          	if(Notedefrais::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', "Note de frais modifié avec succès");
			return redirect()->route('notedefrais.create');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
    public function destroy($id){
        if(Notedefrais::where('id', $id)->delete()){
            session()->flash('type', 'alert-success');
			session()->flash('message', "Note de frais supprimé avec succès");
			return redirect()->route('notedefrais.create');
        }else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
}
