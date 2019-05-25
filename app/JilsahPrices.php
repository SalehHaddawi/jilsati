<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahPrices extends Model
{
    protected $table = 'jilsahs_prices';

    protected $fillable = [
        'school_week','school_weekend','vacation_week','vacation_weekend','eid','ramadan'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }
}
