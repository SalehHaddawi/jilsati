<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest" style="direction: ltr">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                            <div class="input-group-text"><img src="/svg/clock.svg" alt="clock" width="20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        }
    }
</script>