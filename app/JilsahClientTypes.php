<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahClientTypes extends Model
{
    protected $table = 'jilsah_client_types';

    protected $fillable = [
      'name', 'jilsah_id'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }
}
