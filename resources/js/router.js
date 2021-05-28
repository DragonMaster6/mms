// Import the various pages
import LoginPage from './pages/admin/auth/login_page';

export default {
    mode: 'history',
    routes: [
        {path: "/login", name: "login", component: LoginPage }, 
    ]
}