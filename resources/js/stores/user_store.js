export default {
    namespaced: true,
    state: {
        user: {},
    },
    getters: {

    },
    mutations: {
        setUser(state, user_data) {
            state.user = user_data;
        }
    },
    actions: {

    }
}