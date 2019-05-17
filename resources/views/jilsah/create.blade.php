@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('body')

    <jilsati-navbar logo-src="{{asset('images/jilsati-logo.png')}}" token="{{csrf_token()}}"></jilsati-navbar>

@endsection