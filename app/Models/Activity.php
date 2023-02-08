<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    //
    //use Notifiable;


    protected $fillable = [
        'user_id','ip','navigator','action','pays','codepays','url',
    ];


    public function user() {

        return $this->belongsTo('App\Models\User');
    }
}
