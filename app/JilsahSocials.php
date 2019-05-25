<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahSocials extends Model
{
    protected $table = 'jilsahs_socials';

    protected $fillable = [
        'phone', 'instagram', 'facebook', 'twitter', 'snapchat'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }
}
