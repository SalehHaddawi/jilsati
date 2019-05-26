<template>
    <div>
        <div v-for="index in shifts">
            <p class="text-info">فترة العمل رقم {{index}}</p>
            <div class="form-inline">
                <div class="form-group m-auto">
                    <label class="form-check-label m-2">من</label>
                    <jilsati-time-picker from-time-picker :min-time="toTimes[index-2]" @on-time-change="updateTimeFrom(index-1,$event)" :name="name+'-from-'+(index-1)" :time="setTime(fromTimes[index-1])"></jilsati-time-picker>
                </div>
                <div class="form-group m-auto">
                    <label class="form-check-label m-2">الى</label>
                    <jilsati-time-picker @on-time-change="updateTimeTo(index-1,$event)" :name="name+'-to-'+(index-1)" :time="setTime(toTimes[index-1])"></jilsati-time-picker>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-info mt-4 mr-2" @click="addNewShift">اضافة فترة عمل</button>

        <button v-if="shifts > 1" type="button" class="btn btn-danger mt-4 mr-2" @click="deleteShift">حذف فترة عمل</button>
    </div>
</template>

<script>
    export default {
        props : {

            name: {
                required : true
            },
        },

        data : function(){
            return {
                shifts : 1,

                fromTimes : [{hour:8,minute:0}],

                toTimes : [{hour:23,minute:0}],
            }
        },

        created() {
            this.shiftChanged();
        },

        methods : {
            addNewShift : function () {
                let m = this.toTimes[this.shifts-1];

                let mom = moment().hours(m.hour).minutes(m.minute);

                this.$set(this.fromTimes, this.shifts, m);

                mom.add(30, 'minutes');

                this.$set(this.toTimes,this.shifts,{hour:mom.hours(), minute:mom.minutes()});

                this.shifts++;

                this.shiftChanged();
            },

            deleteShift :function () {
                this.fromTimes.pop();

                this.toTimes.pop();

                this.shifts--;

                this.shiftChanged();
            },

            updateTimeFrom : function (index,val) {
                if(val) {
                    this.$set(this.fromTimes, index, {hour: val.hours(), minute: val.minutes()});

                    this.shiftChanged();
                }
            },

            updateTimeTo : function (index,val) {
                if(val) {
                    this.$set(this.toTimes, index, {hour: val.hours(), minute: val.minutes()});

                    this.shiftChanged();
                }
            },

            setTime: function (time) {
                return moment().hours(time.hour).minutes(time.minute);
            },

            shiftChanged : function () {
                this.$emit('shift-changed',this.name,{from: this.fromTimes, to:this.toTimes});
            }
        },
    }
</script>