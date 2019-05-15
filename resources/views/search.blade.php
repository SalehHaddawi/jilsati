@extends('layouts.layout')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('title','بحث')

@section('body')

<div id="app">
    <jilsati-navbar></jilsati-navbar>

    <jilsati-alert type="success">نتيجة البحث</jilsati-alert>

    <div class="row" dir="rtl">
        <div class="col-lg-3">
            <form method="get" action="/search">
                <div class="accordion shadow text-right mb-2" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <jilsati-city-search just-search="true"
                                                 current="{{$input::get('city')}}"
                                                 :cities="{{json_encode($cities)}}"
                                                 class="rounded-0">
                            </jilsati-city-search>
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    بحث متقدم...
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <jilsati-istraha-props :properties="{{ json_encode($input::all()) }}"></jilsati-istraha-props>
                            </div>
                        </div>
                        <input type="submit" value="ابحث مرة ثانية" class="btn btn-success input-group-append rounded-0">
                    </div>
                </div>
            </form>
        </div>

        <div class="rounded-0 shadow bg-light col-lg-9 col-12">
            <div class="row card-columns">
                <jilsati-card v-for="istraha in istrahas"
                              :key="istraha.id"
                              :title="istraha.title"
                              :description="istraha.description"
                              :img-src="istraha.imgSrc"
                              :city="istraha.city"
                              added-at="1997/08/03">
                </jilsati-card>
            </div>
        </div>
    </div>
</div>

<script src="{{'js/app.js'}}"></script>

@endsection