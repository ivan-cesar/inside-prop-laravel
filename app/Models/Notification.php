<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    
    public function absence(){
        return $this->belongsTo(Absence::class);
    }
    
    public function achat(){
        return $this->belongsTo(Achat::class);
    }
    
    public function demande(){
        return $this->belongsTo(Demande::class);
    }
    
    public function justification(){
        return $this->belongsTo(Justification::class);
    }
}
