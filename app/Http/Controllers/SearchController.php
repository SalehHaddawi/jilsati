<?php

namespace App\Http\Controllers;

use App\City;
use App\Jilsah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Input::get('city',null) == null){
            return redirect('/');
        }

        $cities = City::all();

        $jilsahs = Jilsah::with(['clientTypes','jilsahTypes','options','location','prices'])
            ->get();

        return view('search',compact('cities','jilsahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
