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
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\Object_;

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
                'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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

                $jilsah = new Jilsah();
                $jilsah->user_id = auth()->id();
                $jilsah->name = $request->get('name');
                $jilsah->description = $request->get('description');
                $jilsah->times = $request->get('times');
                $jilsah->main_image = '';

                $jilsah->save();

                /**SAVE Jilsah Client Types TO DB**/
                $clients = $request->get('clients');
                for ($i = 0;$i < sizeof($clients);$i++){
                    $instance = new JilsahClientTypes();
                    $instance->jilsah_id = $jilsah->id;
                    $instance->name = $clients[$i];
                    $instance->save();
                }

                /**SAVE Jilsah Types TO DB**/
                $types = $request->get('types');
                for ($i = 0;$i < sizeof($types);$i++){
                    $instance = new JilsahTypes();
                    $instance->jilsah_id = $jilsah->id;
                    $instance->name = $types[$i];
                    $instance->save();
                }

                /**SAVE Jilsah Options TO DB**/
                $options = $request->get('options');
                if($options) {
                    for ($i = 0; $i < sizeof($options); $i++) {
                        $instance = new JilsahOptions();
                        $instance->jilsah_id = $jilsah->id;
                        $instance->name = $options[$i];
                        $instance->save();
                    }
                }

                /**SAVE Jilsah location TO DB**/
                $locationJSON = json_decode($request->get('location'),true);

                $location = new JilsahLocation();
                $location->jilsah_id = $jilsah->id;
                $location->city_id = $locationJSON['cityId'];
                $location->address = $locationJSON['address'];
                $location->address_details = $locationJSON['addressDetails'];
                $location->google_map_url = $locationJSON['googleMapUrl'];

                $location->save();

                /**SAVE Jilsah Prices TO DB**/
                $pricesJSON = json_decode($request->get('prices'),true);

                $prices = new JilsahPrices();
                $prices->jilsah_id = $jilsah->id;
                $prices->price_per_jilsah = $pricesJSON['pricePerJilsah'];
                $prices->school_week = $pricesJSON['schoolWeek'];
                $prices->school_weekend = $pricesJSON['schoolWeekend'];
                $prices->vacation_week = $pricesJSON['vacationWeek'];
                $prices->vacation_weekend = $pricesJSON['vacationWeekend'];
                $prices->eid = $pricesJSON['eid'];
                $prices->ramadan = $pricesJSON['ramadan'];

                $prices->save();

                /**SAVE Jilsah Socials TO DB**/
                $socialsJSON = json_decode($request->get('socials'),true);

                $socials = new JilsahSocials();
                $socials->jilsah_id = $jilsah->id;
                $socials->phone = $socialsJSON['phone'];
                $socials->instagram = $socialsJSON['instagram'];
                $socials->facebook = $socialsJSON['facebook'];
                $socials->twitter = $socialsJSON['twitter'];
                $socials->snapchat = $socialsJSON['snapchat'];

                $socials->save();

                /**Every thing is OK :) save images**/

                /**GET MAIN IMAGE Jilsah**/
                $main_image = $request->file('main_image');

                /**GET ALL Jilsah Images**/
                $jilsah_images = $request->file('images');

                /**SAVE main Image to DB**/
                $jilsah->main_image = Storage::putFile('jilsah-images', $main_image);
                $jilsah->save();

                /**SAVE Jilsah Images TO DB**/
                for ($i = 0;$i < sizeof($jilsah_images);$i++){
                    $images[$i] = new JilsahImages();
                    $images[$i]->jilsah_id = $jilsah->id;
                    $images[$i]->src = Storage::putFile('jilsah-images',$jilsah_images[$i]);
                    $images[$i]->save();
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
        $cities = \App\City::orderBy('id','ASC')->get(['id','name']);

        return json_encode($cities);
    }

    function saveImage(Array $images){
        $resultNames = [];
        for ($i = 0;$i < sizeof($images);$i++){
            $extension = $images[$i]->getClientOriginalExtension();
            $dir = asset('storage/');
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $images[$i]->move($dir, $filename);

            $resultNames[$i] = $filename;
        }

        return $resultNames;
    }

    function saveOneImage(UploadedFile $image){
        $extension = $image->getClientOriginalExtension();
        $dir = 'uploads/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $image->move($dir, $filename);

        return $filename;
    }
}
