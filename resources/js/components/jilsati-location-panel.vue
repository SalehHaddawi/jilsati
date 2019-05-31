<template functional>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-subtitle mb-3 text-info h3">{{props.location.city.name}}</p>
            <p class="card-subtitle mb-3 text-muted h5">{{props.location.address}}</p>
            <p class="card-subtitle mb-3 text-muted h6">{{props.location.address_details}}</p>
            <div class="h1 text-center mt-5">
                <div v-if="props.location.google_map_url">
                    <p class="card-subtitle mb-3 text-info mb-5 h6">اضغط على الايقونة للانتقال الى موقع الجلسة في قوقل ماب</p>
                    <a :href="props.location.google_map_url" target="_blank">
                        <i class="fas fa-map-marked-alt mb-4" style="color: mediumseagreen;transform: scale(2);"></i>
                    </a>
                </div>

                <p v-else class="card-subtitle mb-3 text-info mb-5 h6">لم يتم ارفاق رابط الجلسة في قوقل ماب</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            location : {
                required : true,
                type : Object
            }
        }
    }
</script>