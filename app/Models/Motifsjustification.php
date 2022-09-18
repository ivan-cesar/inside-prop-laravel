<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motifsjustification extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',

    ];
    public function justifications()
    {
        return $this->hasMany(Justification::class, 'motif_id');
    }
}
