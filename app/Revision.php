<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    public $table = 'revisions';

    public static function create($key){
        $revision = new \App\Revision();

        $revision->revisionable_type = 'NONE';
        $revision->revisionable_id = -1;
        $revision->user_id = auth()->id();
        $revision->key = $key;
        $revision->old_value = null;
        $revision->new_value = null;

        $revision->save();
    }
}
