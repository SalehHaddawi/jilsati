<?php

namespace App\Http\Controllers;

use App\Jilsah;
use App\JilsahClientTypes;
use App\JilsahImages;
use App\JilsahLocation;
use App\JilsahOptions;
use App\JilsahPrices;
use App\JilsahSocials;
use App\JilsahTypes;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\Object_;

class JilsahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jilsahs = Jilsah::with(['clientTypes','jilsahTypes','options','location','prices'])
            ->where('jilsahs.user_id','=',\auth()->id())->get();

        return view('jilsah.index',compact('jilsahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jilsah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){

            $validator = Validator::make($request->all(),[
                'name' => 'required|max:255',
                'description' => 'required',
                'times' => 'required|JSON',
                'main_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ],[
                'main_image.required' => 'لم يتم رفع صورة الجلسة الرئيسية'
            ]);

            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors(),
                    'content' => $request->all()
                );


            DB::transaction(function() use ($request) {

                $jilsah = Jilsah::create($request);

                $jilsah->save();

                /**SAVE Jilsah Client Types TO DB**/
                $clients = $request->get('clients');
                for ($i = 0;$i < sizeof($clients);$i++){
                    $jilsahClientTypes = JilsahClientTypes::create($clients[$i],$jilsah);

                    $jilsahClientTypes->save();
                }

                /**SAVE Jilsah Types TO DB**/
                $types = $request->get('types');
                for ($i = 0;$i < sizeof($types);$i++){
                    $jilsahTypes = JilsahTypes::create($types[$i], $jilsah);

                    $jilsahTypes->save();
                }

                /**SAVE Jilsah Options TO DB**/
                $options = $request->get('options');
                if($options) {
                    for ($i = 0; $i < sizeof($options); $i++) {
                        $jilsahOptions = JilsahOptions::create($options[$i],$jilsah);

                        $jilsahOptions->save();
                    }
                }

                /**SAVE Jilsah location TO DB**/
                $locationJSON = json_decode($request->get('location'),true);

                $location = JilsahLocation::create($locationJSON,$jilsah);

                $location->save();

                /**SAVE Jilsah Prices TO DB**/
                $pricesJSON = json_decode($request->get('prices'),true);

                $prices = JilsahPrices::create($pricesJSON,$jilsah);

                $prices->save();

                /**SAVE Jilsah Socials TO DB**/
                $socialsJSON = json_decode($request->get('socials'),true);

                $socials = JilsahSocials::create($socialsJSON, $jilsah);

                $socials->save();

                /**Every thing is OK :) save images**/

                /**GET MAIN IMAGE Jilsah**/
                $main_image = $request->file('main_image');

                /**SAVE main Image to DB**/
                $jilsah->main_image = Storage::disk('public')->putFile('jilsah-images', $main_image);
                $jilsah->save();

                /**GET ALL Jilsah Images**/
                $jilsah_images = $request->file('images');

                /**SAVE Jilsah Images TO DB**/
                if($jilsah_images){
                    for ($i = 0;$i < sizeof($jilsah_images);$i++){
                        $images = JilsahImages::createAndSave($jilsah_images[$i],$jilsah);

                        $images->save();
                    }
                }
            });

            return $request->all();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jilsah  $jilsah
     * @return \Illuminate\Http\Response
     */
    public function show(Jilsah $jilsah)
    {
        $jilsah_show = Jilsah::with(['clientTypes','jilsahTypes','options','location','prices','images','socials'])
            ->where('jilsahs.id','=',$jilsah->id)
            ->first();

        $all_images = $jilsah_show->images->map->src;

        $all_images->prepend($jilsah_show->main_image);

        $time = date("m-d-Y");

        return view('jilsah.show',compact('jilsah_show','all_images','time'));
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
        $cities = \App\City::orderBy('id','ASC')->get(['id','name']);

        return json_encode($cities);
    }
}
