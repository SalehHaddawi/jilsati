@extends('layouts.layout')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('title','بحث')

@section('body')

@if(sizeof($jilsahs) > 0)
    <jilsati-alert type="success text-center">نتيجة البحث</jilsati-alert>
@else
    <jilsati-alert type="warning text-center">لا يوجد اي جلسات مسجلة في هذه المدينة</jilsati-alert>
@endif
<!-- Floating action button visible on mobile only -->
<div dir="rtl" class="fixed-bottom text-right m-4 d-md-block d-lg-none">
    <button class="btn btn-success rounded-circle shadow px-4 py-3" data-toggle="modal" data-target="#exampleModalCenter">
        <img src="{{asset('svg/filter-filled-tool-symbol.svg')}}" alt="filter icon" width="15"/>
    </button>
</div>

<div class="row mb-5" dir="rtl">
    <div class="col-lg-3 col-0 d-lg-block d-md-none d-sm-none d-none">
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

    <div class="rounded-0 bg-light col-lg-9 col-12">
        @foreach($jilsahs as $jilsah)
            <jilsati-card-show :jilsah-id="{{$jilsah->id}}"
                                title="{{$jilsah->name}}"
                                description="{{$jilsah->description}}"
                                city="{{$jilsah->location->city->name}}"
                                address="{{$jilsah->location->address}}"
                                img-src="{{asset('storage/'.$jilsah->main_image)}}"
                                :max-description-length="180"
                                :clients="{{json_encode($jilsah->clientTypes->map->name)}}"
                                :types="{{json_encode($jilsah->jilsahTypes->map->name)}}"
                                :options="{{json_encode($jilsah->options->map->name)}}"
                                :rating="{{$jilsah->ratingsAVGs->first()?$jilsah->ratingsAVGs->first()->ratingsAVG : 0}}"
                                :ratings-count="{{$jilsah->ratingsCount->first()?$jilsah->ratingsCount->first()->count:0}}"
                                price="20"
                                price-per-jilsah="{{$jilsah->prices->price_per_jilsah}}">
            </jilsati-card-show>
        @endforeach
            @foreach($jilsahs as $jilsah)
                <jilsati-card-show :jilsah-id="{{$jilsah->id}}"
                                   title="{{$jilsah->name}}"
                                   description="{{$jilsah->description}}"
                                   city="{{$jilsah->location->city->name}}"
                                   address="{{$jilsah->location->address}}"
                                   img-src="{{asset('storage/'.$jilsah->main_image)}}"
                                   :max-description-length="180"
                                   :clients="{{json_encode($jilsah->clientTypes->map->name)}}"
                                   :types="{{json_encode($jilsah->jilsahTypes->map->name)}}"
                                   :options="{{json_encode($jilsah->options->map->name)}}"
                                   :rating="{{$jilsah->ratingsAVGs->first()?$jilsah->ratingsAVGs->first()->ratingsAVG : 0}}"
                                   :ratings-count="{{$jilsah->ratingsCount->first()?$jilsah->ratingsCount->first()->count:0}}"
                                   price="20"
                                   price-per-jilsah="{{$jilsah->prices->price_per_jilsah}}">
                </jilsati-card-show>
            @endforeach
            @foreach($jilsahs as $jilsah)
                <jilsati-card-show :jilsah-id="{{$jilsah->id}}"
                                   title="{{$jilsah->name}}"
                                   description="{{$jilsah->description}}"
                                   city="{{$jilsah->location->city->name}}"
                                   address="{{$jilsah->location->address}}"
                                   img-src="{{asset('storage/'.$jilsah->main_image)}}"
                                   :max-description-length="180"
                                   :clients="{{json_encode($jilsah->clientTypes->map->name)}}"
                                   :types="{{json_encode($jilsah->jilsahTypes->map->name)}}"
                                   :options="{{json_encode($jilsah->options->map->name)}}"
                                   :rating="{{$jilsah->ratingsAVGs->first()?$jilsah->ratingsAVGs->first()->ratingsAVG : 0}}"
                                   :ratings-count="{{$jilsah->ratingsCount->first()?$jilsah->ratingsCount->first()->count:0}}"
                                   price="20"
                                   price-per-jilsah="{{$jilsah->prices->price_per_jilsah}}">
                </jilsati-card-show>
            @endforeach
            @foreach($jilsahs as $jilsah)
                <jilsati-card-show :jilsah-id="{{$jilsah->id}}"
                                   title="{{$jilsah->name}}"
                                   description="{{$jilsah->description}}"
                                   city="{{$jilsah->location->city->name}}"
                                   address="{{$jilsah->location->address}}"
                                   img-src="{{asset('storage/'.$jilsah->main_image)}}"
                                   :max-description-length="180"
                                   :clients="{{json_encode($jilsah->clientTypes->map->name)}}"
                                   :types="{{json_encode($jilsah->jilsahTypes->map->name)}}"
                                   :options="{{json_encode($jilsah->options->map->name)}}"
                                   :rating="{{$jilsah->ratingsAVGs->first()?$jilsah->ratingsAVGs->first()->ratingsAVG : 0}}"
                                   :ratings-count="{{$jilsah->ratingsCount->first()?$jilsah->ratingsCount->first()->count:0}}"
                                   price="20"
                                   price-per-jilsah="{{$jilsah->prices->price_per_jilsah}}">
                </jilsati-card-show>
            @endforeach
            @foreach($jilsahs as $jilsah)
                <jilsati-card-show :jilsah-id="{{$jilsah->id}}"
                                   title="{{$jilsah->name}}"
                                   description="{{$jilsah->description}}"
                                   city="{{$jilsah->location->city->name}}"
                                   address="{{$jilsah->location->address}}"
                                   img-src="{{asset('storage/'.$jilsah->main_image)}}"
                                   :max-description-length="180"
                                   :clients="{{json_encode($jilsah->clientTypes->map->name)}}"
                                   :types="{{json_encode($jilsah->jilsahTypes->map->name)}}"
                                   :options="{{json_encode($jilsah->options->map->name)}}"
                                   :rating="{{$jilsah->ratingsAVGs->first()?$jilsah->ratingsAVGs->first()->ratingsAVG : 0}}"
                                   :ratings-count="{{$jilsah->ratingsCount->first()?$jilsah->ratingsCount->first()->count:0}}"
                                   price="20"
                                   price-per-jilsah="{{$jilsah->prices->price_per_jilsah}}">
                </jilsati-card-show>
            @endforeach
    </div>
</div>

@if(sizeof($jilsahs) / 10 >= 1)
    <jilsati-pagination :pages="parseInt({{sizeof($jilsahs)}}/10)"></jilsati-pagination>
@endif

@endsection

@section('scripts-before')
    <script src="https://polyfill.io/v2/polyfill.js?features=IntersectionObserver"></script>
@endsection