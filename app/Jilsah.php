<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jilsah extends Model
{
    protected $table = 'jilsahs';

    function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
