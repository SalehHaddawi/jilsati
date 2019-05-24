<template>
    <div class="input-group date" :id="name" data-target-input="nearest" style="direction:ltr;">
        <input @focus="showTimePicker" type="text" class="form-control datetimepicker-input" :name="name" :data-target="'#' + name"/>
        <div class="input-group-append" :data-target="'#' + name" data-toggle="datetimepicker">
            <div class="input-group-text">
                <img src="/svg/clock.svg" alt="clock" width="20">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            name : {
                type : String,
                required : true
            },

            time : {
                type : Object,
            },

            minTime : {
                type : Object
            },

            fromTimePicker : {
                type : Boolean
            }
        },

        data : function(){
          return {
              timePicker : undefined
          }
        },

        created() {
            let vue = this;

            $(function () {
                let s = $('#'+vue.name);

                vue.timePicker = s;

                s.datetimepicker({
                    format: 'LT',

                    date : vue.time ? vue.time : moment.hours(8).minutes(0),

                    stepping : 30,
                });

                s.on('change.datetimepicker',function(){

                    let time = vue.resetTimeToRange();

                    vue.$emit('on-time-change',time);
                });
            });
        },

        watch : {
          minTime : function () {
              if(this.minTime){
                  this.resetTimeToRange();
              }
          }
        },

        methods : {
            showTimePicker : function () {
                $('#'+this.name).datetimepicker('show');
            },

            resetTimeToRange : function () {
                let time = this.timePicker.datetimepicker('date');
                let vue = this;

                if(vue.minTime) {

                    if (time.hours() < vue.minTime.hour) {
                        time.hours(vue.minTime.hour);
                        time.minutes(vue.minTime.minute);
                    } else if (time.hours() === vue.minTime.hour && time.minutes() <= vue.minTime.minute) {
                        time.hours(vue.minTime.hour);
                        time.minutes(vue.minTime.minute);

                        if(!vue.fromTimePicker) {
                            time.add(30,'minutes');
                        }
                    }

                    this.timePicker.datetimepicker('date', time);
                }

                return time;
            }
        },
    }
</script>