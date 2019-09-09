import Vue from 'vue';
import Vuex from 'vuex';
import VueAxios from 'vue-axios';
import axios from 'axios';
import moment from 'moment'

window.axios = require('axios');

import store from './store.js';

Vue.component("vue-base-app", require("./Base.vue"));

Vue.use(VueAxios, axios);
Vue.use(moment);

const app = new Vue({
  store: store,
}).$mount('#app');
