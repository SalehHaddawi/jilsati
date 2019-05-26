@extends('layouts.layout')

@section('title','جلستي')

@section('active','main')

@section('body')
<div class="container" dir="rtl">
    <div class="jumbotron bg-light shadow-sm">
        <form method="get" action="{{route('search')}}">
            <div class="input-group mb-3">
                <jilsati-select class="form-row" name="city" options-label="اختار المدينة..." :options="{{json_encode($cities)}}"></jilsati-select>

                <div class="input-group-prepend rounded-0">
                    <button class="btn btn-success" type="submit" id="button-addon1">ابحث</button>
                </div>
            </div>
        </form>

        <jilsati-alert type="info">
            ولا اختار وحدة من العروض اللي تحت
        </jilsati-alert>
    </div>
</div>

@endsection
