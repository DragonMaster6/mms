// Auth Pages
import LoginPage from './pages/admin/auth/login_page';

// User Pages
import UserPage from './pages/admin/users/user_page';

export default {
    mode: 'history',
    routes: [
        {path: "/", redirect: {name: "login"}}, 
        {path: "/login", name: "login", component: LoginPage },
        
        {path: "/user", name: "userProfile", component: UserPage}, 
    ]
}