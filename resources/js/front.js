window.Vue = require('vue');

window.axios = require('axios');
// copia da bootstrap.js
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import App from './views/App';

// aggiungo per poter usare vue router
import router from './router';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});