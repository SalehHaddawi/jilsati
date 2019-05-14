@extends('layouts.layout')

@section('title','بحث')

@section('body')

<div id="app">
    <jilsati-navbar></jilsati-navbar>

    <div class="alert alert-success text-center m-lg-6 m-xl-8 m-4" role="alert">
        نتيجة البحث
    </div>

    <div class="row" dir="rtl">
        <div class="col-lg-3">
            <form method="get" action="/search">
                <div class="accordion shadow text-right mb-2" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <jilsati-city-search just-search="true"
                                                 current="{{\Illuminate\Support\Facades\Input::get('city')}}"
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
                                <div>
                                    <jilsati-checkbox name="families">عائلات</jilsati-checkbox>
                                    <jilsati-checkbox name="guys">شباب</jilsati-checkbox>
                                    <jilsati-checkbox name="pool">مسبح</jilsati-checkbox>
                                    <jilsati-checkbox name="women-pool">مسبح نساء</jilsati-checkbox>
                                    <jilsati-checkbox name="playground">ملعب</jilsati-checkbox>
                                    <jilsati-checkbox name="women-section">قسم نساء منفصل</jilsati-checkbox>
                                    <jilsati-checkbox name="tv">تلفزيون</jilsati-checkbox>
                                    <jilsati-checkbox name="wifi">واي فاي</jilsati-checkbox>
                                    <jilsati-checkbox name="garden">حديقة</jilsati-checkbox>
                                    <jilsati-checkbox name="air-condition">مكيفة</jilsati-checkbox>
                                    <jilsati-checkbox name="celebrations">مناسبات</jilsati-checkbox>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="ابحث مرة ثانية" class="btn btn-success input-group-append rounded-0">
                    </div>
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