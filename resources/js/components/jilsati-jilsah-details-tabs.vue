<template functional>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-title mb-5 text-success h2">عن الجلسة</p>
            <ul class="nav nav-tabs" role="tablist" style="padding-inline-start:0;">
                <li class="nav-item">
                    <a class="nav-link bg-white shadow-sm active" id="description-tap" data-toggle="tab" href="#description" role="tab" aria-controls="description-tap" aria-selected="true">الوصف</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-white shadow-sm" id="properties-tap" data-toggle="tab" href="#properties" role="tab" aria-controls="properties-tap" aria-selected="false">المميزات</a>
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
                <div class="tab-pane fade show active text-justify text-muted card" id="description" role="tabpanel" aria-labelledby="description-tap">
                   <div class="card-body shadow-sm">
                       {{props.description}}
                   </div>
                </div>
                <div class="tab-pane fade" id="properties" role="tabpanel" aria-labelledby="properties-tap">
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
                <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                    <jilsati-location-panel
                            :location="props.location">
                    </jilsati-location-panel>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            description : '',

            clientTypes : '',

            jilsahTypes : '',

            options : '',

            prices : '',

            times : '',

            location : ''
        }
    }
</script>