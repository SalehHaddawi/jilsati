<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahRating extends Model
{
    protected $table = 'jilsahs_ratings';

    protected $fillable =  ['rating', 'comment', 'jilsah_id'];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }

    function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public static function create($jilsah_id, String $rating, $comment){
        $instance = new JilsahRating();
        $instance->jilsah_id = $jilsah_id;
        $instance->user_id = auth()->id();
        $instance->rating = $rating;
        $instance->comment = $comment;

        return $instance;
    }
}
