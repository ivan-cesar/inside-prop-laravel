<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Demande;
use App\Models\Fonction;


class ValidationController extends Controller
{
    

    public function validation(Request $request){
		$data['page_title'] = "Ajouter un utilisateur - ";
		$data['page_description'] = "";
		$data['explode'] = $request->email;
		$data['user'] = User::where('email',htmlspecialchars($request->email))->first();		
		//dd($data['user']);

		return view('users.validation',$data);
    }

	public function validation_store(Request $request){

		//dd($request->all());
		$this->validate(request(),[
			  "email" => "required",
			  "password" => "required",
			  "password_conf" => "required",
		]);
		
		$data['email'] =   htmlspecialchars($request->email);
		$data['password'] = Hash::make(htmlspecialchars($request->password));
		
		$user=User::where(['email'=>$data['email'],'date_validation'=> null])->first();
		
		if(!$user){
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Désole nous ne parvenons pas à retrouver votre compte.');
			return back();
		}
		if($user->date_validation != null){
			session()->flash('type', 'alert-success');
			session()->flash('message', 'Votre compte a déja été validé.');
			return redirect()->route('home');
		}else{
			$user->password= $data['password'];
			$user->date_validation= Carbon::now();
			if($user->save()){
				session()->flash('type', 'alert-success');
				session()->flash('message', 'Utilisateur crée avec succès');
				return redirect()->route('home');
			}else{
				session()->flash('type', 'alert-danger');
				session()->flash('message', 'Une erreur s\'est produite à la création, veuillez réessayer');
				return back();
			}
		}
	}
}
