<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    //
    //
    //use Notifiable;


    protected $fillable = [
        'user_id','ip','navigator','action','pays','codepays','url',
    ];


    public function user() {

        return $this->belongsTo('App\User');
    }
}
