<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('about');
    }

    public function test(){
        $city = \App\City::find(47);

        $city->name = str_random();

        $city->delete();
        /*$city = new \App\City();
        $city->name = str_random();
        $city->save();*/
    }
}
