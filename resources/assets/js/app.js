require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex);

import router from './router';
import store from './store';

Vue.component('application-layout', require('./layouts/ApplicationView.vue'));
Vue.component('registration-form', require('./components/Auth/Register.vue'));
Vue.component('back-button', require('./components/BackButton.vue'));

import MenuSidebar from './components/MenuSidebar.vue';
import ActivitySidebar from './components/ActivitySidebar.vue';

// Add the router to every vue instance.
Vue.prototype.router = router;

Vue.prototype.goBack = () => {
    router.go(-1);
};

const app = new Vue({
    created() {
        this.$store.commit('setUser', window.App.user);
    },
    el: '#app',
    components: {MenuSidebar, ActivitySidebar},
    router,
    store: store
});
