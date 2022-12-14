<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justification extends Model
{
    use HasFactory;
    	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        
        'user_id',
		'date_depart',
		'motif_id',
		'fichier',
		'description',
		'statut',
        'departement_id',
        'responsable_id',
        'date_retour',
    ];
   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function motif()
    {
        return $this->belongsTo(Motifsjustification::class , 'motif_id');
    }
}
