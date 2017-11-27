import DashboardPage from '../pages/Dashboard.vue';
import CashflowEntryPage from '../pages/CashflowEntry.vue';
import CashflowOutPage from '../pages/CashflowOut.vue';
import ProfilePage from '../pages/Profile.vue';
import AccountingPage from '../pages/Accounting.vue';
import SettingsPage from '../pages/Settings.vue';
import Error404 from '../pages/errors/Error404.vue';

const routes = [
    {
        path: '/',
        redirect: '/dashboard'
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: DashboardPage
    },
    {
        path: '/income',
        name: 'Income',
        component: CashflowEntryPage
    },
    {
        path: '/expenses',
        name: 'Expenses',
        component: CashflowOutPage
    },
    {
        path: '/profile',
        name: 'Profile',
        component: ProfilePage
    },
    {
        path: '/accounting',
        name: 'Accounting',
        component: AccountingPage
    },
    {
        path: '/settings',
        name: 'Settings',
        component: SettingsPage
    },
    {
        path: '*',
        name: '404',
        component: Error404
    }
];

export default routes;