<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller
{
    public function index(){
        $cities = DB::table('cities')->select('*')->get();

        return view('index',compact('cities'));
    }
}
