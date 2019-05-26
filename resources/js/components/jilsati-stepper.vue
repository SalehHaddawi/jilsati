<template>
    <div>
        <jilsati-step title="معلومات الجلسة الاساسية"
                      dir="rtl"
                      rtl="true"
                      number="1"
                      :status="stepsInfo[0]">

            <div class="form-group">
                <label for="jilsah-name">اسم الجلسة</label>
                <input v-model.trim="models.jilsah.name" type="text" class="form-control" :class="nameErr" id="jilsah-name"
                       placeholder="اسم جلستك" aria-describedby="jilsah-nameHelp">
                <small id="jilsah-nameHelp" class="form-text text-muted">
                    هذا الاسم اللي الناس بيبحثوا عن جلستك بيه
                </small>
            </div>
            <div class="form-group">
                <label for="jilsah-description">وصف الجلسة</label>
                <textarea v-model.trim="models.jilsah.description" class="form-control" :class="descriptionErr"
                          id="jilsah-description" placeholder="الوصف" rows="5"
                          aria-describedby="descriptionHelp"></textarea>
                <small id="descriptionHelp" class="form-text text-muted">
                    معلومات مفصلة عن جلستك عشان الناس يعرفوا اكثر عنها
                </small>
            </div>

            <div class="mt-2">
                <button type="button" class="btn btn-success" @click="check(0)" :disabled="!stepJilsahInfoErr">حفظ
                    ومتابعة
                </button>
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

                <jilsati-checkbox v-model="chosenTimePeriods.school" name="school-time-period">فترة الدراسة
                </jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.vacation" name="vacation-time-period">فترة الاجازة
                </jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.eid" name="eid-time-period">الاعياد</jilsati-checkbox>
                <jilsati-checkbox v-model="chosenTimePeriods.ramadan" name="ramadan-time-period">رمضان
                </jilsati-checkbox>

                <jilsati-fieldset v-show="chosenTimePeriods.school" font-size="1.4rem" legend="فترة الدراسة">
                    <jilsati-fieldset font-size="1.1rem" legend="ايام الاسبوع">
                        <jilsati-shifts name="schoolWeek" @shift-changed="handleTimesChanged"></jilsati-shifts>
                    </jilsati-fieldset>
                    <jilsati-fieldset font-size="1.1rem" legend="نهاية الاسبوع">
                        <jilsati-shifts name="schoolWeekend" @shift-changed="handleTimesChanged"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.vacation" legend="ايام الاجازة" font-size="1.4rem">
                    <jilsati-fieldset font-size="1.1rem" legend="ايام الاسبوع">
                        <jilsati-shifts name="vacationWeek" @shift-changed="handleTimesChanged"></jilsati-shifts>
                    </jilsati-fieldset>
                    <jilsati-fieldset font-size="1.1rem" legend="نهاية الاسبوع">
                        <jilsati-shifts name="vacationWeekend" @shift-changed="handleTimesChanged"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.eid" legend="الاعياد">
                    <jilsati-fieldset font-size="1.1rem" legend="خلال الاسبوع">
                        <jilsati-shifts name="eidWeek" @shift-changed="handleTimesChanged"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <jilsati-fieldset v-show="chosenTimePeriods.ramadan" legend="رمضان">
                    <jilsati-fieldset font-size="1.1rem" legend="خلال الاسبوع">
                        <jilsati-shifts name="ramadanWeek" @shift-changed="handleTimesChanged"></jilsati-shifts>
                    </jilsati-fieldset>
                </jilsati-fieldset>

                <!-- next step button -->
                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(1)" :disabled="!stepJilsahTimesErr">حفظ
                        ومتابعة
                    </button>
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

                <jilsati-fieldset legend="الجلسة تستقبل" font-size="1.1rem" :class="jilsahClientsErr">
                    <jilsati-checkbox v-model="models.jilsahClients" name="شباب" inline>شباب</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.jilsahClients" name="سيدات" inline>سيدات</jilsati-checkbox>
                    <jilsati-checkbox v-model="models.jilsahClients" name="عائلات" inline>عائلات</jilsati-checkbox>
                </jilsati-fieldset>

                <jilsati-fieldset legend="نوع الجلسة" font-size="1.1rem" :class="jilsahTypeErr">
                    <jilsati-checkbox v-model="models.jilsahType" name="جلسات ارضية" inline>جلسات ارضية
                    </jilsati-checkbox>
                    <jilsati-checkbox v-model="models.jilsahType" name="جلسات طاولة" inline>جلسات طاولة
                    </jilsati-checkbox>
                </jilsati-fieldset>

                <jilsati-fieldset legend="خدمات/مميزات الجلسة" font-size="1.1rem">
                    <jilsati-checkbox v-model="models.options" name="قهوة عربية وتمر" inline>قهوة وتمر
                    </jilsati-checkbox>
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
                    <jilsati-checkbox v-model="models.options" name="منطقة مدخنين" inline>منطقة للمدخنين
                    </jilsati-checkbox>
                    <jilsati-checkbox v-model="models.options" name="عرض مباريات" inline>عرض المباريات
                    </jilsati-checkbox>
                </jilsati-fieldset>

                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(2)" :disabled="!stepJilsahOptionsErr">
                        حفظ ومتابعة
                    </button>
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
                        :options="cities.map(c => c.name)"
                        :class="cityErr"
                        v-model="models.location.city">
                </jilsati-select>

                <div class="form-group mt-4">
                    <label for="jilsah-location">الحي</label>
                    <input v-model.trim="models.location.address" type="text" class="form-control" :class="addressErr"
                           id="jilsah-location" placeholder="الحي" aria-describedby="jilsah-locationHelp">
                    <small id="jilsah-locationHelp" class="form-text text-muted">
                        الحي اللي فيه الجلسة
                    </small>
                </div>

                <div class="form-group mt-4">
                    <label for="jilsah-location-details">وصف لموقع الجلسة (اختياري)</label>
                    <input v-model.trim="models.location.addressDetails" type="text" class="form-control"
                           id="jilsah-location-details" placeholder="مثال: بجوار مسجد التقوى على اليمين"
                           aria-describedby="jilsah-location-detailsHelp">
                    <small id="jilsah-location-detailsHelp" class="form-text text-muted">
                        وصف لموقع الجلسة واي علامة مميزة
                    </small>
                </div>

                <div class="form-group mt-4">
                    <label for="jilsah-google-location">رابط قوقل ماب (اختياري)</label>
                    <input v-model.trim="models.location.googleMapUrl" type="text" class="form-control"
                           id="jilsah-google-location" placeholder="رابط موقع الجلسة في قوقل ماب"
                           aria-describedby="jilsah-google-locationHelp">
                    <small id="jilsah-google-locationHelp" class="form-text text-muted">
                        رابط موقع الجلسة في قوقل ماب عشان تسهل وصول الناس للجلسة
                    </small>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-success" @click="check(3)" :disabled="!stepJilsahLocationErr">
                        حفظ ومتابعة
                    </button>
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
                    <jilsati-radio v-model="models.prices.pricePerJilsah" name="price-per" postfix="jilsah" val="1" checked>
                        السعر للجلسة
                    </jilsati-radio>
                    <jilsati-radio v-model="models.prices.pricePerJilsah" name="price-per" postfix="person" val="0">
                        السعر للشخص
                    </jilsati-radio>
                </div>

                <div v-if="chosenTimePeriods.school" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة الدراسة" font-size="1.1rem">

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ايـــام الاسبوع</span>
                                </div>
                                <input placeholder="السعر" :class="schoolWeekPriceErr"
                                       v-model.trim="models.prices.schoolWeek" type="text"
                                       aria-label="سعر الجلسة في فترة الدراسة ايام الاسبوع"
                                       class="form-control rounded-0">
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">نهاية الاسبوع</span>
                                </div>
                                <input placeholder="السعر" :class="schoolWeekendPriceErr"
                                       v-model.trim="models.prices.schoolWeekend" type="text"
                                       aria-label="سعر الجلسة في فترة الدراسة ايام نهاية الاسبوع"
                                       class="form-control rounded-0">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div v-if="chosenTimePeriods.vacation" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة الاجازة" font-size="1.1rem">

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">ايـــام الاسبوع</span>
                                </div>
                                <input placeholder="السعر" :class="vacationWeekPriceErr"
                                       v-model.trim="models.prices.vacationWeek" type="text"
                                       aria-label="سعر الجلسة في فترة الدراسة ايام الاسبوع"
                                       class="form-control rounded-0">
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">نهاية الاسبوع</span>
                                </div>
                                <input placeholder="السعر" :class="vacationWeekendPriceErr"
                                       v-model.trim="models.prices.vacationWeekend" type="text"
                                       aria-label="سعر الجلسة في فترة الدراسة ايام نهاية الاسبوع"
                                       class="form-control rounded-0">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div v-if="chosenTimePeriods.eid" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة الاعياد" font-size="1.1rem">
                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">خــلال الاسبوع</span>
                                </div>
                                <input placeholder="السعر" :class="eidPriceErr" v-model.trim="models.prices.eid"
                                       type="text" aria-label="سعر الجلسة في فترة الاعياد"
                                       class="form-control rounded-0">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div v-if="chosenTimePeriods.ramadan" class="mt-2">
                    <jilsati-fieldset legend="السعر لفترة رمضان" font-size="1.1rem">
                        <div class="mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend rounded-0">
                                    <span class="input-group-text rounded-0">خــلال الاسبوع</span>
                                </div>
                                <input placeholder="السعر" :class="ramadanPriceErr" v-model.trim="models.prices.ramadan"
                                       type="text" aria-label="سعر الجلسة في فترة رمضان" class="form-control rounded-0">
                            </div>
                        </div>
                    </jilsati-fieldset>
                </div>

                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(4)" :disabled="! stepJilsahPricesErr">
                        حفظ ومتابعة
                    </button>
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

                        <jilsati-card-show :title="models.jilsah.name"
                                           :city="models.location.city"
                                           :address="models.location.address"
                                           :description="models.jilsah.description"
                                           :img-src="models.jilsah.mainImage.src"
                                           :max-description-length="180"
                                           :options="models.options"
                                           :clients="models.jilsahClients"
                                           :types="models.jilsahType"
                                           :rating="5"
                                           :price="models.prices.schoolWeek"
                                           :price-per-jilsah="models.prices.pricePerJilsah">
                        </jilsati-card-show>
                    </div>
                </jilsati-fieldset>

                <jilsati-fieldset legend="صور الجلسة" font-size="1.3rem">
                    <div class="mt-2">
                        <jilsati-alert type="info">
                            اضيف صور الجلسة الاخرى
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
                        <div v-for="img in models.jilsahImages" class="card shadow-sm mb-2 col-lg-2 col-md-3 col-6"
                             style="max-width: 150px;">

                            <a :href="img.src" data-toggle="lightbox" data-gallery="jilsah-images">
                                <img :src="img.src" class="card-img" alt="صورة للجلسة" width="100" :title="img.name">
                            </a>

                            <button @click="handleRemoveJilsahImage(img.index)" type="button" class="close close-jilsah-image"
                                    aria-label="Close">
                                <span class="text-right text-danger" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </jilsati-fieldset>

                <div class="mt-4">
                    <button type="button" class="btn btn-success" @click="check(5)" :disabled="!stepJilsahImagesErr">حفظ
                        ومتابعة
                    </button>
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
                        <input maxlength="10" v-model.trim="models.social.phone" placeholder="05xxxxxxxx" type="tel"
                               aria-label="جوال التواصل" class="form-control rounded-0" :class="phoneErr">
                    </div>
                </div>

                <jilsati-fieldset class="mt-2" legend="روابط حسابات التواصل الاجتماعي" font-size="1.2rem">

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i
                                        class="fab fa-instagram"></i></span>
                            </div>
                            <input v-model.trim="models.social.instagram"
                                   placeholder="http://www.Instagram.com/username" type="url"
                                   aria-label="رابط حساب انستقرام" class="form-control rounded-0">
                        </div>
                    </div>

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i
                                        class="fab fa-facebook-f"></i></span>
                            </div>
                            <input v-model.trim="models.social.facebook" placeholder="http://www.facebook.com/username"
                                   type="url" aria-label="رابط حساب فيسبوك" class="form-control rounded-0">
                        </div>
                    </div>

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i
                                        class="fab fa-twitter"></i></span>
                            </div>
                            <input v-model.trim="models.social.twitter" placeholder="http://www.twitter.com/username"
                                   type="url" aria-label="رابط حساب تويتر" class="form-control rounded-0">
                        </div>
                    </div>

                    <div class="mt-2" dir="ltr">
                        <div class="input-group">
                            <div class="input-group-prepend rounded-0">
                                <span style="width:40px;" class="input-group-text rounded-0"><i
                                        class="fab fa-snapchat"></i></span>
                            </div>
                            <input v-model.trim="models.social.snapchat"
                                   placeholder="http://www.snapchat.com/add/username" type="url"
                                   aria-label="رابط حساب سناب شات" class="form-control rounded-0">
                        </div>
                    </div>

                </jilsati-fieldset>

                <div class="mt-2">
                    <button type="button" class="btn btn-success" @click="check(6)" :disabled="!stepJilsahConnectErr">حفظ ومتابعة</button>
                </div>
            </div>
        </jilsati-step>

        <div class="mt-2">
            <button @click="createNewJilsah" type="button" class="btn btn-success" :disabled="!createNewJilsahErr">انشاء جلسة جديدة</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                stepsInfo: [
                    {id: 'jilsah-info', state: 'primary', disabled: false},
                    {id: 'jilsah-times', state: 'secondary', disabled: true},
                    {id: 'jilsah-options', state: 'secondary', disabled: true},
                    {id: 'jilsah-location', state: 'secondary', disabled: true},
                    {id: 'jilsah-price', state: 'secondary', disabled: true},
                    {id: 'jilsah-photos', state: 'secondary', disabled: true},
                    {id: 'jilsah-connect', state: 'secondary', disabled: true},
                ],

                chosenTimePeriods: {
                    school: false,
                    vacation: false,
                    eid: false,
                    ramadan: false
                },

                jilsahShifts: {
                    schoolWeekShifts: 1,
                    schoolWeekendShifts: 1,

                    vacationWeekShifts: 1,
                    vacationWeekendShifts: 1,

                    eidShifts: 1,

                    ramadanShifts: 1
                },

                models: {
                    jilsah :{
                        name: undefined,
                        description: undefined,
                        mainImage: {name: 'upload-jilsah-image', src: '/images/upload-your-jilsah.png', org: true},
                    },
                    times: {
                        schoolWeek : {},
                        schoolWeekend : {},
                        vacationWeek : {},
                        vacationWeekend : {},
                        ramadanWeek : {},
                        eidWeek : {}
                    },
                    jilsahClients: [],
                    jilsahType: [],
                    options: [],
                    location : {
                        city: undefined,
                        address: undefined,
                        addressDetails: undefined,
                        googleMapUrl: undefined,
                        /**USED ONLY FOR SUBMIT**/
                        cityId : 0 ,
                        /**USED ONLY FOR SUBMIT**/
                    },
                    prices: {
                        pricePerJilsah : '',
                        schoolWeek: undefined,
                        schoolWeekend: undefined,
                        vacationWeek: undefined,
                        vacationWeekend: undefined,
                        eid: undefined,
                        ramadan: undefined
                    },
                    jilsahImages: [],
                    social: {
                        phone: undefined,
                        instagram: undefined,
                        facebook: undefined,
                        twitter: undefined,
                        snapchat: undefined
                    }
                },

                cities: [],

                /*****************/

                jilsahImagesCounter: 0,

                urlPattern : new RegExp('^(https?:\\/\\/)?'+ // protocol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                    '(\\#[-a-z\\d_]*)?$','i') // fragment locator
            }
        },

        methods: {
            check: function (step) {
                // to make the reactivity works
                Vue.set(this.stepsInfo[step], 'state', 'success');

                let vue = this;

                let jilsahStep = $('#' + this.stepsInfo[step].id);

                jilsahStep.collapse('hide');

                // make disabled to false so 'v-if' will be true
                // and step body content will appear
                // so the collapse show animation will be good
                if (step + 1 < vue.stepsInfo.length) {
                    Vue.set(vue.stepsInfo[step + 1], 'disabled', false);
                }

                // execute the code after the collapse event has finished
                // add the listener only once using -> one()
                jilsahStep.one('hidden.bs.collapse', function () {
                    if (step + 1 < vue.stepsInfo.length) {
                        Vue.set(vue.stepsInfo[step + 1], 'state', 'primary');

                        $('#' + vue.stepsInfo[step + 1].id).collapse('show');
                    }
                });
            },

            handleTimesChanged : function(name, timeObject){
                this.models.times[name] = timeObject;
            },

            handleMainImageChanged: function (file) {
                this.models.jilsah.mainImage = file;
            },

            handleAddNewJilsahImage: function (file) {
                this.models.jilsahImages.push({
                    index: this.jilsahImagesCounter,
                    name: file.name,
                    src: file.src,
                    file: file.file
                });

                this.jilsahImagesCounter++;
            },

            handleRemoveJilsahImage: function (index) {
                this.models.jilsahImages = this.models.jilsahImages.filter(img => img.index !== index);
            },

            validateModelText: function (model) {
                if (model === undefined) {
                    return ''
                } else if (!model) {
                    return 'is-invalid'
                } else {
                    return 'is-valid'
                }
            },

            validateModelNumber: function (model) {
                if (model === undefined) {
                    return ''
                } else if (!model || isNaN(model) || model < 0) {
                    return 'is-invalid'
                } else {
                    return 'is-valid'
                }
            },

            createNewJilsah : function () {
                let formData = new FormData();
                /*Jilsah information*/
                formData.append('name',this.models.jilsah.name);
                formData.append('description',this.models.jilsah.description);
                formData.append('main_image',this.models.jilsah.mainImage.file,this.models.jilsah.mainImage.name);
                formData.append('times',JSON.stringify(this.models.times,(k, v) => v === undefined ? null : v));
                /*jilsah client types information*/
                for(let i = 0; i< this.models.jilsahClients.length; i++)
                    formData.append('clients['+i+']',this.models.jilsahClients[i]);
                /*jilsah types information*/
                for(let i = 0; i< this.models.jilsahType.length; i++)
                    formData.append('types['+i+']',this.models.jilsahType[i]);
                /*jilsah options information*/
                for(let i = 0; i< this.models.options.length; i++)
                    formData.append('options['+i+']',this.models.options[i]);
                /*jilsah location information*/
                this.models.location.cityId = this.cities.find(c => c.name === this.models.location.city).id;
                formData.append('location',JSON.stringify(this.models.location,(k, v) => v === undefined ? null : v));
                /*jilsah prices information*/
                formData.append('prices',JSON.stringify(this.models.prices,(k, v) => v === undefined ? null : v));
                /*jilsah images information*/
                let images = this.models.jilsahImages.map(img => img.file);
                for(let i = 0; i< images.length; i++)
                    formData.append('images['+i+']',images[i]);
                /*jilsah socials information*/
                formData.append('socials',JSON.stringify(this.models.social,(k, v) => v === undefined ? null : v));

                let settings = { headers: { 'content-type': 'multipart/form-data' } };

                axios.post('/jilsahs',formData,settings)
                    .then(res => {
                        console.log('SUCCESS',res)
                    }).catch(err => {
                    console.log('ERROR',err.response)
                });
            }
        },

        computed: {
            /****INFO STEP****/

            nameErr: function () {
                return this.validateModelText(this.models.jilsah.name);
            },
            descriptionErr: function () {
                return this.validateModelText(this.models.jilsah.description);
            },
            stepJilsahInfoErr: function () {
                if (this.nameErr === 'is-valid' && this.descriptionErr === 'is-valid')
                    return true;
                else if (this.nameErr === 'is-invalid' || this.descriptionErr === 'is-invalid')
                    return false;
                else
                    return undefined;
            },

            /****TIMES STEP****/

            stepJilsahTimesErr: function () {
                return this.chosenTimePeriods.school || this.chosenTimePeriods.vacation || this.chosenTimePeriods.eid || this.chosenTimePeriods.ramadan;
            },

            /****OPTIONS STEP****/

            jilsahClientsErr: function () {
                if (this.models.jilsahClients.length) { // if not empty
                    return '';
                } else {
                    return 'border-danger text-danger';
                }
            },

            jilsahTypeErr: function () {
                if (this.models.jilsahType.length) { // if not empty
                    return '';
                } else {
                    return 'border-danger text-danger';
                }
            },

            stepJilsahOptionsErr: function () {
                if (this.jilsahClientsErr === '' && this.jilsahTypeErr === '')
                    return true;
                else if (this.jilsahClientsErr === 'border-danger text-danger' || this.jilsahTypeErr === 'border-danger text-danger')
                    return false;
                else
                    return undefined;
            },

            /****LOCATION STEP****/

            cityErr: function () {
                return this.validateModelText(this.models.location.city);
            },

            addressErr: function () {
                return this.validateModelText(this.models.location.address);
            },

            stepJilsahLocationErr: function () {
                if (this.cityErr === 'is-valid' && this.addressErr === 'is-valid')
                    return true;
                else if (this.cityErr === 'is-invalid' || this.addressErr === 'is-invalid')
                    return false;
                else
                    return undefined;
            },

            /****PRICES STEP****/

            schoolWeekPriceErr: function () {
                if (!this.chosenTimePeriods.school) {
                    return 'is-valid'
                } else {
                    return this.validateModelNumber(this.models.prices.schoolWeek);
                }
            },

            schoolWeekendPriceErr: function () {
                if (!this.chosenTimePeriods.school) {
                    return 'is-valid'
                } else {
                    return this.validateModelNumber(this.models.prices.schoolWeekend);
                }
            },

            vacationWeekPriceErr: function () {
                if (!this.chosenTimePeriods.vacation) {
                    return 'is-valid'
                } else {
                    return this.validateModelNumber(this.models.prices.vacationWeek);
                }
            },

            vacationWeekendPriceErr: function () {
                if (!this.chosenTimePeriods.vacation) {
                    return 'is-valid'
                } else {
                    return this.validateModelNumber(this.models.prices.vacationWeekend);
                }
            },

            eidPriceErr: function () {
                if (!this.chosenTimePeriods.eid) {
                    return 'is-valid'
                } else {
                    return this.validateModelNumber(this.models.prices.eid);
                }
            },

            ramadanPriceErr: function () {
                if (!this.chosenTimePeriods.ramadan) {
                    return 'is-valid'
                } else {
                    return this.validateModelNumber(this.models.prices.ramadan);
                }
            },

            stepJilsahPricesErr: function () {
                if (this.schoolWeekPriceErr === 'is-valid'
                    && this.schoolWeekendPriceErr === 'is-valid'
                    && this.vacationWeekPriceErr === 'is-valid'
                    && this.vacationWeekendPriceErr === 'is-valid'
                    && this.eidPriceErr === 'is-valid'
                    && this.ramadanPriceErr === 'is-valid')
                    return true;
                else if (this.schoolWeekPriceErr === 'is-invalid'
                    || this.schoolWeekendPriceErr === 'is-invalid'
                    || this.vacationWeekPriceErr === 'is-invalid'
                    || this.vacationWeekendPriceErr === 'is-invalid'
                    || this.eidPriceErr === 'is-invalid'
                    || this.ramadanPriceErr === 'is-invalid')
                    return false;
                else
                    return undefined;
            },

            /****IMAGES STEP****/

            mainImageErr: function () {
                if (this.models.jilsah.mainImage.org) {
                    return 'is-invalid'
                } else {
                    return 'is-valid'
                }
            },

            stepJilsahImagesErr: function () {
                return this.mainImageErr === 'is-valid';
            },

            /****CONNECT STEP****/

            phoneErr: function () {
                if (this.models.social.phone === undefined) {
                    return '';
                } else if (this.models.social.phone.startsWith('05')
                    && this.models.social.phone.length === 10
                    && !isNaN(this.models.social.phone)
                    && this.models.social.phone.search(/[.+\-]/) === -1) {
                    return 'is-valid'
                } else {
                    return 'is-invalid';
                }
            },

            stepJilsahConnectErr : function () {
                if(this.phoneErr === 'is-valid'){
                    return true;
                }else if(this.phoneErr === 'is-invalid'){
                    return false;
                }else{
                    return undefined;
                }
            },

            /****CREATE NEW JILSAH****/

            createNewJilsahErr : function () {
                return this.stepJilsahInfoErr
                    && this.stepJilsahTimesErr
                    && this.stepJilsahOptionsErr
                    && this.stepJilsahLocationErr
                    && this.stepJilsahPricesErr
                    && this.stepJilsahImagesErr
                    && this.stepJilsahConnectErr
            }
        },

        watch: {
            stepJilsahInfoErr: function (v) {
                if (v !== undefined) {
                    if (v) {
                        this.stepsInfo[0].state = 'success';
                    } else {
                        this.stepsInfo[0].state = 'danger';
                    }
                } else {
                    this.stepsInfo[0].state = 'primary';
                }
            },

            stepJilsahTimesErr: function (v) {
                if (v) {
                    this.stepsInfo[1].state = 'success';
                } else {
                    this.stepsInfo[1].state = 'danger';
                }
            },

            stepJilsahOptionsErr: function (v) {
                if (v !== undefined) {
                    if (v) {
                        this.stepsInfo[2].state = 'success';
                    } else {
                        this.stepsInfo[2].state = 'danger';
                    }
                } else {
                    this.stepsInfo[2].state = 'primary';
                }
            },

            stepJilsahLocationErr: function (v) {
                if (v !== undefined) {
                    if (v) {
                        this.stepsInfo[3].state = 'success';
                    } else {
                        this.stepsInfo[3].state = 'danger';
                    }
                } else {
                    this.stepsInfo[3].state = 'primary';
                }
            },

            stepJilsahPricesErr: function (v) {
                if (this.stepsInfo[4].disabled) {
                    return;
                }

                if (v !== undefined) {

                    if (v) {
                        this.stepsInfo[4].state = 'success';
                    } else {
                        this.stepsInfo[4].state = 'danger';
                    }
                } else {
                    this.stepsInfo[4].state = 'primary';
                }
            },

            stepJilsahConnectErr : function (v) {
                if (this.stepsInfo[6].disabled) {
                    return;
                }

                if (v !== undefined) {

                    if (v) {
                        this.stepsInfo[6].state = 'success';
                    } else {
                        this.stepsInfo[6].state = 'danger';
                    }
                } else {
                    this.stepsInfo[6].state = 'primary';
                }
            }
        },

        created() {
            axios.post('/jilsahs/cities')
                .then(res => {
                    this.cities = res.data;
                }).catch(err => {
                console.log(err.response)
            });
        }
    }
</script>