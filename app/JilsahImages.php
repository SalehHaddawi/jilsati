<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JilsahImages extends Model
{
    protected $table = 'jilsahs_images';

    protected $fillable = [
        'src'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }

    public static function createAndSave($jilsahImage, Jilsah $jilsah){
        $images = new JilsahImages();
        $images->jilsah_id = $jilsah->id;
        $images->src = Storage::putFile('jilsah-images',$jilsahImage);

        return $images;
    }
}
