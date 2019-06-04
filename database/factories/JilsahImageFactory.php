<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

$factory->define(\App\JilsahImage::class, function (Faker $faker) {
    return [
        'src' => Storage::disk('public')->putFile('jilsah-images', UploadedFile::fake()->image('test'.time().'.png'),480,520),
    ];
});
