@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@section('stylesheets')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@endsection

@section('body')
<div class="container">
    <div dir="rtl" class="mb-5 jumbotron justify-content-center rounded-0 shadow-sm bg-light row">
        <div class="col-8">
            <jilsati-main-panel
                    name="{{$jilsah_show->name}}"
                    city="{{$jilsah_show->location->city->name}}"
                    address="{{$jilsah_show->location->address}}"
                    address-details="{{$jilsah_show->location->address_details}}"
                    :images="{{$all_images}}"
                    description="{{$jilsah_show->description}}">
            </jilsati-main-panel>
        </div>
        <div class="col-lg-4">
            <jilsati-connections-panel
                    phone="{{$jilsah_show->socials->phone}}"
                    instagram="{{$jilsah_show->socials->instagram}}"
                    facebook="{{$jilsah_show->socials->facebook}}"
                    twitter="{{$jilsah_show->socials->twitter}}"
                    snapchat="{{$jilsah_show->socials->snapchat}}">
            </jilsati-connections-panel>

            <jilsati-prices-panel
                    :prices="{{json_encode($jilsah_show->prices)}}">
            </jilsati-prices-panel>

            <jilsati-times-panel
                    :times="{{$jilsah_show->times}}">
            </jilsati-times-panel>

        </div>
    </div>
</div>

@endsection