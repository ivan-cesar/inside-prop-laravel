<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
	
	public function responsable()
    {
        return $this->belongsTo(Departement::class);
    }
	
	public function users()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
