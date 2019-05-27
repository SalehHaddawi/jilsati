<template>
    <div class="card mb-3 shadow-sm rounded-0 text-right">
        <div class="card-body">
            <div>
<!--                <p class="card-title text-success mb-4 h1">الاسعار</p>-->
                <p class="text-info" style="position: absolute;top:35px;left:20px;">({{pricePerJilsah}})</p>
            </div>
            <ul class="list-group list-group-flush text-right">
                <li class="list-group-item w-100 border-0">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة الدراسة</p>
                        <div class="w-100">
                            <div>
                                <p class="h6 float-right text-muted">ايام الاسبوع</p>
                                <span class="badge badge-success badge-pill float-left">{{schoolWeekPrice}}</span>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <p class="h6 float-right text-muted">نهاية الاسبوع</p>
                                <span class="badge badge-success badge-pill float-left">{{schoolWeekendPrice}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item w-100">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة الاجازة</p>
                        <div class="w-100">
                            <div>
                                <p class="h6 float-right text-muted">ايام الاسبوع</p>
                                <span class="badge badge-success badge-pill float-left">{{vacationWeekPrice}}</span>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <p class="h6 float-right text-muted">نهاية الاسبوع</p>
                                <span class="badge badge-success badge-pill float-left">{{vacationWeekendPrice}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item w-100">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة العيد</p>
                        <div class="w-100">
                            <div>
                                <p class="h6 float-right text-muted">خلال الاسبوع</p>
                                <span class="badge badge-success badge-pill float-left">{{eidPrice}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item w-100">
                    <div class="w-100">
                        <p class="h5 mb-3">فترة رمضان</p>
                        <div class="w-100">
                            <div>
                                <p class="h6 float-right text-muted">خلال الاسبوع</p>
                                <span class="badge badge-success badge-pill float-left">{{ramadanPrice}}</span>
                            </div>
                            <div class="clearfix"></div>
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
            prices : {
                required : true,
                type : Object
            }
        },

        computed : {
            pricePerJilsah : function () {
                return this.prices.price_per_jilsah ? 'للجلسة' : 'للشخص';
            },

            schoolWeekPrice : function () {
                return this.prices.school_week ? this.prices.school_week + ' ر.س' : 'لم يحدد';
            },

            schoolWeekendPrice : function () {
                return this.prices.school_weekend ? this.prices.school_weekend + ' ر.س' : 'لم يحدد';
            },

            vacationWeekPrice : function () {
                return this.prices.vacation_week ? this.prices.vacation_week + ' ر.س' : 'لم يحدد';
            },

            vacationWeekendPrice : function () {
                return this.prices.vacation_weekend ? this.prices.vacation_weekend + ' ر.س' : 'لم يحدد';
            },

            eidPrice : function () {
                return this.prices.eid ? this.prices.eid + ' ر.س' : 'لم يحدد';
            },

            ramadanPrice : function () {
                return this.prices.ramadan ? this.prices.ramadan + ' ر.س' : 'لم يحدد';
            },
        }
    }
</script>