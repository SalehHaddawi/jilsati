@extends('layouts.layout')

@section('title','جلستي: اضيف جلستك')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('body')
<div dir="rtl" class="container">
    <div class="mb-5 jumbotron rounded-0 shadow-sm bg-light">
        <jilsati-alert class="mx-auto" type="info">عشرة خطوات سهلة عشان تضيف جلستك</jilsati-alert>

        <div class="mt-5">
            <form>
                <jilsati-stepper></jilsati-stepper>
            </form>
        </div>
    </div>
</div>

@endsection