<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'libelle',
		'created_by',
		'user_id',
    ];
    
        	public function users()
    {
        return $this->hasMany(User::class);
    }
}
