<?php

use App\City;
use App\JilsahPrices;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('jilsah-images');

        $files = File::allFiles((database_path('dumb-images')));

        $this->citiesSeeder();

        factory(App\User::class, mt_rand(10,25))->create()->each(function ($user) use ($files){
            $jilsahRand = mt_rand(0,10);

            for ($i = 0; $i < $jilsahRand;$i++) {

                $jilsah = $user->jilsahs()->save(factory(App\Jilsah::class)->make());

                $jilsah->clientTypes()->save(factory(App\JilsahClientTypes::class)->make());

                $jilsah->jilsahTypes()->save(factory(App\JilsahTypes::class)->make());

                $jilsah->options()->save(factory(App\JilsahOptions::class)->make());

                $jilsah->location()->save(factory(App\JilsahLocation::class)->make());

                $jilsah->socials()->save(factory(App\JilsahSocials::class)->make());

                $jilsah->prices()->save(factory(App\JilsahPrices::class)->make());

                $imgs = mt_rand(0,sizeof($files));

                for ($j = 0; $j < $imgs && $j < 20; $j++){
                    $jilsah->images()->save(factory(App\JilsahImage::class)->make());
                }
            }
        });

        User::all()->each(function ($user){
            \App\Jilsah::all()->each(function ($jilsah) use ($user) {
                $rate = mt_rand(1,3);
                if($rate == 1 && $user->id != $jilsah->user_id){
                    $user->ratings()->save(factory(App\JilsahRating::class)->make(['jilsah_id'=>$jilsah->id]));
                }
            });
        });
    }

    function citiesSeeder(){
        City::unguard();

        $path = database_path('sql\cities.sql');

        DB::unprepared(file_get_contents($path));
    }
}
