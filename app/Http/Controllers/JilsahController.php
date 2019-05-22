<?php

namespace App\Http\Controllers;

use App\Jilsah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JilsahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heavy = true;
        return view('jilsah.create',compact('heavy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jilsah  $jilsah
     * @return \Illuminate\Http\Response
     */
    public function show(Jilsah $jilsah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jilsah  $jilsah
     * @return \Illuminate\Http\Response
     */
    public function edit(Jilsah $jilsah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jilsah  $jilsah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jilsah $jilsah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jilsah  $jilsah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jilsah $jilsah)
    {
        //
    }

    public function getCities(){
        $cities = \App\City::all()->map->name;

        return json_encode($cities);
    }
}
