<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
	
	protected $fillable = [
        'name',
        'prenoms',
        'email',
        'password',
        'telephone',
		'adresse',
		'avatar',
		'created_by',
        'statut',
        'fonction_id',
        'profil_id',
        'departement_id',
        'responsable',
        'sexe',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
	 public function fonctions()
    {
        return $this->belongsTo(Fonction::class, 'fonction_id');
    }
    
    	 public function profils()
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }
	
	public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
    public function justifications()
    {
        return $this->hasMany(Justification::class);
    }
	
	public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
	public function responsable()
    {
        return $this->hasMany(Responsable::class);
    }

    public function absence()
    {
        return $this->hasMany(Absence::class);
    }
    public function notefrais()
    {
        return $this->hasMany(Notedefrais::class);
    }
    public function achat()
    {
        return $this->hasMany(Achat::class);
    }
    public static function newMatricule()
    {
        $user = User::orderBy('id','DESC')->first();
        //Verification de l'annee
        if ($user){
            $count = $user->created_at->format('Y') == date('Y') ? $user->id + 1 :  1;
        }else{
            $count = 1;
        }
        return 'PG/'.date('Y').'/'.date('m').'/M/'.str_pad($count, 4, '0', STR_PAD_LEFT);
    }
    public function activites()
    {
        return $this->hasMany('App\Models\Activity');
    }
    
    public static function logs($msg){

        $activity['user_id'] 	= Auth::user()->id;
        $activity['ip']		 	= (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '' ;

        $agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';

        // Detect Device/Operating System
        if(preg_match('/Linux/i',$agent)) $os = 'Linux';
        elseif(preg_match('/Mac/i',$agent)) $os = 'Mac';
        elseif(preg_match('/iPhone/i',$agent)) $os = 'iPhone';
        elseif(preg_match('/iPad/i',$agent)) $os = 'iPad';
        elseif(preg_match('/Droid/i',$agent)) $os = 'Droid';
        elseif(preg_match('/Unix/i',$agent)) $os = 'Unix';
        elseif(preg_match('/Windows/i',$agent)) $os = 'Windows';
        else $os = 'Unknown';

        // Browser Detection
        if(preg_match('/Firefox/i',$agent)) $br = 'Firefox';
        elseif(preg_match('/Mac/i',$agent)) $br = 'Mac';
        elseif(preg_match('/Chrome/i',$agent)) $br = 'Chrome';
        elseif(preg_match('/Opera/i',$agent)) $br = 'Opera';
        elseif(preg_match('/MSIE/i',$agent)) $br = 'IE';
        else $br = 'Unknown';
        setlocale(LC_TIME, 'fr_FR.utf8','fra');
        $activity['navigator']  = $br.'/'.$os;
        $activity['action']		= $msg;
        $activity['pays']		= (isset($_SERVER['GEOIP_COUNTRY_NAME'])) ? $_SERVER['GEOIP_COUNTRY_NAME'] : '' ;
        $activity['codepays']	= (isset($_SERVER['GEOIP_COUNTRY_CODE'])) ? $_SERVER['GEOIP_COUNTRY_CODE'] : '' ;
        $activity['url']		= (isset($_SERVER['SCRIPT_URI'])) ? $_SERVER['SCRIPT_URI'] : '' ;

        Activity::create($activity);
    }
    
    public static function getNotification($id){
        $notif = Notification::where('user_id',$id)->get();
        return $notif;
    }
}
