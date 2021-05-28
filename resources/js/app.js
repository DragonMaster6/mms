require('./bootstrap');

import Vue from "vue"
import VueRouter from "vue-router"

import AppRoutes from "./router.js"

Vue.use(VueRouter);

const router = new VueRouter(AppRoutes);

const app = new Vue({
    el: "#app",
    router,
    mounted() {
        this.$router.replace({name:"login"});
    }
})