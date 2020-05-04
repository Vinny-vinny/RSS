/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue');
import Vuetify from 'vuetify';
import "vuetify/dist/vuetify.min.css";
import VueToastr from 'vue-toastr';

Vue.use(Vuetify);
Vue.use(VueToastr);
import moment from 'moment'
import JsonExcel from 'vue-json-excel'
import VueHtmlToPaper from 'vue-html-to-paper'
const options = {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes'
    ],
    styles: [
        'assets/css/bootstrap.min.css',
        'assets/css/kidlat.css'
    ]
}

Vue.use(VueHtmlToPaper, options);

Vue.component('downloadExcel', JsonExcel)

Vue.config.productionTip = false
Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY hh:mm')
    }
});
import VueEvents from 'vue-events'
Vue.use(VueEvents)

Vue.component('filter-bar', FilterBar);

import User from './helpers/User';
window.User = User;

Vue.filter('currency', function(value) {
    let formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'KES',
        minimumFractionDigits: 0
    });
    return formatter.format(value);
});
Vue.filter('number', function(value) {
    return new Intl.NumberFormat().format(value)
});

Vue.filter('str_limit', function (value, size) {
    if (!value) return '';
    value = value.toString();

    if (value.length <= size) {
        return value;
    }
    return value.substr(0, size) + '...';
});


import Exception from "./helpers/Exception";
window.Exception = Exception;

import 'vue-search-select/dist/VueSearchSelect.css';
import 'vue-multiselect/dist/vue-multiselect.min.css';
import '@mdi/font/css/materialdesignicons.css'


import router from './routes/router';
import store from "./store/store";
import FilterBar from "./components/filters/FilterBar";

router.beforeEach((to, from, next) => {
    store.dispatch('pathTo',to.path);
    next();
});
window.eventBus = new Vue();
window.axios = require('axios');
axios.defaults.baseURL =process.env.MIX_BASE_URL+'/api/';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
window.base_url = axios.defaults.baseURL;
window.site_url = process.env.MIX_BASE_URL;
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-home', require('./components/layouts/AppHome').default);
Vue.component('app-footer', require('./components/layouts/AppFooter').default);
Vue.component('app-sidebar', require('./components/layouts/AppSidebar').default);
Vue.component('app-top-nav', require('./components/layouts/AppTopNav').default);
Vue.component('front-header', require('./components/layouts/front/Header').default);
Vue.component('front-footer', require('./components/layouts/front/Footer').default);
Vue.component('front-top-header', require('./components/layouts/front/TopHeader').default);
Vue.component('front-banner', require('./components/layouts/front/Banner').default);
Vue.component('front-features', require('./components/layouts/front/Features').default);
Vue.component('front-featured-jobs', require('./components/layouts/front/FeaturedJobs').default);
Vue.component('front-jobpost', require('./components/layouts/front/JobPostArea').default);
Vue.component('front-single-banner', require('./components/front/single/Banner').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify: new Vuetify()

});
