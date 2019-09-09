import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import moment from 'moment'
import VueRouter from 'vue-router';

import routes from './routes';
import store from './store.js';

window.axios = require('axios');

Vue.component("vue-base-app", require("./Base.vue"));

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(moment);

const router = new VueRouter({ mode: 'history', routes: routes});

const app = new Vue({
    router,
    store: store,
}).$mount('#app');
