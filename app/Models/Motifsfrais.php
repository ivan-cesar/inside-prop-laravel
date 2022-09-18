<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motifsfrais extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
    ];
    public function notedefrais()
    {
        return $this->belongsTo(User::class, 'notedefrais_id');
    }
}
