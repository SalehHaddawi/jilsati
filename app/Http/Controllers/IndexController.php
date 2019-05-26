<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(){
        $cities = \App\City::all()->map->name;

        return view('index',compact('cities'));
    }
}
