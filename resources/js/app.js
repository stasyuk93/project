require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);


import router from './routes';


const app = new Vue({
    router
}).$mount('#app');