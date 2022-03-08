require('./bootstrap');
import Vue from 'vue';
import ElementUI from 'element-ui';

import {store} from './store/store.js';
import 'element-ui/lib/theme-chalk/index.css';

import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

// configure language
locale.use(lang)
window.Vue = require('vue').default;

Vue.use(ElementUI);

Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('subject-component', require('./components/Subject/SubjectComponent.vue').default);
Vue.component('subject-table-component', require('./components/Subject/SubjectTableComponent.vue').default);
Vue.component('login', require('./components/Login.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#vue-app',
});
