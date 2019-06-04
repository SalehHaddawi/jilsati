<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JilsahImage extends Model
{
    protected $table = 'jilsahs_images';

    protected $fillable = [
        'src'
    ];

    function jilsah(){
        return $this->belongsTo('App\Jilsah','jilsah_id','id');
    }

    public static function createAndSave($jilsahImage, Jilsah $jilsah){
        $images = new JilsahImage();
        $images->jilsah_id = $jilsah->id;
        $images->src = Storage::disk('public')->putFile('jilsah-images',$jilsahImage);

        return $images;
    }
}
