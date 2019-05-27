<template>
    <div class="card mb-3 shadow-sm rounded-0 text-right">
        <div class="card-body">
<!--            <div>-->
<!--                <p class="card-title text-success mb-4 h1">فترات العمل</p>-->
<!--            </div>-->
            <ul class="list-group list-group-flush text-right">
                <li class="list-group-item w-100 border-0">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة الدراسة</p>
                        <div class="mt-2 mb-4">
                            <p class="h6 mb-2 text-muted">ايام الاسبوع</p>
                            <div v-if="times.schoolWeek.from">
                                <div v-for="index in times.schoolWeek.from.length" class="w-100">
                                    <div class="mt-2 mb-3">
                                        <div>
                                            <span class="badge badge-success badge-pill float-right">{{formatTime(times.schoolWeek.from[index-1])}}</span>
                                            <span class="badge badge-success badge-pill float-left">{{formatTime(times.schoolWeek.to[index-1])}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <span v-else class="badge badge-success badge-pill">لم يحدد</span>
                        </div>
                        <div class="mt-2 mb-2">
                            <p class="h6 mb-2 text-muted">نهاية الاسبوع</p>
                            <div v-if="times.schoolWeekend.from">
                                <div v-for="index in times.schoolWeekend.from.length" class="w-100">
                                    <div class="mt-2 mb-3">
                                        <div>
                                            <span class="badge badge-success badge-pill float-right">{{formatTime(times.schoolWeekend.from[index-1])}}</span>
                                            <span class="badge badge-success badge-pill float-left">{{formatTime(times.schoolWeekend.to[index-1])}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <span v-else class="badge badge-success badge-pill">لم يحدد</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item w-100">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة الاجازة</p>
                        <div class="mt-2 mb-4">
                            <p class="h6 mb-2 text-muted">ايام الاسبوع</p>
                            <div v-if="times.vacationWeek.from">
                                <div v-for="index in times.vacationWeek.from.length" class="w-100">
                                    <div class="mt-2 mb-3">
                                        <div>
                                            <span class="badge badge-success badge-pill float-right">{{formatTime(times.vacationWeek.from[index-1])}}</span>
                                            <span class="badge badge-success badge-pill float-left">{{formatTime(times.vacationWeek.to[index-1])}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <span v-else class="badge badge-success badge-pill">لم يحدد</span>
                        </div>
                        <div class="mt-2 mb-2">
                            <p class="h6 mb-2 text-muted">نهاية الاسبوع</p>
                            <div v-if="times.vacationWeekend.from">
                                <div v-for="index in times.vacationWeekend.from.length" class="w-100">
                                    <div class="mt-2 mb-3">
                                        <div>
                                            <span class="badge badge-success badge-pill float-right">{{formatTime(times.vacationWeekend.from[index-1])}}</span>
                                            <span class="badge badge-success badge-pill float-left">{{formatTime(times.vacationWeekend.to[index-1])}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <span v-else class="badge badge-success badge-pill">لم يحدد</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item w-100">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة الاعياد</p>
                        <div class="mt-2 mb-2">
                            <p class="h6 mb-2 text-muted">خلال الاسبوع</p>
                            <div v-if="times.eidWeek.from">
                                <div v-for="index in times.eidWeek.from.length" class="w-100">
                                    <div class="mt-2">
                                        <div>
                                            <span class="badge badge-success badge-pill float-right">{{formatTime(times.eidWeek.from[index-1])}}</span>
                                            <span class="badge badge-success badge-pill float-left">{{formatTime(times.eidWeek.to[index-1])}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <span v-else class="badge badge-success badge-pill">لم يحدد</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item w-100">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة رمضان</p>
                        <div class="mt-2 mb-2">
                            <p class="h6 mb-2 text-muted">خلال الاسبوع</p>
                            <div v-if="times.ramadanWeek.from">
                                <div v-for="index in times.ramadanWeek.from.length" class="w-100">
                                    <div class="mt-2">
                                        <div>
                                            <span class="badge badge-success badge-pill float-right">{{formatTime(times.ramadanWeek.from[index-1])}}</span>
                                            <span class="badge badge-success badge-pill float-left">{{formatTime(times.ramadanWeek.to[index-1])}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <span v-else class="badge badge-success badge-pill">لم يحدد</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            times : {
                required : true,
                type : Object
            }
        },

        methods : {
            formatTime : function (time) {
                let h = time.hour%12;
                let m = time.minute;

                return (h === 0 ? 12 : ((h !== 10 && h !== 11 && h !== 12) ? '0'+h : h)) + ':' + (m === 0 ? '00' : m) + ' ' +  (time.hour <= 11 ? 'AM' : 'PM');
            }
        }
    }
</script>