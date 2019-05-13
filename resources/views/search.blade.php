@extends('layouts.layout')

@section('title','بحث')

@section('body')

<div id="app">
    <jilsati-navbar></jilsati-navbar>

    <div class="alert alert-success text-center m-lg-6 m-xl-8 m-4" role="alert">
        نتيجة البحث
    </div>

    <div class="row" dir="rtl">
        <div class="col-lg-3 col-md d-none d-lg-block">
            <div class="form-group">
                <jilsati-city-search just-search="true"
                                     :cities="{{json_encode($cities)}}">
                </jilsati-city-search>
            </div>
            <form dir="ltr">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">عائلات</label>
                </div>
            </form>
        </div>

        <div class="rounded-0 shadow-sm bg-light col-lg-9 col-12">
            <div class="row card-columns">
                <jilsati-card v-for="istraha in istrahas"
                              :key="istraha.id"
                              :title="istraha.title"
                              :description="istraha.description"
                              :img-src="istraha.imgSrc"
                              added-at="1997/08/03">
                </jilsati-card>
            </div>
        </div>

    </div>
</div>

<script src="{{'js/app.js'}}"></script>

@endsection