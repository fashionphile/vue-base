import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import moment from 'moment'

window.axios = require('axios');

import routes from './routes';

Vue.component("ruet-app", require("./Base.vue"));

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(moment);

const router = new VueRouter({ mode: 'history', routes: routes});

const app = new Vue({
  router
}).$mount('#app');
