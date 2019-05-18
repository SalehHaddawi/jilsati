@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('body')
<div class="container">
    <div class="mb-5 jumbotron rounded-0 shadow-sm bg-light row text-center">
        <jilsati-alert class="mx-auto" type="info">عشرة خطوات سهلة عشان تضيف جلستك/استراحتك</jilsati-alert>


        <jilsati-nav></jilsati-nav>

    </div>
</div>

@endsection