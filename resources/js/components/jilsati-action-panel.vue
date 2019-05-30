<template>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-title mb-5 text-success h2">خيارات</p>
            <div class="text-center">
                <p class=" mb-2 text-info mb-4 h3">اضافة للمفضلة</p>
                <p class=" mb-2 text-muted w-100 h1">
                    <i style="cursor:pointer;" :style="{color : isFavorite ? 'red' : 'gray'}"
                       class="fas fa-heart"
                       @click="onClick">
                    </i></p>
                <p class=" mb-2 text-info mb-4 h3">الابلاغ عن الجلسة</p>
                <p class=" mb-2 text-muted w-100 h1">
                    <i :style="{color: reportColor}"
                        style="cursor: pointer;"
                        class="far fa-flag"
                        @mouseenter="onMouseEnter"
                        @mouseleave="onMouseLeave">
                    </i></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data : function(){
            return {
                isFavorite : false,

                reportColor : 'gray'
            }
        },

        methods : {

            onClick : function () {
                this.isFavorite = !this.isFavorite;
            },

            onMouseEnter : function () {
                this.reportColor = 'red';
            },

            onMouseLeave : function () {
                this.reportColor = 'gray';
            }
        }
    }
</script>