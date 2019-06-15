<?php

namespace App;

use App\Traits\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;

class JilsahRating extends Model
{
    use RevisionableTrait;

    protected $table = 'jilsahs_ratings';

    protected $fillable =  ['rating', 'comment', 'jilsah_id'];

    /**REVISION**/
    public static $dontRevision = ['rating'];

    public static $formatRevision = ['comment'=>'User Comment'];

    /**END REVISIONS**/

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
