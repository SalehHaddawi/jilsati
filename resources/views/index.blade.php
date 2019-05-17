@extends('layouts.layout')

@section('title','جلستي')

@section('body')


<jilsati-navbar :user="{{json_encode(Auth::user())}}" active="main" logo-src="{{asset('images/jilsati-logo.png')}}" token="{{csrf_token()}}"></jilsati-navbar>

<div class="container">
    <jilsati-city-search :cities="{{json_encode($cities)}}"></jilsati-city-search>

    <jilsati-alert type="info">
        ولا اختار وحدة من العروض اللي تحت
    </jilsati-alert>
</div>

@endsection
