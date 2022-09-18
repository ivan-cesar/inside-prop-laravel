<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
		'created_by',
		'motif_id',
		'date_depart',
		'date_retour',
		'fichier',
		'message',
		'statut',
		'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   
    public function motifs()
    {
        return $this->belongsTo(Motifsconge::class,'motif_id');
    }
}
