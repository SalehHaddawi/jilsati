<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahTypes extends Model
{
    protected $table = 'jilsah_types';

    protected $fillable = [
        'name'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }

    public static function create(String $name, Jilsah $jilsah){
        $instance = new JilsahTypes();
        $instance->jilsah_id = $jilsah->id;
        $instance->name = $name;

        return $instance;
    }
}
