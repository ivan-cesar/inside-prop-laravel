<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
}
