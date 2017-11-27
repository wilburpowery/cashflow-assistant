import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import mutations from './mutations';

const store = new Vuex.Store({
    state: {
        user: null
    },
    mutations,
});

export default store;