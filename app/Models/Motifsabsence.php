<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motifsabsence extends Model
{
    use HasFactory;
    	protected $fillable = [
        'libelle',

    ];
    public function absence()
    {
        return $this->hasMany(Absence::class, 'motif_id');
    }
}
