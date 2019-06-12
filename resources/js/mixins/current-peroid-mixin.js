export const currentPeriodMixin = {
    data(){
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
            },
        }
    },
    created(){
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
        else if(hijriMonth === 10 && day >= 1 && day <= 10){
            this.currentPeriod.eid = true;

            this.timePeriodText = 'فترة الاعياد';
            this.weekPeriodText = 'خلال الاسبوع';
        }
        // eid adha
        else if(hijriMonth === 12 && day >= 10 && day <= 20){
            this.currentPeriod.eid = true;

            this.timePeriodText = 'فترة الاعياد';
            this.weekPeriodText = 'خلال الاسبوع';
        }
        // vacation
        else {

            this.timePeriodText = 'فترة الاجازة';
            // vacationWeekend
            if(weekDay === 'iFriday' || weekDay === 'iSaturday'){
                this.currentPeriod.vacation.weekend = true;

                this.weekPeriodText = 'نهاية الاسبوع';
            }
            // vacationWeek
            else{
                this.currentPeriod.vacation.week = true;

                this.weekPeriodText = 'ايام الاسبوع';
            }
        }
    }
};