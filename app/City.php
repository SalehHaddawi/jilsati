<?php

namespace App;

use App\Traits\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;
//use Venturecraft\Revisionable\RevisionableTrait;

class City extends Model
{
    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;

    protected $table = 'cities';

    protected $fillable = [
      'name'
    ];

    function locations(){
        return $this->hasMany('App\JilsahLocation','city_id','id');
    }
}
