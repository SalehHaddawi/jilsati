/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import VueTinyLazyloadImg from 'vue-tiny-lazyload-img'
Vue.use(VueTinyLazyloadImg);

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
Vue.component('JilsatiNav', require('./components/jilsati-nav').default);
Vue.component('JilsatiCitySearch', require('./components/jilsati-city-search').default);
Vue.component('JilsatiCard', require('./components/jilsati-card').default);
Vue.component('JilsatiCardShow', require('./components/jilsati-card-show').default);
Vue.component('JilsatiCarousel', require('./components/jilsati-carousel').default);
Vue.component('JilsatiCheckbox',require('./components/jilsati-checkbox').default);
Vue.component('JilsatiRadio',require('./components/jilsati-radio').default);
Vue.component('JilsatiAlert',require('./components/jilsati-alert').default);
Vue.component('JilsatiIstrahaProps',require('./components/jilsati-istraha-props').default);
Vue.component('JilsatiAddJilsahCollapse',require('./components/jilsati-add-jilsah-collapse').default);
Vue.component('JilsatiStep',require('./components/jilsati-step').default);
Vue.component('JilsatiStepper',require('./components/jilsati-stepper').default);
Vue.component('JilsatiTimePicker',require('./components/jilsati-time-picker').default);
Vue.component('JilsatiSelect',require('./components/jilsati-select').default);
Vue.component('JilsatiFieldset',require('./components/jilsati-fieldset').default);
Vue.component('JilsatiFileChooser',require('./components/jilsati-file-chooser').default);
Vue.component('JilsatiTest',require('./components/jilsati-test').default);
Vue.component('Star', require('./components/star').default);
Vue.component('StarRating', require('./components/star-rating').default);
Vue.component('JilsatiShifts', require('./components/jilsati-shifts').default);
Vue.component('JilsatiMainPanel', require('./components/jilsati-main-panel').default);
Vue.component('JilsatiConnectionsPanel', require('./components/jilsati-connections-Panel').default);
Vue.component('JilsatiPricesPanel', require('./components/jilsati-prices-Panel').default);
Vue.component('JilsatiTimesPanel', require('./components/jilsati-times-Panel').default);
Vue.component('JilsatiActionPanel', require('./components/jilsati-action-panel').default);
Vue.component('JilsatiCommentsPanel', require('./components/jilsati-comments-panel').default);
Vue.component('JilsatiLocationPanel', require('./components/jilsati-location-Panel').default);
Vue.component('JilsatiPropertiesPanel', require('./components/jilsati-properties-panel').default);
Vue.component('JilsatiCurrentPricePanel', require('./components/jilsati-current-price-panel').default);
Vue.component('JilsatiCurrentTimePanel', require('./components/jilsati-current-time-panel').default);
Vue.component('JilsatiJilsahDetailsTabs',require('./components/jilsati-jilsah-details-tabs').default);
Vue.component('JilsatiModal',require('./components/jilsati-modal').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
});
