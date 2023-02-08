<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absence;
use App\Models\Motifsabsence;
use App\Models\Notification;
use App\Models\Departement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\UploadFile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use PDF;



use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        View::share( 'section_title', 'Module utilisateur' );


        View::share('users',User::all());
        View::share('absences',Absence::with('motifs')->get());
        View::share('motifAbsences',Motifsabsence::all());

        //dd(View::share('absences',Absence::with('motifs')->get()));
        $this->middleware(function ($request,$next){
            
                 View::share('notification',Notification::where('user_id',Auth::user()->id)->get());

            /***/
        switch(Auth::user()->profils()->first()->libelle){
            
        
            case "Admin" :
                    View::share( 'nbrAttente', Absence::where("statut",0)->count());
                    View::share( 'nbrRejeter', Absence::where("statut",2)->count());
                    View::share( 'nbrAccepter', Absence::where("statut",1)->count());
                    View::share('nbrAbsence',Absence::count());
                    View::share('nbrCollaborateur',User::all()->count());
             break;
            /*case "Manager" :
                    $this->departement_id = Auth::user()->departement_id;
                    View::share( 'nbrAttente', Absence::where("statut",0)->where("departement_id",$this->departement_id)->count());
                    View::share( 'nbrRejeter', Absence::where("statut",2)->where("departement_id",$this->departement_id)->count());
                    View::share( 'nbrAccepter', Absence::where("statut",1)->where("departement_id",$this->departement_id)->count());
                    View::share('nbrAbsence',Absence::where("departement_id",$this->departement_id)->count());
                    View::share('nbrCollaborateur',User::where("departement_id",$this->departement_id)->count());*/
             default;
                    /*$this->departement_id = Auth::user()->id;
                    View::share( 'nbrAttente', Absence::where("statut",0)->where("user_id",$this->departement_id)->count());
                    View::share( 'nbrRejeter', Absence::where("statut",2)->where("user_id",$this->departement_id)->count());
                    View::share( 'nbrAccepter', Absence::where("statut",1)->where("user_id",$this->departement_id)->count());
                    View::share('nbrAbsence',Absence::where("user_id",$this->departement_id)->count());
                    View::share('nbrCollaborateur',User::where("departement_id",$this->departement_id)->count());*/
        }
        /***/

         return $next ($request);
        });

    }
    public function create()
    {

        $data['module'] = "Gerer mes demandes absences";
        $data['page_description'] = "Bienvenue sur votre espace de gestion de vos demandes d'absences";
        /** Afficher les informations  */
        $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['absences'] = Absence::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
            
            $data['nbrAttente'] = Absence::where("statut",0)->where("user_id",Auth::user()->id)->count();
            $data['nbrRejeter'] = Absence::where("statut",2)->where("user_id",Auth::user()->id)->count();
            $data['nbrAccepter'] = Absence::where("statut",1)->where("user_id",Auth::user()->id)->count();
            $data['nbrAbsence'] = Absence::where("user_id",Auth::user()->id)->count();
            $data['nbrCollaborateur'] = User::where("id",Auth::user()->id)->count();
        }elseif(Auth::user()->responsable == 1){
            $data['absences'] = Absence::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
            $data['nbrAttente'] = Absence::where("statut",0)->where("user_id",Auth::user()->id)->count();
            $data['nbrRejeter'] = Absence::where("statut",2)->where("user_id",Auth::user()->id)->count();
            $data['nbrAccepter'] = Absence::where("statut",1)->where("user_id",Auth::user()->id)->count();
          /*$data['absences'] = Absence::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
            $data['nbrAttente'] = Absence::where("statut",0)->where("departement_id",Auth::user()->departement_id)->count();
            $data['nbrRejeter'] = Absence::where("statut",2)->where("departement_id",Auth::user()->departement_id)->count();
            $data['nbrAccepter'] = Absence::where("statut",1)->where("departement_id",Auth::user()->departement_id)->count();*/
            $data['nbrAbsence'] = Absence::where("departement_id",Auth::user()->departement_id)->count();
            $data['nbrCollaborateur'] = User::where("departement_id",Auth::user()->departement_id)->count();
        }else{
          $data['absences'] = Absence::orderBy("id","DESC")->get();
        }
        /** Recuperation du département et des responsables */
        $data['departement'] = Departement::find(Auth::user()->departement_id);
        //$data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
        $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();

        //dd($data['responsable'],$data['departement']);
        //Absence:logs("Affichage de la page de demande de congé");
         User::Logs('Demande collaborateur');

        return view('absences.create',$data);
    }
    public function index()
    {
         $data['module'] = "Demandes collaborateurs";
        $data['page_description'] = "Bienvenue sur votre espace des demandes absences de vos collaborateurs";
        $value=[1,2];
        if(!in_array(Auth::user()->profil_id,$value)){
            $data['absences'] = Absence::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
            
            $data['nbrAttente'] = Absence::where("statut",0)->where("user_id",Auth::user()->id)->count();
            $data['nbrRejeter'] = Absence::where("statut",2)->where("user_id",Auth::user()->id)->count();
            $data['nbrAccepter'] = Absence::where("statut",1)->where("user_id",Auth::user()->id)->count();
            $data['nbrAbsence'] = Absence::where("user_id",Auth::user()->id)->count();
            $data['nbrCollaborateur'] = User::where("id",Auth::user()->id)->count();
        }elseif(Auth::user()->responsable == 1){
          $data['absences'] = Absence::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
          $data['absences_encours'] = Absence::where("statut",0)->where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();          
          $data['nbrAttente'] = Absence::where("statut",0)->where("departement_id",Auth::user()->departement_id)->count();
            $data['nbrRejeter'] = Absence::where("statut",2)->where("departement_id",Auth::user()->departement_id)->count();
            $data['nbrAccepter'] = Absence::where("statut",1)->where("departement_id",Auth::user()->departement_id)->count();
            $data['nbrAbsence'] = Absence::where("departement_id",Auth::user()->departement_id)->count();
            $data['nbrCollaborateur'] = User::where("departement_id",Auth::user()->departement_id)->count();
        }else{
            //dd(Auth::user());
          $data['absences_encours'] = Absence::where("statut",0)->orderBy("id","DESC")->get();          
          $data['absences'] = Absence::orderBy("id","DESC")->get();

        }
         /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
            //dd($data['responsable'],$data['departement']);
        User::Logs('Gerer mes demandes');
        return view('absences.index',$data);
    }
     public function traite(Request $request){
         
         $id = htmlspecialchars($request->id);
         $index = htmlspecialchars($request->index);
         $demande = Absence::where('id',$id)->where('statut',0)->first();
         if(!$demande){
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre demande');
             return back();
         }
         if($index == 1){
             $demande->statut = 1;
         }elseif($index == 2){
             $demande->statut = 2;
         }else{
             session()->flash('type', 'alert-danger');
            session()->flash('message', 'Impossible de traité votre demande');
             return back();   
         }
         $demande->save();
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Demande traite avec succès');
     User::Logs('Traitement de demande');
      return redirect()->route('absences.index');
     }
	 
	 // Générer un PDF 2
	public function createpdf() {
        $data['absence'] = Absence::all();
        $pdf = PDF::loadView('absences.pdf', $data)->setPaper('a4', 'landscape');
        $name = 'absences.pdf';
		return $pdf->stream($name);
    }
    public function createUserpdf() {
		 
        $data['absence'] = Absence::where("user_id",Auth::user()->id)->orderBy("id","DESC")->get();
        dd($data['absence']);
        $pdf = PDF::loadView('absences.pdf', $data)->setPaper('a4');
        $name = "Absences.pdf";
		return $pdf->stream($name);
    }
	
	public function createResponsablepdf() {
		 
        $data['absence'] = Absence::where("departement_id",Auth::user()->departement_id)->orderBy("id","DESC")->get();
        $pdf = PDF::loadView('absences.pdf', $data)->setPaper('a4');
        $name = "Absences.pdf";
		return $pdf->stream($name);
    }
     /*
     // Générer un PDF
    public function createpdf() {
      // Récupérer tous les enregistrements de la base de données
      $data = Absence::all();
      // partager les données à visualiser
      view()->share('absences',$data);
      //dd($data->toArray());
      PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Roboto']);
      $pdf = PDF::loadView('absences.index', $data->toArray());
      // télécharger le fichier PDF avec la méthode de téléchargement
      return $pdf->download('pdf_file.pdf');
    }
	*/
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
      ],[
            "motif_id" => "le champ motif est obligatoire",
            "date_depart" => "le champ date depart est obligatoire",
            "date_retour" => "le champ date retour est obligatoire",
            "heure_depart" => "le champ heure depart est obligatoire",
            "heure_arriver" => "le champ heure arriver est obligatoire",
            "description" => "le champ description est obligatoire"
            ]);

      $absence = new Absence();
      $absence->motif_id = htmlspecialchars($request->motif_id);
      $absence->date_depart = htmlspecialchars($request->date_depart);
      $absence->date_retour = htmlspecialchars($request->date_retour);
      $absence->heure_depart = htmlspecialchars($request->heure_depart);
      $absence->heure_arriver = htmlspecialchars($request->heure_arriver);
      $absence->description = htmlspecialchars($request->description);
      $absence->user_id = Auth::user()->id;
      $absence->departement_id = Auth::user()->departement_id;
      
     

      if ($request->hasFile('file')) {
        $fichier = time().'.'.$request->file->extension();
           //dd($request->hasFile('file'),$request->file->extension());
        //dd($fichier,"fichier");
        $annee = date('Y');
        $mois = date('m');
        $lien = 'fichiers/absences/'.$annee.'/'.$mois;
        //dd($lien);
        $request->file->move($lien,$fichier);
        $absence->file = URL::to('/').'/'.$lien.'/'.$fichier;
        //dd($absence->file);
      }
            //dd(pathinfo($absence->file, PATHINFO_EXTENSION),"extension");
      $absence->extension = pathinfo($absence->file, PATHINFO_EXTENSION);
      $absence->save();
      
      $respo = User::Where("departement_id",Auth::user()->departement_id)->Where("responsable",1)->first();
      
      $responsable['email'] = $respo->email;
      $responsable['nom'] = $respo->name;
      $responsable['prenom'] = $respo->prenoms;
      //$respo = User::Where("departement_id",Auth::user()->departement_id)->Where("responsable",1)->first();

      if($respo != null){
          
      $notif = new Notification();
      $notif->user_id = $respo->id;
      $notif->message = "Vous avez une nouvelle demande à traiter";
      $notif->sender = Auth::user()->name .' '.Auth::user()->prenoms;
      $notif->absences_id = $absence->id;
      $notif->save();
      }
	     @Mail::send('emails.autorisation',$responsable, function($message) use($responsable) {
				$message->from('contact@inside.demopg.com','PROPULSE GROUP')->to($responsable['email'])->subject("Autorisation d'absence INSIDE PROPULSE GROUP ");
			});
      session()->flash('type', 'alert-success');
      session()->flash('message', 'Demande crée avec succès');
      return redirect()->route('absences.create');

    }

    public function edit(Request $request)
    {
        $data['page_title'] = "Modifier une absence - ";
		$data['page_description'] = " ";

		$data['absences'] = Absence::where(['id' => $request->id ])->first();
		if(empty($data['absences'])){
			session()->flash('type', 'alert-danger');
            session()->flash('message', 'Demande introuvable');
			return back();
		}

         /** Recuperation du département et des responsables */
         $data['departement'] = Departement::find(Auth::user()->departement_id);
         $data['responsable'] = User::Where("departement_id",$data['departement']->id)->Where("responsable",1)->first();
            //dd($data['responsable'],$data['departement']);
		Demande:logs("Affichage de la page de modification de demande");

		return view('absences.edit',$data);
    }

    public function update(Request $request)
    {
        
        $this->validate(request(),[
            "motif_id" => "required|integer",
            "date_depart" => "required",
            "date_retour" => "required",
            "heure_depart" => "required",
            "heure_arriver" => "required",
            "description" => "required",
            "file" => "nullable",
      ],[
            "motif_id" => "le champ motif est obligatoire",
            "date_depart" => "le champ date depart est obligatoire",
            "date_retour" => "le champ date retour est obligatoire",
            "heure_depart" => "le champ heure depart est obligatoire",
            "heure_arriver" => "le champ heure arriver est obligatoire",
            "description" => "le champ description est obligatoire"
            ]);
		$id = htmlspecialchars($request->id);
		//dd($id);
		
      $data['motif_id'] = htmlspecialchars($request->motif_id);
      $data['date_depart'] = htmlspecialchars($request->date_depart);
      $data['date_retour'] = htmlspecialchars($request->date_retour);
      $data['heure_depart'] = htmlspecialchars($request->heure_depart);
      $data['heure_arriver'] = htmlspecialchars($request->heure_arriver);
      $data['description'] = htmlspecialchars($request->description);
      $data['user_id']= Auth::user()->id;
      $data['departement_id'] = Auth::user()->departement_id;
		
		
		/*$data["date_report"] = htmlspecialchars($request->date_report);
		$data["message_report"] = htmlspecialchars($request->message);
		$data["statut"] = 3;*/
		//test de l'enregistrement suivi d'un message selon cas
		if(Absence::where([ 'id' => $id ])->update($data)){
			session()->flash('type', 'alert-success');
			session()->flash('message', "Demande d'absence modifié avec succès");
			return redirect()->route('absences.create');
		}else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }

    public function destroy($id)
    {
        if(Absence::where('id', $id)->delete()){
            session()->flash('type', 'alert-success');
			session()->flash('message', "Demande d'absence supprimé avec succès");
			return redirect()->route('absences.create');
        }else{
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Erreur lors de la modification');
			return back();
		}
    }
}
