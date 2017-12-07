import DashboardPage from '../pages/Dashboard.vue';
import CashflowEntryPage from '../pages/CashflowEntry.vue';
import IncomeCreatePage from '../pages/incomes/Add.vue';
import CashflowOutPage from '../pages/CashflowOut.vue';
import ClientsIndexPage from '../pages/clients/Index.vue';
import ClientsCreatePage from '../pages/clients/Create.vue';
import ClientsShowPage from '../pages/clients/Show.vue';
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
        name: 'incomes.index',
        component: CashflowEntryPage
    },
    {
        path: '/income/create',
        name: 'income.create',
        component: IncomeCreatePage
    },
    {
        path: '/expenses',
        name: 'Expenses',
        component: CashflowOutPage
    },
    {
        path: '/clients',
        name: 'clients.index',
        component: ClientsIndexPage
    },
    {
        path: '/clients/create',
        name: 'clients.create',
        component: ClientsCreatePage
    },
    {
        path: '/clients/:id',
        name: 'clients.show',
        component: ClientsShowPage,
        props: true
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