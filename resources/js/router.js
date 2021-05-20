import Vue from 'vue'
import VueRouter from 'vue-router'

import SearchForm from './components/pages/SearchForm.vue'

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: SearchForm
        },
    ],
});
