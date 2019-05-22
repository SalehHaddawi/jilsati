<template>
    <div>
        <jilsati-step title="معلومات الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="1"
                      :status="stepsInfo[0]">

            <div class="form-group">
                <label for="jilsah-name">اسم الجلسة</label>
                <input v-model="models.name" type="text" class="form-control" id="jilsah-name" placeholder="اسم جلستك" aria-describedby="jilsah-nameHelp">
                <small id="jilsah-nameHelp" class="form-text text-muted">
                    هذا الاسم اللي الناس بيبحثوا عن جلستك بيه
                </small>
            </div>
            <div class="form-group">
                <label for="jilsah-description">وصف الجلسة</label>
                <textarea v-model="models.description" class="form-control" id="jilsah-description" placeholder="الوصف" rows="5" aria-describedby="descriptionHelp"></textarea>
                <small id="descriptionHelp" class="form-text text-muted">
                    معلومات مفصلة عن جلستك عشان الناس يعرفوا اكثر عنها
                </small>
            </div>

            <div class="mt-2">
                <button type="button" class="btn btn-success" @click="check(0)">اللي بعدو</button>
            </div>
        </jilsati-step>
        <jilsati-step title="اوقات الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="2"
                      :status="stepsInfo[1]">

            <div v-if="!stepsInfo[1].disabled">
                <p class="text-justify">
                    اختار الاوقات الي الجلسة تكون شغالة
                </p>

                <jilsati-checkbox v-model="chosenTimePeriods.school" name="school-time-period">فترة الدراسة</jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.vacation" name="vacation-time-period">فترة الاجازة</jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.eid" name="eid-time-period">الاعياد</jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.ramadan" name="ramadan-time-period">رمضان</jilsati-checkbox>

                <jilsati-fieldset v-show="chosenTimePeriods.school" font-size="1.4rem" legend="فترة الدراسة">
                    <jilsati-fieldset font-size="1.1rem" legend="ايام الاسبوع">
                        <div v-for="index in jilsahShifts.schoolWeekShifts">
                            <p class="text-info">فترة العمل رقم {{index}}</p>
                            <div class="form-inline">
                                <div class="form-group m-auto">
                                    <label class="form-check-label m-2">من</label>
                                    <jilsati-time-picker time="10:00 AM" :name="'school-week-time-from'+index"></jilsati-time-picker>
                                </div>
                                <div class="form-group m-auto">
                                    <label class="form-check-label m-2">الى</label>
                                    <jilsati-time-picker time="11:00 PM" :name="'school-week-time-to'+index"></jilsati-time-picker>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info mt-4 mr-2" @click="jilsahShifts.schoolWeekShifts++">ضيف فترة عمل</button>
                        <button v-if="jilsahShifts.schoolWeekShifts > 1" type="button" class="btn btn-danger mt-4 mr-2" @click="jilsahShifts.schoolWeekShifts--">حذف فترة عمل</button>
                    </jilsati-fieldset>
                    <jilsati-fieldset font-size="1.1rem" legend="نهاية الاسبوع">
                        <div font-size="1.1rem" legend="ايام الاسبوع">
                            <div v-for="index in jilsahShifts.schoolWeekendShifts">
                                <p class="text-info">فترة العمل رقم {{index}}</p>
                                <div class="form-inline">
                                    <div class="form-group m-auto">
                                        <label class="form-check-label m-2">من</label>
                                        <jilsati-time-picker time="10:00 AM" :name="'school-weekend-time-from'+index"></jilsati-time-picker>
                                    </div>
                                    <div class="form-group m-auto">
                                        <label class="form-check-label m-2">الى</label>
                                        <jilsati-time-picker time="11:00 PM" :name="'school-weekend-time-to'+index"></jilsati-time-picker>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info mt-4 mr-2" @click="jilsahShifts.schoolWeekendShifts++">ضيف فترة جديدة</button>
                            <button v-if="jilsahShifts.schoolWeekendShifts > 1" type="button" class="btn btn-danger mt-4 mr-2" @click="jilsahShifts.schoolWeekendShifts--">حذف فترة عمل</button>
                        </div>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.vacation" legend="فترة الاجازة">
                    <div v-for="index in jilsahShifts.vacationShifts">
                        <p class="text-info">فترة العمل رقم {{index}}</p>
                        <div class="form-inline">
                            <div class="form-group m-auto">
                                <label class="form-check-label m-2">من</label>
                                <jilsati-time-picker time="10:00 AM" :name="'vacation-time-from'+index"></jilsati-time-picker>
                            </div>
                            <div class="form-group m-auto">
                                <label class="form-check-label m-2">الى</label>
                                <jilsati-time-picker time="11:00 PM" :name="'vacation-time-to'+index"></jilsati-time-picker>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info mt-4 mr-2" @click="jilsahShifts.vacationShifts++">ضيف فترة جديدة</button>
                    <button v-if="jilsahShifts.vacationShifts > 1" type="button" class="btn btn-danger mt-4 mr-2" @click="jilsahShifts.vacationShifts--">حذف فترة عمل</button>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.eid" legend="الاعياد">
                    <div v-for="index in jilsahShifts.eidShifts">
                        <p class="text-info">فترة العمل رقم {{index}}</p>
                        <div class="form-inline">
                            <div class="form-group m-auto">
                                <label class="form-check-label m-2">من</label>
                                <jilsati-time-picker time="10:00 AM" :name="'eid-time-from'+index"></jilsati-time-picker>
                            </div>
                            <div class="form-group m-auto">
                                <label class="form-check-label m-2">الى</label>
                                <jilsati-time-picker time="11:00 PM" :name="'eid-time-to'+index"></jilsati-time-picker>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info mt-4 mr-2" @click="jilsahShifts.eidShifts++">ضيف فترة جديدة</button>
                    <button v-if="jilsahShifts.eidShifts > 1" type="button" class="btn btn-danger mt-4 mr-2" @click="jilsahShifts.eidShifts--">حذف فترة عمل</button>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.ramadan" legend="رمضان">
                    <div v-for="index in jilsahShifts.ramadanShifts">
                        <p class="text-info">فترة العمل رقم {{index}}</p>
                        <div class="form-inline">
                            <div class="form-group m-auto">
                                <label class="form-check-label m-2">من</label>
                                <jilsati-time-picker time="10:00 AM" :name="'ramadan-time-from'+index"></jilsati-time-picker>
                            </div>
                            <div class="form-group m-auto">
                                <label class="form-check-label m-2">الى</label>
                                <jilsati-time-picker time="11:00 PM" :name="'ramadan-time-to'+index"></jilsati-time-picker>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info mt-4 mr-2" @click="jilsahShifts.ramadanShifts++">ضيف فترة جديدة</button>
                    <button v-if="jilsahShifts.ramadanShifts > 1" type="button" class="btn btn-danger mt-4 mr-2" @click="jilsahShifts.ramadanShifts--">حذف فترة عمل</button>
                </jilsati-fieldset>

                <!-- next step button -->
                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(1)">اللي بعدو</button>
                </div>
            </div>
        </jilsati-step>
        <jilsati-step title="ايش تقدم الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="3"
                      :status="stepsInfo[2]">

            <div v-if="!stepsInfo[2].disabled">
                <p class="text-justify">
                    اختار الخدمات/المميزات اللي جلستك بتقدمها/تحتويها
                </p>

                <jilsati-fieldset legend="الجلسة تستقبل" font-size="1.1rem">
                    <jilsati-radio postfix="1" name="client" inline="true" checked="selected">شباب</jilsati-radio>
                    <jilsati-radio postfix="2" name="client" inline="true">عائلات</jilsati-radio>
                    <jilsati-radio postfix="3" name="client" inline="true">الاثنين</jilsati-radio>
                </jilsati-fieldset>

                <jilsati-fieldset legend="نوع الجلسة" font-size="1.1rem">
                    <jilsati-radio postfix="1" name="jilsah-type" inline="true" checked="checked">ارضية</jilsati-radio>
                    <jilsati-radio postfix="2" name="jilsah-type" inline="true">طاولات</jilsati-radio>
                    <jilsati-radio postfix="3" name="jilsah-type" inline="true">الاثنين</jilsati-radio>
                </jilsati-fieldset>

                <jilsati-fieldset legend="خدمات/مميزات الجلسة" font-size="1.1rem">
                    <jilsati-checkbox name="arabic-coffee-dates" inline="true">قهوة وتمر</jilsati-checkbox>
                    <jilsati-checkbox name="nuts" inline="true">مكسرات</jilsati-checkbox>
                    <jilsati-checkbox name="board-games" inline="true">العاب طاولة</jilsati-checkbox>
                    <jilsati-checkbox name="card-games" inline="true">العاب ورقية</jilsati-checkbox>
                    <jilsati-checkbox name="video-games" inline="true">العاب فيديو</jilsati-checkbox>
                    <jilsati-checkbox name="cafe" inline="true">كافيه</jilsati-checkbox>
                    <jilsati-checkbox name="restaurant" inline="true">مطعم</jilsati-checkbox>
                    <jilsati-checkbox name="tennis" inline="true">تنس طاولة</jilsati-checkbox>
                    <jilsati-checkbox name="billiard" inline="true">بلياردو</jilsati-checkbox>
                    <jilsati-checkbox name="soccer-table" inline="true">فرفيرة</jilsati-checkbox>
                    <jilsati-checkbox name="air-condition" inline="true">مكيفة</jilsati-checkbox>
                    <jilsati-checkbox name="open-air" inline="true">مفتوحة</jilsati-checkbox>
                    <jilsati-checkbox name="smoke" inline="true">شيشة ومعسل</jilsati-checkbox>
                    <jilsati-checkbox name="smoking-area" inline="true">منطقة للمدخنين</jilsati-checkbox>
                    <jilsati-checkbox name="tv-for-sports" inline="true">عرض المباريات</jilsati-checkbox>
                </jilsati-fieldset>

                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(2)">اللي بعدو</button>
                </div>
            </div>
        </jilsati-step>
        <jilsati-step title="موقع الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="4"
                      :status="stepsInfo[3]">

            <div v-if="!stepsInfo[3].disabled">

                <jilsati-select
                        name="city"
                        optionsLabel="اختار المدينة اللي فيها الجلسة..."
                        :options="cities"
                        v-model="models.city">
                </jilsati-select>

                <div v-if="models.city" class="form-group mt-4">
                    <label for="jilsah-location">موقع الجلسة</label>
                    <input v-model="models.address" type="text" class="form-control" id="jilsah-location" placeholder="مثال: حي الستين بجوار مول الحجاز" aria-describedby="jilsah-locationHelp">
                    <small id="jilsah-locationHelp" class="form-text text-muted">
                        وصف لموقع الجلسة, الحي واي علامة مميزة
                    </small>
                </div>

                <div v-if="models.city" class="form-group mt-4">
                    <label for="jilsah-google-location">رابط قوقل ماب</label>
                    <input v-model="models.googleMapAddress" type="text" class="form-control" id="jilsah-google-location" placeholder="رابط موقع الجلسة في قوقل ماب" aria-describedby="jilsah-google-locationHelp">
                    <small id="jilsah-google-locationHelp" class="form-text text-muted">
                        رابط موقع الجلسة في قوقل ماب عشان تسهل وصول الناس للجلسة
                    </small>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-success" @click="check(3)">اللي بعدو</button>
                </div>
            </div>
        </jilsati-step>
        <jilsati-step title="اسعار الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="5"
                      :status="stepsInfo[4]">

            <div v-if="!stepsInfo[4].disabled">

                <div>
                    <button type="button" class="btn btn-success" @click="check(4)">اللي بعدو</button>
                </div>
            </div>
        </jilsati-step>
        <jilsati-step title="صور الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="6"
                      :status="stepsInfo[5]">

            <div v-if="!stepsInfo[5].disabled">

                <jilsati-file-chooser
                        name="jilsah-main-img"
                        browse="صورة الجلسة"
                        content="ارفع الصورة"
                        @main-image-changed="handleMainImageChanged">
                </jilsati-file-chooser>

                <div>

                    <jilsati-alert type="info">
                        عرض لشكل الجلسة
                    </jilsati-alert>

                    <jilsati-card class="mx-auto mt-4"
                                  :title="models.name"
                                  :description="models.description"
                                  :city="models.city"
                                  :img-src="models.mainImage">
                    </jilsati-card>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-success" @click="check(5)">اللي بعدو</button>
                </div>

            </div>
        </jilsati-step>
        <jilsati-step title="معلومات التواصل"
                      dir="rtl"
                      rtl="true"
                      number="7"
                      :status="stepsInfo[6]">

            <div v-if="!stepsInfo[6].disabled">
                <div>
                    <button type="button" class="btn btn-success" @click="check(6)">اللي بعدو</button>
                </div>
            </div>
        </jilsati-step>
    </div>
</template>

<script>
    export default {
        data : function () {
            return {
                stepsInfo : [
                    {id: 'jilsah-info', state : 'primary', disabled : false},
                    {id: 'jilsah-times', state : 'secondary', disabled : true},
                    {id: 'jilsah-options', state : 'secondary', disabled : true},
                    {id: 'jilsah-location', state : 'secondary', disabled : true},
                    {id: 'jilsah-price', state : 'secondary', disabled : true},
                    {id: 'jilsah-photos', state : 'secondary', disabled : true},
                    {id: 'jilsah-connect', state : 'secondary', disabled : true},
                ],

                timePeriods : [
                    'فترة الدراسة',
                    'فترة الاجازة',
                    'الاعياد',
                    'رمضان'
                ],

                chosenTimePeriods : {
                    school : false,
                    vacation : false,
                    eid : false,
                    ramadan : false
                },

                jilsahShifts : {
                    schoolWeekShifts : 1,
                    schoolWeekendShifts : 1,

                    vacationShifts : 1,

                    eidShifts : 1,

                    ramadanShifts : 1
                },

                models : {
                    name : '',
                    description : '',
                    city : '',
                    mainImage : null,
                    address : '',
                    googleMapAddress : ''
                },

                cities : [],
            }
        },

        methods : {
            check : function (step) {
                // to make the reactivity works
                Vue.set(this.stepsInfo[step],'state', 'success');

                let vue = this;

                let jilsahStep = $('#'+this.stepsInfo[step].id);

                jilsahStep.collapse('hide');

                // make disabled to false so 'v-if' will be true
                // and step body content will appear
                // so the collapse show animation will be good
                if(step + 1 < vue.stepsInfo.length) {
                    Vue.set(vue.stepsInfo[step + 1], 'disabled', false);
                }

                // execute the code after the collapse event has finished
                // add the listener only once using -> one()
                jilsahStep.one('hidden.bs.collapse',function () {
                    if(step + 1 < vue.stepsInfo.length){
                        Vue.set(vue.stepsInfo[step+1],'state', 'primary');

                        $('#'+vue.stepsInfo[step+1].id).collapse('show');
                    }
                });
            },

            handleMainImageChanged : function (src) {
                this.models.mainImage = src;
            },
        },

        created() {
            axios.post('/jilsahs/cities')
                .then(res => {
                    this.cities = res.data;
                }).catch(err => {
                    console.log(err)
                });
        }
    }
</script>