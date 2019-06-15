<?php

namespace App;

use App\Traits\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;
//use Venturecraft\Revisionable\RevisionableTrait;


class Jilsah extends Model
{

    use RevisionableTrait;

    protected $table = 'jilsahs';

    protected $fillable = [
      'name', 'description', 'times', 'main_image'
    ];

    function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    function clientTypes(){
        return $this->hasMany('App\jilsahClientTypes','jilsah_id','id');
    }

    function jilsahTypes(){
        return $this->hasMany('App\JilsahTypes','jilsah_id','id');
    }

    function options(){
        return $this->hasMany('App\JilsahOptions','jilsah_id','id');
    }

    function location(){
        return $this->hasOne('App\JilsahLocation','jilsah_id','id');
    }

    function prices(){
        return $this->hasOne('App\JilsahPrices','jilsah_id','id');
    }

    function images(){
        return $this->hasMany('App\JilsahImage','jilsah_id','id');
    }

    function socials(){
        return $this->hasOne('App\JilsahSocials','jilsah_id','id');
    }

    function ratings(){
        return $this->hasMany('App\JilsahRating','jilsah_id','id');
    }

    function ratingsAVGs(){
        return $this->ratings()->selectRaw('jilsah_id, avg(rating) as ratingsAVG')
            ->groupBy('jilsah_id');
    }

    function ratingsCount(){
        return $this->ratings()->selectRaw('jilsah_id, count(rating) as count')
            ->groupBy('jilsah_id');
    }

    public static function create(\Illuminate\Http\Request $request){
        $jilsah = new Jilsah();
        $jilsah->user_id = auth()->id();
        $jilsah->name = $request->get('name');
        $jilsah->description = $request->get('description');
        $jilsah->times = $request->get('times');
        $jilsah->main_image = '';

        return $jilsah;
    }
}
