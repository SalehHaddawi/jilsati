<template functional>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-title mb-5 text-success h2">عن الجلسة</p>
            <ul class="nav nav-tabs" role="tablist" style="padding-inline-start:0;">
                <li class="nav-item">
                    <a class="nav-link bg-white shadow-sm active" id="properties-tap" data-toggle="tab" href="#properties" role="tab" aria-controls="properties-tap" aria-selected="true">المميزات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-white shadow-sm" id="prices-tap" data-toggle="tab" href="#prices" role="tab" aria-controls="prices-tap" aria-selected="false">الاسعار</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-white shadow-sm" id="times-tap" data-toggle="tab" href="#times" role="tab" aria-controls="times-tap" aria-selected="false">الدوام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-white shadow-sm" id="location-tap" data-toggle="tab" href="#location" role="tab" aria-controls="location-tap" aria-selected="false">الموقع</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="properties" role="tabpanel" aria-labelledby="properties-tap">
                    <jilsati-properties-panel
                            :client-types="props.clientTypes"
                            :jilsah-types="props.jilsahTypes"
                            :options="options">
                    </jilsati-properties-panel>
                </div>
                <div class="tab-pane fade" id="prices" role="tabpanel" aria-labelledby="prices-tab">
                    <jilsati-prices-panel
                            :prices="props.prices">
                    </jilsati-prices-panel>
                </div>
                <div class="tab-pane fade" id="times" role="tabpanel" aria-labelledby="times-tab">
                    <jilsati-times-panel
                            :times="props.times">
                    </jilsati-times-panel>
                </div>
                <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="times-tab">
                    <div class="card shadow-sm mb-3 rounded-0">
                        <div class="card-body">
                            <p class="card-subtitle mb-3 text-info h3">{{props.location.city.name}}</p>
                            <p class="card-subtitle mb-3 text-muted h5">{{props.location.address}}</p>
                            <p class="card-subtitle mb-3 text-muted h6">{{props.location.address_details}}</p>
                            <div class="h1 text-center mt-5">
                                <div v-if="props.location.google_map_url">
                                    <p class="card-subtitle mb-3 text-info mb-5 h6">اضغط علة الايقونة للانتقال الى موقع الجلسة في قوقل ماب</p>
                                    <a :href="props.location.google_map_url">
                                        <i class="fas fa-map-marked-alt mb-4" style="color: mediumseagreen;transform: scale(2);"></i>
                                    </a>
                                </div>

                                <p v-else class="card-subtitle mb-3 text-info mb-5 h6">لم يتم ارفاق رابط الجلسة في قوقل ماب</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            clientTypes : '',

            jilsahTypes : '',

            options : '',

            prices : '',

            times : '',

            location : ''
        }
    }
</script>