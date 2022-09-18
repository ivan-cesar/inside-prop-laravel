<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motifsachat extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',

    ];

    public function achat()
    {
        return $this->hasMany(Achat::class, 'motif_id');
    }
}
