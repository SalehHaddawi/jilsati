<?php

use App\City;
use App\JilsahClientTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->citiesSeeder();

        factory(App\User::class, 10)->create()->each(function ($user){
            for ($i = 0; $i < 10;$i++) {
                $jilsah = $user->jilsahs()->save(factory(App\Jilsah::class)->make());

                $jilsah->clientTypes()->save(factory(App\JilsahClientTypes::class)->make());

                $jilsah->jilsahTypes()->save(factory(App\JilsahTypes::class)->make());

                $jilsah->options()->save(factory(App\JilsahOptions::class)->make());

                $jilsah->location()->save(factory(App\JilsahLocation::class)->make());

                $jilsah->socials()->save(factory(App\JilsahSocials::class)->make());

                $jilsah->prices()->save(factory(App\JilsahPrices::class)->make());

                $jilsah->ratings()->save(factory(App\JilsahRating::class)->make(['user_id'=>$user->id]));
            }
        });
    }

    function citiesSeeder(){
        City::unguard();

        $path = database_path('cities.sql');

        DB::unprepared(file_get_contents($path));
    }
}
