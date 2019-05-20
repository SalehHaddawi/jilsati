<template>
    <div>
        <jilsati-step title="معلومات الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="1"
                      :status="stepsInfo[0]">

            <div class="form-group">
                <label for="jilsah-name">اسم الجلسة</label>
                <input type="text" class="form-control" id="jilsah-name" placeholder="اسم جلستك" aria-describedby="jilsah-nameHelp">
                <small id="jilsah-nameHelp" class="form-text text-muted">
                    هذا الاسم اللي الناس بيبحثوا عن جلستك بيه
                </small>
            </div>
            <div class="form-group">
                <label for="jilsah-description">وصف الجلسة</label>
                <textarea class="form-control" id="jilsah-description" placeholder="الوصف" rows="5" aria-describedby="descriptionHelp"></textarea>
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

            <jilsati-time-picker></jilsati-time-picker>

            <div class="mt-2">
                <button type="button" class="btn btn-success" @click="check(1)">اللي بعدو</button>
            </div>
        </jilsati-step>
        <jilsati-step title="ايش تقدم الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="3"
                      :status="stepsInfo[2]">

            <p class="text-justify">
                اختار الخدمات اللي جلستك بتقدمها
            </p>

            <fieldset class="border p-2">
                <legend  class="w-auto">الجلسة تستقبل</legend>
                <jilsati-radio postfix="1" name="client" inline="true" checked="selected">شباب</jilsati-radio>
                <jilsati-radio postfix="2" name="client" inline="true">عائلات</jilsati-radio>
                <jilsati-radio postfix="3" name="client" inline="true">الاثنين</jilsati-radio>
            </fieldset>

            <fieldset class="border p-2">
                <legend  class="w-auto">نوع الجلسة</legend>
                <jilsati-radio postfix="1" name="jilsah-type" inline="true" checked="checked">ارضية</jilsati-radio>
                <jilsati-radio postfix="2" name="jilsah-type" inline="true">طاولات</jilsati-radio>
                <jilsati-radio postfix="3" name="jilsah-type" inline="true">الاثنين</jilsati-radio>
            </fieldset>

            <fieldset class="border p-2">
                <legend  class="w-auto">الجلسة تقدم مجانا</legend>
                <jilsati-checkbox name="free-arabic-coffee-dates" inline="true">قهوة وتمر</jilsati-checkbox>
                <jilsati-checkbox name="free-nuts" inline="true">مكسرات</jilsati-checkbox>
                <jilsati-checkbox name="free-juices" inline="true">عصيرات</jilsati-checkbox>
                <jilsati-checkbox name="free-tv-for-sports" inline="true">عرض المباريات</jilsati-checkbox>
            </fieldset>

            <fieldset class="border p-2">
                <legend  class="w-auto">خدمات الجلسة</legend>
                <jilsati-checkbox name="board-games" inline="true">العاب طاولة</jilsati-checkbox>
                <jilsati-checkbox name="card-games" inline="true">العاب ورقية</jilsati-checkbox>
                <jilsati-checkbox name="video-games" inline="true">العاب فيديو</jilsati-checkbox>
                <jilsati-checkbox name="cafe" inline="true">كافيه</jilsati-checkbox>
                <jilsati-checkbox name="restaurant" inline="true">مطعم</jilsati-checkbox>
                <jilsati-checkbox name="tennis" inline="true">تنس طاولة</jilsati-checkbox>
                <jilsati-checkbox name="billiard" inline="true">بلياردو</jilsati-checkbox>
                <jilsati-checkbox name="soccer-table" inline="true">فرفيرة</jilsati-checkbox>
                <jilsati-checkbox name="smoke" inline="true">شيشة ومعسل</jilsati-checkbox>
                <jilsati-checkbox name="smoke-area" inline="true">منطقة للمدخنين</jilsati-checkbox>
                <jilsati-checkbox name="tv-for-sports" inline="true">عرض المباريات</jilsati-checkbox>
            </fieldset>

            <div class="mt-2">
                <button type="button" class="btn btn-success" @click="check(2)">اللي بعدو</button>
            </div>
        </jilsati-step>
        <jilsati-step title="صور الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="4"
                      :status="stepsInfo[3]">

            <button type="button" class="btn btn-success" @click="check(3)">اللي بعدو</button>
        </jilsati-step>
        <jilsati-step title="معلومات التواصل"
                      dir="rtl"
                      rtl="true"
                      number="5"
                      :status="stepsInfo[4]">
            <button type="button" class="btn btn-success" @click="check(4)">اللي بعدو</button>
        </jilsati-step>
        <jilsati-step title="اسعار الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="6"
                      :status="stepsInfo[5]">

            <button type="button" class="btn btn-success" @click="check(5)">اللي بعدو</button>
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
                    {id: 'jilsah-photos', state : 'secondary', disabled : true},
                    {id: 'jilsah-connect', state : 'secondary', disabled : true},
                    {id: 'jilsah-price', state : 'secondary', disabled : true},
                ]
            }
        },

        methods : {
            check : function (step) {
                // to make the reactivity works
                Vue.set(this.stepsInfo[step],'state', 'success');

                let vue = this;

                let jilsahStep = $('#'+this.stepsInfo[step].id);

                jilsahStep.collapse('hide');

                // execute the code after the collapse event has finished
                // add the listener only once using -> one()
                jilsahStep.one('hidden.bs.collapse',function () {
                    if(step + 1 < vue.stepsInfo.length){
                        Vue.set(vue.stepsInfo[step+1],'state', 'primary');

                        Vue.set(vue.stepsInfo[step+1],'disabled', false);

                        $('#'+vue.stepsInfo[step+1].id).collapse('show');
                    }
                });
            }
        }
    }
</script>