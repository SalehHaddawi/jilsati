<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahOptions extends Model
{
    protected $table = 'jilsahs_options';

    protected $fillable = [
        'name'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }
}
