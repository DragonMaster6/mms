require('./bootstrap');

import Vue from "vue"
import Vuex from "vuex"
// import VueRouter from "vue-router"

import AppRoutes from "./router.js"
import AppStore from "./store.js"

// Vue.use(Vuex);
// Vue.use(VueRouter);

// const router = new VueRouter(AppRoutes);
// const store = new Vuex.Store(AppStore);

////////////////
// Directives //
////////////////
// Todo: Come revisit this as there might be some potential here
// /** Determines if a user is allowed to interact with an action */
// Vue.directive('can', function(el, bindings, vnode){
//     if (!store.getters.hasPermission(bindings.value)) {
//         commentNode(el, vnode);
//     }
// });
Vue.prototype.$can = permission => store.getters.hasPermission(permission);

const app = new Vue({
    el: "#app",
    router: AppRoutes,
    store: AppStore,
    template: "<router-view></router-view>",
})