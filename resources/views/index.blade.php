@extends('layouts.layout')

@section('title','جلستي')

@section('body')


<div id="app">
    <jilsati-navbar active="main"></jilsati-navbar>

    <div class="container">
        <jilsati-city-search :cities="{{json_encode($cities)}}"></jilsati-city-search>

        <jilsati-alert type="info">
            ولا اختار وحدة من العروض اللي تحت
        </jilsati-alert>
    </div>

</div>
<script src="{{'js/app.js'}}"></script>

@endsection
