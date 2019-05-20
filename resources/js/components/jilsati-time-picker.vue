<template>
    <div class="input-group date" :id="name" data-target-input="nearest" style="direction:ltr;">
        <input @focus="showTimePicker" :value="time" type="text" class="form-control datetimepicker-input" :name="name" :data-target="'#' + name"/>
        <div class="input-group-append" :data-target="'#' + name" data-toggle="datetimepicker">
            <div class="input-group-text"><img src="/svg/clock.svg" alt="clock" width="20"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['name','time'],

        mounted() {
            let vue = this;
            $(function () {
                $('#'+vue.name).datetimepicker({
                    format: 'LT'
                });
            });
        },

        methods : {
            showTimePicker : function () {
                $('#'+this.name).datetimepicker('show');
            }
        }
    }
</script>