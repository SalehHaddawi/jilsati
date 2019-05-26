<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahLocation extends Model
{
    protected $table = 'jilsahs_locations';

    protected $fillable = [
        'city_id', 'address', 'description', 'google_map_url'
    ];

    function city(){
        return $this->hasOne('App\City','city_id','id');
    }

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }
}
