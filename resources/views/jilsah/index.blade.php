@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@inject('storage', '\Illuminate\Support\Facades\Storage')

@section('body')
    <div dir="rtl" class="container">
        <div class="mb-5 jumbotron rounded-0 shadow-sm bg-light row">
            @foreach($jilsahs as $jilsah)
                <jilsati-card-show :jilsah-id="{{$jilsah->id}}"
                                   title="{{$jilsah->name}}"
                                   description="{{$jilsah->description}}"
                                   city="{{$jilsah->location->city->name}}"
                                   address="{{$jilsah->location->address}}"
                                   img-src="{{asset('storage/'.$jilsah->main_image)}}"
                                   :max-description-length="180"
                                   :clients="{{json_encode($jilsah->clientTypes->map->name)}}"
                                   :types="{{json_encode($jilsah->jilsahTypes->map->name)}}"
                                   :options="{{json_encode($jilsah->options->map->name)}}"
                                   :rating="{{$jilsah->ratingsAVGs->first()?$jilsah->ratingsAVGs->first()->ratingsAVG : 0}}"
                                   :ratings-count="{{$jilsah->ratingsCount->first()?$jilsah->ratingsCount->first()->count:0}}"
                                   price="20"
                                   price-per-jilsah="{{$jilsah->prices->price_per_jilsah}}">
                </jilsati-card-show>
            @endforeach
        </div>
    </div>

@endsection