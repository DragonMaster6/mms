import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersist from 'vuex-persist'

import UserStore from './stores/user_store'

Vue.use(Vuex);

const vueStorage = new VuexPersist({
    storage: window.sessionStorage,
    modules: ['users'],
});

const store = new Vuex.Store({
    modules: {
        users: UserStore,
    },
    plugins: [vueStorage.plugin],
});

export default store;