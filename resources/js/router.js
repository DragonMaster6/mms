import Vue from 'vue'
import VueRouter from 'vue-router'
import AppStore from './store.js'

Vue.use(VueRouter);

// Auth Pages
import LoginPage from './pages/admin/auth/login_page';

// Layouts
import AdminLayout from './pages/admin/index_page';

// User Pages
import UserPage from './pages/admin/users/user_page';

const routes = [
    {path: "/", redirect: {name: "login"}}, 
    {
        path: "/login", name: "login", component: LoginPage,
        beforeEnter: (to, from, next) => {
            // Prevent the user from logging in again
            if (!_(AppStore.state.users.user).isEmpty()) {
                next({name: 'userProfile'});
            } else {
                next();
            }
        }
    },
    {
        path: "/admin",
        component: AdminLayout,
        meta: {requiresAuth: true},
        children: [
            { path: "user", name: "userProfile", component: UserPage, },
        ]
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
})

///////////////////
// Router Guards //
///////////////////

// Check if the user needs to be logged in or not
router.beforeEach((to, from, next) => {
    if (to.matched.some(route => route.meta.requiresAuth)) {
        console.log("Router Guard");
        console.log(AppStore.state.users.user);
        if (_(AppStore.state.users.user).isEmpty()) {
            console.log("User needs to login, redirecting");
            next({name: 'login'});
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;