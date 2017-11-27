require('./bootstrap');

window.Vue = require('vue');

import router from './router';

Vue.component('application-layout', require('./layouts/ApplicationView.vue'));

import MenuSidebar from './components/MenuSidebar.vue';
import ActivitySidebar from './components/ActivitySidebar.vue';

const app = new Vue({
    el: '#app',
    components: {MenuSidebar, ActivitySidebar},
    router,
});
