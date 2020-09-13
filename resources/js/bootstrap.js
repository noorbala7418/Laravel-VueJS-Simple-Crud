import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import _ from 'lodash';


window.axios = axios;
window._ = _;
window.Vue = Vue;
Vue.use(VueRouter);
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}



window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

