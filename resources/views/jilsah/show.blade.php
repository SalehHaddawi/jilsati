@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('body')
<div class="container">
    <div class="mb-5 jumbotron rounded-0 shadow-sm bg-light row">
        <div class="col-lg-4">

        </div>

        <div class="col-lg-8">
            <div class="row">
                <jilsati-card-show :images="[{'i':1},{'i':2},{'i':3},{'i':4}]"></jilsati-card-show>
            </div>
        </div>
    </div>
</div>

@endsection