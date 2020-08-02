require('./bootstrap');

import Vue from 'vue';
import router from './router/index.js';
new Vue({
    router,
    mounted() {
        console.log('mounted');
    }
}).$mount('#app');