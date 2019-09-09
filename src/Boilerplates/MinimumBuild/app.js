import Vue from 'vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import moment from 'moment'

window.axios = require('axios');

Vue.component("ruet-app", require("./Base.vue"));

Vue.use(VueAxios, axios);
Vue.use(moment);

const app = new Vue({
}).$mount('#app');
