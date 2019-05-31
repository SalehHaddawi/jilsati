@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@section('stylesheets')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@endsection

@section('body')
<div class="container">
    <div dir="rtl" class="mb-5 justify-content-center rounded-0 bg-light row">

        <!---------- RIGHT SIDE ----------->
        <div class="col-lg-8 col-12">
            <jilsati-main-panel
                    name="{{$jilsah_show->name}}"
                    city="{{$jilsah_show->location->city->name}}"
                    address="{{$jilsah_show->location->address}}"
                    address-details="{{$jilsah_show->location->address_details}}"
                    :images="{{$all_images}}">
            </jilsati-main-panel>

            <jilsati-jilsah-details-tabs
                    description="{{$jilsah_show->description}}"
                    :client-types="{{$jilsah_show->clientTypes->map->name}}"
                    :jilsah-types="{{$jilsah_show->jilsahTypes->map->name}}"
                    :options="{{$jilsah_show->options->map->name}}"
                    :prices="{{$jilsah_show->prices}}"
                    :times="{{$jilsah_show->times}}"
                    :location="{{$jilsah_show->location}}">
            </jilsati-jilsah-details-tabs>

            <jilsati-comments-panel
                    :ratings="{{$jilsah_show->ratings}}"
                    :user="{{auth()->user()?auth()->user():'undefined'}}"
                    :jilsah="{{$jilsah_show}}">
            </jilsati-comments-panel>
        </div>

        <!---------- LEFT SIDE ----------->
        <div class="col-lg-4 col-12">
            <jilsati-connections-panel
                    phone="{{$jilsah_show->socials->phone}}"
                    instagram="{{$jilsah_show->socials->instagram}}"
                    facebook="{{$jilsah_show->socials->facebook}}"
                    twitter="{{$jilsah_show->socials->twitter}}"
                    snapchat="{{$jilsah_show->socials->snapchat}}">
            </jilsati-connections-panel>

            <jilsati-current-price-panel
                    :prices="{{json_encode($jilsah_show->prices)}}"
                    time="{{$time}}">
            </jilsati-current-price-panel>

            <jilsati-current-time-panel
                    :times="{{$jilsah_show->times}}"
                    time="{{$time}}">
            </jilsati-current-time-panel>

            <jilsati-action-panel></jilsati-action-panel>

        </div>
    </div>
</div>

@endsection

@section('scripts-before')
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/moment-hijri.js')}}"></script>
@endsection