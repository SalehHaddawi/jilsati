@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@section('stylesheets')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@endsection

@section('body')
<div class="container">
    <div dir="rtl" class="mb-5 jumbotron justify-content-center rounded-0 shadow-sm bg-light row">

        <div class="col-8">
            <div class="card mb-3 shadow-sm">
                <div class="card-body text-right">
                    <p class="card-title text-success h2">{{$jilsah->name}}</p>
                    <p class="card-text text-secondary h5">{{$jilsah->location->city->name}} , {{$jilsah->location->address}}</p>
                    <p class="card-text">
                        <small class="text-muted">{{$jilsah->location->address_details}}</small>
                    </p>
                </div>
                <jilsati-carousel class="card-img-top" name="images-carousel" :images="{{json_encode($all_images)}}">

                </jilsati-carousel>
                <div class="card-body text-right">
                    <h5 class="card-title">الوصف</h5>
                    <p style="direction: rtl;" class="card-text text-justify text-muted mt-4">{{$jilsah->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <jilsati-connect-panel phone="{{$jilsah->socials->phone}}"
                                   instagram="{{$jilsah->socials->instagram}}"
                                   facebook="{{$jilsah->socials->facebook}}"
                                   twitter="{{$jilsah->socials->twitter}}"
                                   snapchat="{{$jilsah->socials->snapchat}}">
            </jilsati-connect-panel>

            <jilsati-prices-panel :prices="{{json_encode($jilsah->prices)}}">

            </jilsati-prices-panel>

        </div>
    </div>
</div>

@endsection