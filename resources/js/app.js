
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios'
import VueAxios from 'vue-axios'


window.Vue = require('vue');
Vue.use(VueAxios, axios);

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/TableBillComponent.vue -> <example-component></example-component>
 */

Vue.component('header-bill-component', require('./components/HeaderBillComponent.vue'));
Vue.component('table-bill-component', require('./components/TableBillComponent.vue'));
Vue.component('table-car-component', require('./components/TableCarComponent.vue'));
Vue.component('pending-order-component', require('./components/PendingOrderComponent.vue'));
Vue.component('pending-order-table-component', require('./components/PendingOrderTableComponent.vue'));
Vue.component('pending-order-car-component', require('./components/PendingOrderCarComponent.vue'));
Vue.component('table-load-order', require('./components/TableLoadOrder.vue'));
Vue.component('table-old-load', require('./components/TableOldLoad.vue'));
Vue.component('table-cars-pending', require('./components/TablePending.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
