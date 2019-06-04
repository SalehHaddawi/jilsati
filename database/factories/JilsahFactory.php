<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Jilsah;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

$factory->define(Jilsah::class, function (Faker $faker) {

    $files = File::allFiles((database_path('dumb-images')));

    shuffle($files);

    $filePath = uniqid().'.'.$files[0]->getExtension();

    Storage::disk('public')->putFileAs('jilsah-images',new \Illuminate\Http\File($files[0]),$filePath);

    return [
        'name' => $faker->title,
        'description' => $faker->paragraph(mt_rand(3,6),true),
        'main_image' => 'jilsah-images/'.$filePath,
        'times' => '{"eidWeek": {"to": [{"hour": 23, "minute": 0}], "from": [{"hour": 8, "minute": 0}]}, "schoolWeek": {"to": [{"hour": 16, "minute": 0}, {"hour": 16, "minute": 30}, {"hour": 17, "minute": 0}, {"hour": 17, "minute": 30}, {"hour": 23, "minute": 0}], "from": [{"hour": 8, "minute": 0}, {"hour": 16, "minute": 0}, {"hour": 16, "minute": 30}, {"hour": 17, "minute": 0}, {"hour": 17, "minute": 30}]}, "ramadanWeek": {"to": [{"hour": 23, "minute": 0}], "from": [{"hour": 8, "minute": 0}]}, "vacationWeek": {"to": [{"hour": 23, "minute": 0}], "from": [{"hour": 8, "minute": 0}]}, "schoolWeekend": {"to": [{"hour": 23, "minute": 0}], "from": [{"hour": 8, "minute": 0}]}, "vacationWeekend": {"to": [{"hour": 23, "minute": 0}], "from": [{"hour": 8, "minute": 0}]}}',
    ];
});
