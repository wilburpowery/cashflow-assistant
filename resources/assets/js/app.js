require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex);

import router from './router';
import store from './store';

Vue.component('application-layout', require('./layouts/ApplicationView.vue'));
Vue.component('registration-form', require('./components/Auth/Register.vue'));

import MenuSidebar from './components/MenuSidebar.vue';
import ActivitySidebar from './components/ActivitySidebar.vue';

const app = new Vue({
    created() {
        this.$store.commit('setUser', window.App.user);
    },
    el: '#app',
    components: {MenuSidebar, ActivitySidebar},
    router,
    store: store
});
