export default {
    state: {
        user: {},
    },
    getters: {
        /** Retrieves the logged in user */
        getUser(state) {
            return localStorage.getObject('user');
        }
    },
    mutations: {
        setUser(state, user_data) {
            localStorage.setObject('user', user_data);
        },
    },
    actions: {

    },
    modules: {},
}