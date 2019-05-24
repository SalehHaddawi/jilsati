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
        props : ['name','time','minTime'],

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

                    date : vue.time,

                    stepping : 30,
                });

                s.on('change.datetimepicker',function(){

                    let time = s.datetimepicker('date');

                    if(vue.minTime){
                        if(time.hours() < vue.minTime.hour){
                            time.hours(vue.minTime.hour);
                            time.minutes(vue.minTime.minute);
                        }else if(time.hours() === vue.minTime.hour && time.minutes() < vue.minTime.minute){
                            time.hours(vue.minTime.hour);
                            time.minutes(vue.minTime.minute);
                        }

                        s.datetimepicker('date',time);
                    }

                    vue.$emit('on-time-change',time);
                });
            });
        },

        watch : {
          minTime : function () {
              if(this.minTime){
                  let time = this.timePicker.datetimepicker('date');
                  if(this.time.hours() < this.minTime.hour){
                      time.hours(this.minTime.hour);
                      time.minutes(this.minTime.minute);

                      this.timePicker.datetimepicker('date',time);
                  }else if(time.hours() === this.minTime.hour && time.minutes() < this.minTime.minute){
                      time.hours(this.minTime.hour);
                      time.minutes(this.minTime.minute);

                      this.timePicker.datetimepicker('date',time);
                  }
              }
          }
        },

        methods : {
            showTimePicker : function () {
                $('#'+this.name).datetimepicker('show');
            },
        },
    }
</script>