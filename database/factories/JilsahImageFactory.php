<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

$factory->define(\App\JilsahImage::class, function (Faker $faker) {

    $files = File::allFiles((database_path('dumb-images')));

    shuffle($files);

    $filePath = uniqid().'.'.$files[0]->getExtension();

    Storage::disk('public')->putFileAs('jilsah-images',new \Illuminate\Http\File($files[0]),$filePath);

    return [
        'src' => 'jilsah-images/'.$filePath,
    ];
});
