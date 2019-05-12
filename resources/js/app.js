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

Vue.component('jilsati-navbar', require('./components/jilsati-navbar').default);

Vue.component('jilsati-city-search', require('./components/jilsati-city-search').default);

Vue.component('jilsati-card', require('./components/jilsati-card').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data : {
        istrahas : [
            {id:0,title:'شاليهات الواحة',description:'نةنةشنسىةنهىسنهشةىسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/ad_1.jpg'},
            {id:1,title:'شاليهات جدة',description:'نةنةشنسىةنهىسنهشةىسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/ad_1.jpg'},
            {id:2,title:'شاليهات هدر',description:'نةنةشنسىةنهىسنهشةىسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/ad_1.jpg'},
            {id:3,title:'شاليهات ابها',description:'نةنةشنسىةنهىسنهشةىسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/ad_1.jpg'},
            {id:4,title:'شاليهات دبي',description:'نةنةشنسىةنهىسنهشةىسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/ad_1.jpg'},
            {id:5,title:'شاليهات نننن',description:'نةنةشنسىةنهىسنهشةىسنشىةشسهنىخصنهىخنصصى',imgSrc:'images/ad_1.jpg'},
        ]
    },
});
