<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public function motifs()
    {
        return $this->belongsTo(Motifsabsence::class,'motif_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    } 
    
    public function notification(){
        return $this->hasOne(Notification::class);
    }
}

