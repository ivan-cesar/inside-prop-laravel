<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Responsable;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
		'description',
		'created_by',
		'user_id',
    ];
	
	public function responsable()
    {
        return $this->hasMany(Responsable::class);
    }
	
	public function users()
    {
        return $this->hasMany(User::class);
    }
	
	public static function getResponsable($departementId){
        $responsable=Responsable::where('departement_id',$departementId)->where('statut',1)->first();
		if($responsable){
			$respo=$responsable->user->name .' '.$responsable->user->name;
		}else{
			$respo="AUCUN RESPONSABLE";
		}        
        return $respo;
    }
	
}
