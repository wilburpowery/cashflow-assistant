require('./bootstrap');
require('bootstrap-toggle/js/bootstrap-toggle.min.js');

window.Vue = require('vue');
import Vuex from 'vuex';
import Vuelidate from 'vuelidate';
import Chart from 'chart.js';

window.Chart = Chart;

Vue.use(Vuelidate)

Vue.use(Vuex);

window.moment = require('moment');

window.accounting = require('accounting');

import router from './router';
import store from './store';
import MenuSidebar from './components/MenuSidebar.vue';
import ActivitySidebar from './components/ActivitySidebar.vue';
import vSelect from 'vue-select';
import Datepicker from 'vue-bootstrap-datetimepicker';


Vue.component('application-layout', require('./layouts/ApplicationView.vue'));
Vue.component('registration-form', require('./components/Auth/Register.vue'));
Vue.component('back-button', require('./components/BackButton.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('vSelect', vSelect);
Vue.component('date-picker', Datepicker);
Vue.component('v-toggle', require('./components/vToggle.vue'));

// Global Event Bus
window.Events = new Vue();

// Add the router to every vue instance.
Vue.prototype.router = router;

Vue.prototype.goBack = () => {
    router.go(-1);
};

Vue.prototype.isAdmin = window.App.user ? window.App.user.is_admin : false;
    
import {Alert} from './utilities';
Vue.prototype.Alert = Alert;

const app = new Vue({
    created() {
        this.$store.commit('setUser', window.App.user);
    },
    el: '#app',
    components: {MenuSidebar, ActivitySidebar},
    router,
    store: store
});
