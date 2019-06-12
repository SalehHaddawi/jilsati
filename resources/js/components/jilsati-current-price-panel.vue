<template>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-title mb-5 text-success h2">السعر الحالي</p>
            <p class="text-info" style="position: absolute; top: 35px; left: 20px;">(للشخص)</p>
            <p class=" mb-2 text-info mb-4 h3">{{timePeriodText}}</p>
            <p class=" mb-2 text-muted h6">{{weekPeriodText}}</p>
            <p class=" mb-2 text-muted h6">لكل ساعة</p>
            <p class=" mb-2 text-info mb-4" :class="currentPrice === noPriceProvidedText ? 'h4' : 'h1'">{{currentPrice}}</p>
        </div>
    </div>
</template>

<script>
    import {currentPeriodMixin} from '../mixins/current-peroid-mixin';

    export default {
        mixins : [currentPeriodMixin],

        props : {
            prices : {
                type : Object,
                required : true
            },

            time : {
                required: true
            }
        },

        data : function(){
            return {
                noPriceProvidedText : 'لم يحدد السعر'
            }
        },

        computed : {
            currentPrice : function () {
                let price = undefined;

                if(this.currentPeriod.school.week){
                    price = this.prices.school_week;
                }else if(this.currentPeriod.school.weekend){
                    price = this.prices.school_weekend;
                }else if(this.currentPeriod.vacation.week){
                    price = this.prices.vacation_week;
                }else if(this.currentPeriod.vacation.weekend){
                    price = this.prices.vacation_weekend;
                }else if(this.currentPeriod.eid){
                    return this.prices.eid;
                }else{
                    price = this.prices.ramadan;
                }

                if(price === null || price === undefined)
                    return this.noPriceProvidedText;
                else
                    return price + ' ر.س';
            }
        },
    }
</script>