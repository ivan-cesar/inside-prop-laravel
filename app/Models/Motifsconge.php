<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motifsconge extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',

    ];

    public function demande()
    {
        return $this->hasMany(Demande::class, 'motif_id');
    }
}
