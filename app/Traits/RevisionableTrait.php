<?php

namespace App\Traits;

use ReflectionClass;

trait RevisionableTrait {

    public static function bootRevisionableTrait()
    {
        static::created(function ($model) {
            $revision = new \App\Revision();

            $revision->revisionable_type = RevisionableTrait::getRevisionableName($model);
            $revision->revisionable_id = $model[$model->primaryKey];
            $revision->user_id = auth()->id();
            $revision->key = 'created_at';
            $revision->old_value = null;
            $revision->new_value = new \DateTime();

            $revision->save();
        });

        static::updated(function ($model) {
            $changesKeys = array_keys($model->changes);
            $modelName = RevisionableTrait::getRevisionableName($model);
            $modelPrimaryKey = $model[$model->primaryKey];
            $id = auth()->id();

            foreach ($changesKeys as $changeKey){
                if($changeKey === 'updated_at')
                    continue;

                $revision = new \App\Revision();

                $revision->revisionable_type = $modelName;
                $revision->revisionable_id = $modelPrimaryKey;
                $revision->user_id = $id;
                $revision->key = $changeKey;
                $revision->old_value = $model->original[$changeKey];
                $revision->new_value = $model->changes[$changeKey];

                $revision->save();
            }
        });

        static::deleted(function ($model) {
            $revision = new \App\Revision();

            $revision->revisionable_type = RevisionableTrait::getRevisionableName($model);
            $revision->revisionable_id = $model[$model->primaryKey];
            $revision->user_id = auth()->id();
            $revision->key = 'deleted_at';
            $revision->new_value = new \DateTime();

            $revision->save();

            dd($model);
        });
    }

    static function getRevisionableName($model){
        // generic solution
        $reflection = new ReflectionClass($model);
        $reflection->getShortName();

        return $reflection->name;
    }
}