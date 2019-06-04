<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahPrices extends Model
{
    protected $table = 'jilsahs_prices';

    protected $fillable = [
        'price_per_jilsah','school_week','school_weekend','vacation_week','vacation_weekend','eid','ramadan'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }

    public static function create(Array $pricesJSON,Jilsah $jilsah){
        $prices = new JilsahPrices();
        $prices->jilsah_id = $jilsah->id;
        $prices->price_per_jilsah = $pricesJSON['pricePerJilsah'];
        $prices->school_week = $pricesJSON['schoolWeek'];
        $prices->school_weekend = $pricesJSON['schoolWeekend'];
        $prices->vacation_week = $pricesJSON['vacationWeek'];
        $prices->vacation_weekend = $pricesJSON['vacationWeekend'];
        $prices->eid = $pricesJSON['eid'];
        $prices->ramadan = $pricesJSON['ramadan'];

        return $prices;
    }
}
