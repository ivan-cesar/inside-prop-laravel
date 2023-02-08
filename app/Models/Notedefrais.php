<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notedefrais extends Model
{
    use HasFactory;

    protected $fillable = [
        'motifFrais_id',
        'projet',
        'montant',
        'fichier',
        'description',
        'departement_id',
        'responsable_id',
        'user_id',
    ];
    public function motif()
    {
        return $this->belongsTo(Motifsfrais::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
