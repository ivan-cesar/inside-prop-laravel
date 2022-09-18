<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    public function motifs()
    {
        return $this->belongsTo(Motifsachat::class,'motif_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
