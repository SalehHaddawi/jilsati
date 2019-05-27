@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@section('stylesheets')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@endsection

@section('body')
<div class="container">
    <div dir="rtl" class="mb-5 jumbotron justify-content-center rounded-0 shadow-sm bg-light row">

        <!---------- RIGHT SIDE ----------->
        <div class="col-8">
            <jilsati-main-panel
                    name="{{$jilsah_show->name}}"
                    city="{{$jilsah_show->location->city->name}}"
                    address="{{$jilsah_show->location->address}}"
                    address-details="{{$jilsah_show->location->address_details}}"
                    :images="{{$all_images}}"
                    description="{{$jilsah_show->description}}">
            </jilsati-main-panel>

{{--            <jilsati-properties-panel--}}
{{--                    :client-types="{{$jilsah_show->clientTypes->map->name}}"--}}
{{--                    :jilsah-types="{{$jilsah_show->jilsahTypes->map->name}}"--}}
{{--                    :options="{{$jilsah_show->options->map->name}}">--}}
{{--            </jilsati-properties-panel>--}}

            <div class="card shadow-sm mb-3 rounded-0">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-inline-start:0;">
                        <li class="nav-item">
                            <a class="nav-link bg-white shadow-sm active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">المميزات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white shadow-sm" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">الاسعار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white shadow-sm" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">الدوام</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <jilsati-properties-panel
                                    :client-types="{{$jilsah_show->clientTypes->map->name}}"
                                    :jilsah-types="{{$jilsah_show->jilsahTypes->map->name}}"
                                    :options="{{$jilsah_show->options->map->name}}">
                            </jilsati-properties-panel>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <jilsati-prices-panel
                                    :prices="{{json_encode($jilsah_show->prices)}}">
                            </jilsati-prices-panel>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <jilsati-times-panel
                                    :times="{{$jilsah_show->times}}">
                            </jilsati-times-panel>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---------- LEFT SIDE ----------->
        <div class="col-lg-4">
            <jilsati-connections-panel
                    phone="{{$jilsah_show->socials->phone}}"
                    instagram="{{$jilsah_show->socials->instagram}}"
                    facebook="{{$jilsah_show->socials->facebook}}"
                    twitter="{{$jilsah_show->socials->twitter}}"
                    snapchat="{{$jilsah_show->socials->snapchat}}">
            </jilsati-connections-panel>

            <jilsati-current-price-panel :prices="{{json_encode($jilsah_show->prices)}}">

            </jilsati-current-price-panel>

            <div class="card shadow-sm mb-3 rounded-0">
                <div class="card-body">
                    <p class="card-title mb-5 text-success h2">الدوام الحالي</p>
                    <p class=" mb-2 text-info mb-4 h1">فترة رمضان</p>
                    <p class=" mb-2 text-muted h6">خلال الاسبوع</p>
                    <div class="mt-4">
                        <div>
                            <span class="badge badge-success badge-pill float-right">08:00 AM</span>
                            <span class="badge badge-success badge-pill float-left">11:00 PM</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

{{--            <jilsati-prices-panel--}}
{{--                    :prices="{{json_encode($jilsah_show->prices)}}">--}}
{{--            </jilsati-prices-panel>--}}

{{--            <jilsati-times-panel--}}
{{--                    :times="{{$jilsah_show->times}}">--}}
{{--            </jilsati-times-panel>--}}

        </div>
    </div>
</div>

@endsection

@section('scripts-before')
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/moment-hijri.js')}}"></script>
@endsection