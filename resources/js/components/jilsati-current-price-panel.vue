<template>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-title mb-5 text-success h2">السعر الحالي</p>
            <p class="text-info" style="position: absolute; top: 35px; left: 20px;">(للشخص)</p>
            <p class=" mb-2 text-info mb-4 h3">{{timePeriodText}}</p>
            <p class=" mb-2 text-muted h6">{{weekPeriodText}}</p>
            <p class=" mb-2 text-muted h6">لكل ساعة</p>
            <p class=" mb-2 text-info mb-4" :class="currentPrice === 'لم يحدد السعر' ? 'h4' : 'h1'">{{currentPrice}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            prices : {
                type : Object,
                required : true
            }
        },

        data : function(){
            return {
                timePeriodText : '',
                weekPeriodText : '',

                currentPeriod : {
                    school : {
                        week : false,
                        weekend : false
                    },
                    vacation : {
                        week : false,
                        weekend : false
                    },
                    eid: false,
                    ramadan : false
                }
            }
        },

        computed : {
            currentPrice : function () {
                let price = 0;

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

                if(price === null)
                    return  'لم يحدد السعر';

                return price + ' ر.س';
            }
        },

        created() {
            moment.locale('ar-SA');
            let m = moment();
            m.format('iYYYY/iM/iDهـ الموافق YYYY/M/Dم');

            let hijriMonth = m.iMonth() + 1; // month start from 0
            let weekDay = m.format('idddd'); // day name
            let day = m.iDate(); // day number in month start from 1

            // school
            if(hijriMonth >= 0 && hijriMonth <= 8){
                this.timePeriodText = 'فترة الدراسة';
                // schoolWeekend
                if(weekDay === 'iFriday' || weekDay === 'iSaturday'){
                    this.currentPeriod.school.weekend = true;

                    this.weekPeriodText = 'نهاية الاسبوع';
                }
                // schoolWeek
                else{
                    this.currentPeriod.school.week = true;

                    this.weekPeriodText = 'ايام الاسبوع';
                }
            }else if(hijriMonth === 9){
                this.currentPeriod.ramadan = true;

                this.timePeriodText = 'فترة رمضان';
                this.weekPeriodText = 'خلال الاسبوع';
            }
            // eid fitr
            else if(hijriMonth === 10){
                if(day >= 1 && day <= 10){
                    this.currentPeriod.eid = true;

                    this.timePeriodText = 'فترة الاعياد';
                    this.weekPeriodText = 'خلال الاسبوع';
                }
            }
            // eid adha
            else if(hijriMonth === 12){
                if(day >= 10 && day <= 20){
                    this.currentPeriod.eid = true;

                    this.timePeriodText = 'فترة الاعياد';
                    this.weekPeriodText = 'خلال الاسبوع';
                }
            }
            // vacation
            else {

                this.timePeriodText = 'فترة الاجازة';
                // schoolWeekend
                if(weekDay === 'iFriday' || weekDay === 'iSaturday'){
                    this.currentPeriod.vacation.weekend = true;

                    this.weekPeriodText = 'نهاية الاسبوع';
                }
                // schoolWeek
                else{
                    this.currentPeriod.vacation.week = true;

                    this.weekPeriodText = 'ايام الاسبوع';
                }
            }
        }
    }
</script>