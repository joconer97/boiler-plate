import Vue from "vue";
import VueRouter from "vue-router";
// import store from "./store";

import Sample from './views/Sample'
import Layout from './views/Layout'
import Login from './views/Login'
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    isExcactActive: true,
    isActive: true,
    routes: [{
        path: '/',
        component: Layout,
        children: [{
                path: '/',
                component: Sample,
                name: 'Sample'
            },
            {
                path: '/login',
                component: Login,
                name: 'Login'
            }
        ]
    }]
})


export default router;