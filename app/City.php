<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
      'name'
    ];

    function locations(){
        return $this->hasMany('App\JilsahLocation','city_id','id');
    }
}
