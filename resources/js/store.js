import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: {},
        test: '',
    },
    getters: {
        /** Retrieves the logged in user */
        getUser(state) {
            return localStorage.getObject('user');
        },
        test(state) { return state.test },
    },
    mutations: {
        setUser(state, user_data) {
            localStorage.setObject('user', user_data);
        },
        setTest(state, data) { state.test = data; }
    },
    actions: {

    },
    modules: {},
});

export default store;