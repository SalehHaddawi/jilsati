<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JilsahImages extends Model
{
    protected $table = 'jilsah_images';

    protected $fillable = [
        'src'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }
}
