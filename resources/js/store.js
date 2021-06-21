export default {
    state: {
        user: {},
    },
    getters: {
        /** Retrieves the logged in user */
        getUser(state) { return state.user; }
        // getUser(state) {
        //     return {
        //         user_id: state.user_id,
        //         username: state.username,
        //     }
        // },
        /** Determines if the user has a given permission */
        // hasPermission: ((state) => (permission) => {
        //     console.log("Permission: " . permission); 
        //     return state.permissions.find(perm => perm == permission);
        // }),
    },
    mutations: {
        setUser(state, user_data) {
            state.user = user_data;
        },
        // setUsername(state, value) {
        //     state.username = value;
        // },
        // setUserId(state, id) {
        //     state.user_id = id;
        // },
    },
    actions: {

    },
    modules: {},
}