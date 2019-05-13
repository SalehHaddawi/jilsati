@extends('layouts.layout')

@section('title','جلستي')

@section('body')


<div id="app">
    <jilsati-navbar active="main"></jilsati-navbar>

    <jilsati-city-search :cities="{{json_encode($cities)}}"></jilsati-city-search>

    <div class="alert alert-info text-center m-lg-6 m-xl-8 m-4" role="alert">
        ولا اختار وحدة من العروض اللي تحت
    </div>


</div>
<script src="{{'js/app.js'}}"></script>

@endsection
