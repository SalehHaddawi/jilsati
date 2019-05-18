@extends('layouts.layout')

@section('title','جلستي')

@section('active','main')

@section('body')

<div class="container">
    <jilsati-city-search :cities="{{json_encode($cities)}}"></jilsati-city-search>

    <jilsati-alert type="info">
        ولا اختار وحدة من العروض اللي تحت
    </jilsati-alert>
</div>

@endsection
