<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jilsah extends Model
{
    protected $table = 'jilsahs';

    protected $fillable = [
      'name', 'description', 'times', 'main_image'
    ];

    function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    function clientTypes(){
        return $this->hasOne('App\jilsahClientTypes','jilsah_id','id');
    }

    function jilsahTypes(){
        return $this->hasOne('App\JilsahTypes','jilsah_id','id');
    }

    function options(){
        return $this->hasOne('App\JilsahOptions','jilsah_id','id');
    }

    function location(){
        return $this->hasOne('App\JilsahLocation','jilsah_id','id');
    }

    function prices(){
        return $this->hasOne('App\JilsahPrices','jilsah_id','id');
    }

    function images(){
        return $this->hasOne('App\JilsahImages','jilsah_id','id');
    }

    function socials(){
        return $this->hasOne('App\JilsahSocials','jilsah_id','id');
    }
}
