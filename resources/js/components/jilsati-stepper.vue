<template>
    <div>
        <jilsati-step title="معلومات الجلسة الاساسية"
                      dir="rtl"
                      rtl="true"
                      number="1"
                      :status="stepsInfo[0]">

            <div class="form-group">
                <label for="jilsah-name">اسم الجلسة</label>
                <input v-model.trim="models.name" type="text" class="form-control" id="jilsah-name" placeholder="اسم جلستك" aria-describedby="jilsah-nameHelp">
                <small id="jilsah-nameHelp" class="form-text text-muted">
                    هذا الاسم اللي الناس بيبحثوا عن جلستك بيه
                </small>
            </div>
            <div class="form-group">
                <label for="jilsah-description">وصف الجلسة</label>
                <textarea v-model.trim="models.description" class="form-control" id="jilsah-description" placeholder="الوصف" rows="5" aria-describedby="descriptionHelp"></textarea>
                <small id="descriptionHelp" class="form-text text-muted">
                    معلومات مفصلة عن جلستك عشان الناس يعرفوا اكثر عنها
                </small>
            </div>

            <div class="mt-2">
                <button type="button" class="btn btn-success" @click="check(0)">حفظ ومتابعة</button>
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

                <jilsati-checkbox v-model="chosenTimePeriods.school" name="school-time-period" checked>فترة الدراسة</jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.vacation" name="vacation-time-period">فترة الاجازة</jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.eid" name="eid-time-period">الاعياد</jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.ramadan" name="ramadan-time-period">رمضان</jilsati-checkbox>

                <jilsati-fieldset v-show="chosenTimePeriods.school" font-size="1.4rem" legend="فترة الدراسة">
                    <jilsati-fieldset font-size="1.1rem" legend="ايام الاسبوع">
                        <jilsati-shifts name="school-week"></jilsati-shifts>
                    </jilsati-fieldset>
                    <jilsati-fieldset font-size="1.1rem" legend="نهاية الاسبوع">
                        <jilsati-shifts name="school-weekend"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.vacation" legend="ايام الاجازة" font-size="1.4rem">
                    <jilsati-fieldset font-size="1.1rem" legend="ايام الاسبوع">
                        <jilsati-shifts name="vacation-week"></jilsati-shifts>
                    </jilsati-fieldset>
                    <jilsati-fieldset font-size="1.1rem" legend="نهاية الاسبوع">
                        <jilsati-shifts name="vacation-weekend"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.eid" legend="الاعياد">
                    <jilsati-fieldset font-size="1.1rem" legend="خلال الاسبوع">
                        <jilsati-shifts name="eid-week"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.ramadan" legend="رمضان">
                    <jilsati-fieldset font-size="1.1rem" legend="خلال الاسبوع">
                        <jilsati-shifts name="ramadan-week"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <!-- next step button -->
                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(1)">حفظ ومتابعة</button>
                </div>
            </div>
        </jilsati-step>
        <jilsati-step title="عن الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="3"
                      :status="stepsInfo[2]">

            <div v-if="!stepsInfo[2].disabled">
                <p class="text-justify">
                    اختار الخدمات/المميزات اللي جلستك بتقدمها/تحتويها
                </p>

                <jilsati-fieldset legend="الجلسة تستقبل" font-size="1.1rem">
                    <jilsati-checkbox v-model="models.jilsahClients" name="شباب" inline checked>شباب</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.jilsahClients" name="سيدات" inline>سيدات</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.jilsahClients" name="عائلات" inline>عائلات</jilsati-checkbox>
                </jilsati-fieldset>

                <jilsati-fieldset legend="نوع الجلسة" font-size="1.1rem">
                    <jilsati-checkbox v-model="models.jilsahType" name="جلسات ارضية" inline checked>جلسات ارضية</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.jilsahType" name="جلسات طاولة" inline>جلسات طاولة</jilsati-checkbox>
                </jilsati-fieldset>

                <jilsati-fieldset legend="خدمات/مميزات الجلسة" font-size="1.1rem">
                    <jilsati-checkbox v-model="models.options" name="قهوة عربية وتمر" inline>قهوة وتمر</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="مكسرات" inline>مكسرات</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="العاب طاولة" inline>العاب طاولة</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="العاب ورق" inline>العاب ورقية</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="العاب فيديو" inline>العاب فيديو</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="كافيه" inline>كافيه</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="مطعم" inline>مطعم</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="تنس طاولة" inline>تنس طاولة</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="بلياردو" inline>بلياردو</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="فرفيرة" inline>فرفيرة</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="مكيفة" inline>مكيفة</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="مفتوحة" inline>مفتوحة</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="شيشة ومعسل" inline>شيشة ومعسل</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="منطقة مدخنين" inline>منطقة للمدخنين</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="عرض مباريات" inline>عرض المباريات</jilsati-checkbox>
                </jilsati-fieldset>

                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(2)">حفظ ومتابعة</button>
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

                <div class="form-group mt-4">
                    <label for="jilsah-location">الحي</label>
                    <input v-model.trim="models.address" type="text" class="form-control" id="jilsah-location" placeholder="الحي" aria-describedby="jilsah-locationHelp">
                    <small id="jilsah-locationHelp" class="form-text text-muted">
                        الحي اللي فيه الجلسة
                    </small>
                </div>

                <div class="form-group mt-4">
                    <label for="jilsah-location-details">موقع الجلسة</label>
                    <input v-model.trim="models.addressDetails" type="text" class="form-control" id="jilsah-location-details" placeholder="مثال: بجوار مسجد التقوى على اليمين" aria-describedby="jilsah-location-detailsHelp">
                    <small id="jilsah-location-detailsHelp" class="form-text text-muted">
                        وصف لموقع الجلسة واي علامة مميزة
                    </small>
                </div>

                <div class="form-group mt-4">
                    <label for="jilsah-google-location">رابط قوقل ماب</label>
                    <input v-model.trim="models.googleMapAddress" type="text" class="form-control" id="jilsah-google-location" placeholder="رابط موقع الجلسة في قوقل ماب" aria-describedby="jilsah-google-locationHelp">
                    <small id="jilsah-google-locationHelp" class="form-text text-muted">
                        رابط موقع الجلسة في قوقل ماب عشان تسهل وصول الناس للجلسة
                    </small>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-success" @click="check(3)">حفظ ومتابعة</button>
                </div>
            </div>
        </jilsati-step>
        <jilsati-step title="اسعار الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="5"
                      :status="stepsInfo[4]">

            <div v-if="!stepsInfo[4].disabled">

                <p class="text-justify">
                    اسعار الجلسة للفترات اللي اخترتها في الخطوة "اوقات الجلسة"
                </p>

                <div class="mt-2">
                    <jilsati-radio v-model="models.pricePer" name="price-per" postfix="jilsah" val="للجلسة" checked>السعر للجلسة</jilsati-radio>
                    <jilsati-radio v-model="models.pricePer" name="price-per" postfix="person" val="للشخص">السعر للشخص</jilsati-radio>
                </div>

                <div v-if="chosenTimePeriods.school" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة الدراسة" font-size="1.1rem">

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ايام الاسبوع</span>
                                </div>
                                <input v-model="models.prices.schoolWeek" type="number" aria-label="سعر الجلسة في فترة الدراسة ايام الاسبوع" class="form-control rounded-0">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ملاحظة</span>
                                </div>
                                <input type="text" aria-label="ملاحظة عن سعر الجلسة في فترة الدراسة ايام الاسبوع" class="form-control rounded-0" placeholder="مثال: سعر خاص للمجموعات">
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">نهاية الاسبوع</span>
                                </div>
                                <input v-model="models.prices.schoolWeekend" type="number" aria-label="سعر الجلسة في فترة الدراسة ايام نهاية الاسبوع" class="form-control rounded-0">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ملاحظة</span>
                                </div>
                                <input type="text" aria-label="ملاحظة عن سعر الجلسة في فترة الدراسة ايام نهاية الاسبوع" class="form-control rounded-0" placeholder="مثال: سعر خاص للمجموعات">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div v-if="chosenTimePeriods.vacation" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة الاجازة" font-size="1.1rem">

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ايام الاسبوع</span>
                                </div>
                                <input v-model="models.prices.vacationWeek" type="number" aria-label="سعر الجلسة في فترة الدراسة ايام الاسبوع" class="form-control rounded-0">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ملاحظة</span>
                                </div>
                                <input type="text" aria-label="ملاحظة عن سعر الجلسة في فترة الاجازة ايام الاسبوع" class="form-control rounded-0" placeholder="مثال: سعر خاص للمجموعات">
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">نهاية الاسبوع</span>
                                </div>
                                <input v-model="models.prices.vacationWeekend" type="number" aria-label="سعر الجلسة في فترة الدراسة ايام نهاية الاسبوع" class="form-control rounded-0">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ملاحظة</span>
                                </div>
                                <input type="text" aria-label="ملاحظة عن سعر الجلسة في فترة الاجازة ايام نهاية الاسبوع" class="form-control rounded-0" placeholder="مثال: سعر خاص للمجموعات">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div v-if="chosenTimePeriods.eid" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة الاعياد" font-size="1.1rem">
                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">خلال الاسبوع</span>
                                </div>
                                <input v-model="models.prices.eid" type="number" aria-label="سعر الجلسة في فترة الاعياد" class="form-control rounded-0">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ملاحظة</span>
                                </div>
                                <input type="text" aria-label="ملاحظة عن سعر الجلسة في فترة الاعياد" class="form-control rounded-0" placeholder="مثال: سعر خاص للمجموعات">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div v-if="chosenTimePeriods.ramadan" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة رمضان" font-size="1.1rem">
                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">خلال الاسبوع</span>
                                </div>
                                <input v-model="models.prices.ramadan" type="number" aria-label="سعر الجلسة في فترة رمضان" class="form-control rounded-0">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ملاحظة</span>
                                </div>
                                <input type="text" aria-label="ملاحظة عن سعر الجلسة في فترة رمضان" class="form-control rounded-0" placeholder="مثال: سعر خاص للمجموعات">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(4)">حفظ ومتابعة</button>
                </div>
            </div>
        </jilsati-step>
        <jilsati-step title="صور الجلسة"
                      dir="rtl"
                      rtl="true"
                      number="6"
                      :status="stepsInfo[5]">

            <div v-if="!stepsInfo[5].disabled">

                <jilsati-fieldset legend="نظرة سريعة على شكل الجلسة النهائي" font-size="1.1rem">

                    <jilsati-file-chooser
                            name="jilsah-main-img"
                            browse="صورة الجلسة"
                            content="ارفع الصورة"
                            @image-changed="handleMainImageChanged">
                    </jilsati-file-chooser>

                    <div>

                        <jilsati-alert type="info">
                            عرض لشكل الجلسة
                        </jilsati-alert>

                        <jilsati-card-show :title="models.name"
                                            :city="models.city"
                                            :address="models.address"
                                            :description="models.description"
                                            :img-src="models.mainImage"
                                            :max-description-length="180"
                                            :options="models.options"
                                            :clients="models.jilsahClients"
                                            :types="models.jilsahType"
                                            :rating="5"
                                            :price="models.prices.schoolWeek"
                                            :price-per="models.pricePer">
                        </jilsati-card-show>
                    </div>
                </jilsati-fieldset>

                <jilsati-fieldset legend="صور الجلسة" font-size="1.3rem">
                    <div class="mt-2">
                        <jilsati-alert type="info">
                            اضيف صور الجلسة الباقية
                        </jilsati-alert>

                        <jilsati-file-chooser
                                name="jilsah-imgs"
                                browse="صور الجلسة"
                                content="ارفع الصور"
                                multiple
                                @image-changed="handleAddNewJilsahImage">
                        </jilsati-file-chooser>
                    </div>

                    <div class="row justify-content-start mt-2">
                        <div v-for="img in models.jilsahImages" class="card shadow-sm mb-2 col-lg-2 col-md-3 col-6" style="max-width: 150px;">

                            <a :href="img.src" data-toggle="lightbox" data-gallery="jilsah-images">
                                <img :src="img.src" class="card-img" alt="صورة للجلسة" width="100">
                            </a>

                            <button @click="removeJilsahImage(img.index)" type="button" class="close close-jilsah-image" aria-label="Close">
                                <span class="text-right text-danger" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </jilsati-fieldset>

                <div class="mt-4">
                    <button type="button" class="btn btn-success" @click="check(5)">حفظ ومتابعة</button>
                </div>

            </div>
        </jilsati-step>
        <jilsati-step title="معلومات التواصل"
                      dir="rtl"
                      rtl="true"
                      number="7"
                      :status="stepsInfo[6]">

            <div v-if="!stepsInfo[6].disabled">

                <div class="mt-2">
                    <div class="input-group">
                        <div class="input-group-prepend rounded-0">
                            <span class="input-group-text rounded-0">الجوال</span>
                        </div>
                        <input v-model="models.social.phone" placeholder="05xxxxxxxx" type="tel" aria-label="جوال التواصل" class="form-control rounded-0">
                    </div>
                </div>

                <jilsati-fieldset class="mt-2" legend="روابط حسابات التواصل الاجتماعي" font-size="1.2rem">

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i class="fab fa-instagram"></i></span>
                            </div>
                            <input v-model.trim="models.social.instagram" placeholder="http://www.Instagram.com/username" type="url" aria-label="رابط حساب انستقرام" class="form-control rounded-0">
                        </div>
                    </div>

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i class="fab fa-facebook-f"></i></span>
                            </div>
                            <input v-model.trim="models.social.facebook" placeholder="http://www.facebook.com/username" type="url" aria-label="رابط حساب فيسبوك" class="form-control rounded-0">
                        </div>
                    </div>

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i class="fab fa-twitter"></i></span>
                            </div>
                            <input v-model.trim="models.social.twitter" placeholder="http://www.twitter.com/username" type="url" aria-label="رابط حساب تويتر" class="form-control rounded-0">
                        </div>
                    </div>

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i class="fab fa-snapchat"></i></span>
                            </div>
                            <input v-model.trim="models.social.snapchat" placeholder="http://www.snapchat.com/add/username" type="url" aria-label="رابط حساب سناب شات" class="form-control rounded-0">
                        </div>
                    </div>

                </jilsati-fieldset>

                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(6)">حفظ ومتابعة</button>
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
                    {id: 'jilsah-price', state : 'secondary', disabled : false},
                    {id: 'jilsah-photos', state : 'secondary', disabled : true},
                    {id: 'jilsah-connect', state : 'secondary', disabled : false},
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

                    vacationWeekShifts : 1,
                    vacationWeekendShifts : 1,

                    eidShifts : 1,

                    ramadanShifts : 1
                },

                models : {
                    name : '',
                    description : '',
                    jilsahClients : [],
                    jilsahType : [],
                    options : [],
                    city : '',
                    mainImage : '/images/upload-your-jilsah.png',
                    address : '',
                    addressDetails : '',
                    googleMapAddress : '',
                    pricePer : '',
                    prices : {
                        schoolWeek : 0,
                        schoolWeekend : 0,
                        vacationWeek : 0,
                        vacationWeekend : 0,
                        eid : 0,
                        ramadan : 0
                    },
                    jilsahImages : [],
                    social : {
                        phone : '',
                        instagram : '',
                        facebook : '',
                        twitter : '',
                        snapchat : ''
                    }
                },

                cities : [],

                /*****************/

                jilsahImagesCounter : 0
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

            handleMainImageChanged : function (file) {
                this.models.mainImage = file.src;
            },

            handleAddNewJilsahImage : function(file){
                this.models.jilsahImages.push({index : this.jilsahImagesCounter,name:file.name,src: file.src});

                this.jilsahImagesCounter++;
            },

            removeJilsahImage : function (index) {
                this.models.jilsahImages = this.models.jilsahImages.filter(img => img.index !== index);

                console.log(index)
            }
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