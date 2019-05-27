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
        }
    }
</script>