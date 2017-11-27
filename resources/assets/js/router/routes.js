import Dashboard from '../pages/Dashboard.vue';
import CashflowEntry from '../pages/CashflowEntry.vue';
import CashflowOut from '../pages/CashflowOut.vue';
import Error404 from '../pages/errors/Error404.vue';

const routes = [
    {
        path: '/',
        redirect: '/dashboard'
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/income',
        name: 'Income',
        component: CashflowEntry
    },
    {
        path: '/expenses',
        name: 'Expenses',
        component: CashflowOut
    },
    {
        path: '*',
        name: '404',
        component: Error404
    }
];

export default routes;