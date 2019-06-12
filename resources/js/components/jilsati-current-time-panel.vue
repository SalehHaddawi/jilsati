<template>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-title mb-5 text-success h2">الدوام الحالي</p>
            <p class=" mb-2 text-info mb-4 h3">{{timePeriodText}}</p>
            <p class=" mb-2 text-muted h6">{{weekPeriodText}}</p>
            <p v-if="currentTime === noTimeProvidedText" class=" mb-2 text-info mb-4" :class="currentTime === noTimeProvidedText ? 'h4' : 'h1'">{{currentTime}}</p>
            <div v-else>
                <div v-for="index in currentTime.from.length" class="w-100">
                    <div class="mt-2">
                        <div class="mt-4">
                            <span class="badge badge-success badge-pill float-right">{{formatTime(currentTime.from[index-1])}}</span>
                            <span class="badge badge-success badge-pill float-left">{{formatTime(currentTime.to[index-1])}}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {currentPeriodMixin} from '../mixins/current-peroid-mixin';

    export default {
        mixins : [currentPeriodMixin],

        props : {
            times : {
                type : Object,
                required : true
            },

            time : {
                required: true
            }
        },

        data : function(){
            return {
                noTimeProvidedText : 'لم يحدد الوقت'
            }
        },

        methods : {
            formatTime : function (time) {
                let h = time.hour%12;
                let m = time.minute;

                return (h === 0 ? 12 : ((h !== 10 && h !== 11 && h !== 12) ? '0'+h : h)) + ':' + (m === 0 ? '00' : m) + ' ' +  (time.hour <= 11 ? 'AM' : 'PM');
            }
        },

        computed : {
            currentTime : function () {
                let time = undefined;

                if(this.currentPeriod.school.week){
                    time = this.times.schoolWeek;
                }else if(this.currentPeriod.school.weekend){
                    time = this.times.schoolWeekend;
                }else if(this.currentPeriod.vacation.week){
                    time = this.times.vacationWeek;
                }else if(this.currentPeriod.vacation.weekend){
                    time = this.times.vacationWeekend;
                }else if(this.currentPeriod.eid){
                    time = this.times.eidWeek;
                }else{
                    time = this.times.ramadanWeek;
                }

                if(!time.from)
                    return this.noTimeProvidedText;

                return time;
            }
        },
    }
</script>