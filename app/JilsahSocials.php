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

    public static function create(Array $socialsJSON, Jilsah $jilsah){
        $socials = new JilsahSocials();
        $socials->jilsah_id = $jilsah->id;
        $socials->phone = $socialsJSON['phone'];
        $socials->instagram = $socialsJSON['instagram'];
        $socials->facebook = $socialsJSON['facebook'];
        $socials->twitter = $socialsJSON['twitter'];
        $socials->snapchat = $socialsJSON['snapchat'];

        return $socials;
    }
}
