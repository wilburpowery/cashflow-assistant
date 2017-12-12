
const routes = [
    {
        path: '/',
        redirect: '/dashboard'
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: require('../pages/Dashboard.vue')
    },
    {
        path: '/income',
        name: 'incomes.index',
        component: require('../pages/incomes/Index.vue')
    },
    {
        path: '/income/create',
        name: 'income.create',
        component: require('../pages/incomes/Add.vue')
    },
    {
        path: '/incomes/:id',
        name: 'incomes.show',
        component: require('../pages/incomes/Show.vue'),
        props: true,
    },
    {
        path: '/expenses',
        name: 'Expenses',
        component: require('../pages/CashflowOut.vue')
    },
    {
        path: '/clients',
        name: 'clients.index',
        component: require('../pages/clients/Index.vue')
    },
    {
        path: '/clients/create',
        name: 'clients.create',
        component: require('../pages/clients/Create.vue')
    },
    {
        path: '/clients/:id',
        name: 'clients.show',
        component: require('../pages/clients/Show.vue'),
        props: true
    },
    {
        path: '/profile',
        name: 'Profile',
        component: require('../pages/Profile.vue')
    },
    {
        path: '/accounting',
        name: 'Accounting',
        component: require('../pages/Accounting.vue')
    },
    {
        path: '/settings',
        name: 'Settings',
        component: require('../pages/Settings.vue')
    },
    {
        path: '*',
        name: '404',
        component: require('../pages/errors/Error404.vue')
    }
];

export default routes;