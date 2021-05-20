import Vue from 'vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import router from './router.js'
import App from './components/App.vue'

Vue.use(ElementUI)

const app = new Vue({
    el: '#app',
    components: { App },
    router
});
