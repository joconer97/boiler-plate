require('./bootstrap');

import Vue from 'vue';
import router from './router';
import store from './vuex/index'
import vuetify from './plugins/vuetify';


new Vue({
    router,
    vuetify,
    store
}).$mount('#app')