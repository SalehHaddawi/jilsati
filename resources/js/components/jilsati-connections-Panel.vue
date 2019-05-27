<template>
    <div class="card text-right rounded-0 mb-4 shadow-sm">
        <div class="card-body">
            <p class="card-title text-success mb-4 h1">التواصل</p>
            <p class=" mb-2 text-muted h6">رقم الجوال</p>
            <p class=" mb-2 text-info mb-4 h1">{{phone}}</p>
            <p class=" mb-2 text-muted h6">حسابات التواصل</p>
            <div class="mt-4 h2 row">

                <a v-if="instagram" :href="instagram" target="_blank" class="text-center" :class="'col-'+(12/socialsCount)" style="color: lightcoral;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a v-if="facebook" :href="facebook" target="_blank" class="text-center" :class="'col-'+(12/socialsCount)">
                    <i class="fab fa-facebook" style="color: cornflowerblue;"></i>
                </a>
                <a v-if="twitter" :href="twitter" target="_blank" class="text-center" :class="'col-'+(12/socialsCount)" style="color: #2AA9E0;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a v-if="snapchat" :href="snapchat" target="_blank" class="text-center" :class="'col-'+(12/socialsCount)" style="color: gold;">
                    <i class="fab fa-snapchat"></i>
                </a>

                <h6 v-if="socialsCount === 0" class="text-muted text-center col-12">(لا توجد)</h6>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['phone','instagram','facebook','twitter','snapchat'],

        computed :{
            socialsCount : function () {
                let count = 0;

                if(this.instagram)
                    count++;
                if(this.facebook)
                    count++;
                if(this.twitter)
                    count++;
                if(this.snapchat)
                    count++;

                return count;
            }
        }
    }
</script>