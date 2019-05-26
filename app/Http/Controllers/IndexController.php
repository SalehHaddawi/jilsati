<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(){
        $cities = \App\City::all()->map->name;

        $test = asset('storage/jilsah-images/30N9Dj56VZmwrM9guDnbPEhGzzd1YbUEiFjNX3LS.jpeg');

        return view('index',compact('cities','test'));
    }
}
