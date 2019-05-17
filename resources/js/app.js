/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('JilsatiNavbar', require('./components/jilsati-navbar').default);
Vue.component('JilsatiCitySearch', require('./components/jilsati-city-search').default);
Vue.component('JilsatiCard', require('./components/jilsati-card').default);
Vue.component('JilsatiCheckbox',require('./components/jilsati-checkbox').default);
Vue.component('JilsatiAlert',require('./components/jilsati-alert').default);
Vue.component('JilsatiIstrahaProps',require('./components/jilsati-istraha-props').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.config.devtools = true

const app = new Vue({
    el: '#app',

    data : {
        istrahas : [
            {id:0,city:'الرياض',title:'شاليهات الواحة',description:'نةنةشنسىةنهىسنهشةىسنشىةشسهنىمكبنورحيكثقونبلثبيقنخةولخثقبةلثسيبةتثيقبهةتنبقثهةتخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:1,city:'مكة المكرمة',title:'شاليهات جدة',description:'نةنةشنسىةنهىسنهشةىسنشىةشسمنثقبي ةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقبهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:2,city:'ينبع البحر',title:'شاليهات هدر',description:'نةنةشنسىةنهىسةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقنهشةىسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:3,city:'الطائف',title:'شاليهات ابها',description:'نةنةشنسىةنهىسنهشةىسنةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقشىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:4,city:'راس تنورة',title:'شاليهات دبي',description:'نةنةشنسىةنهىسنهشةىةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:5,city:'الخبر',title:'شاليهات نننن',description:'نةنةشنسىةنهىسنهشةىسنشةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:6,city:'المدينة المنورة',title:'شاليهات نننن',description:'نةنةشنسىةنهىسنهشةىسنشةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:7,city:'الرياض',title:'شاليهات نننن',description:'نةنةشنسىةنهىسنهشةىسنشةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:8,city:'جدة',title:'شاليهات نننن',description:'نةنةشنسىةنهىسنهشةىسنشةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:9,city:'الدوادمي',title:'شاليهات نننن',description:'نةنةشنسىةنهىسنهشةىسنشةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
            {id:10,city:'الأفلاج',title:'شاليهات نننن',description:'نةنةشنسىةنهىسنهشةىسنشةسنميوبة ىيسنمقبث ىبمسنيقتى بنتةوسيى قبنوتةسى يصقىةشسهنىخصنهىخنصصى',imgSrc:'images/istraha.jpg'},
        ]
    },
});
