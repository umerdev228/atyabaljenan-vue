require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import axios from 'axios'
import VueAxios from 'vue-axios'
import {routes} from './routes';
import Toasted from 'vue-toasted';
import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';
Vue.component('vue-phone-number-input', VuePhoneNumberInput);



let token = document.querySelector('meta[name="csrf-token"]');
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'XSRF-TOKEN': token.content
};

Vue.use(Toasted, { duration: 3000 })
Vue.use(VueRouter);
Vue.use(VueAxios, axios)

Vue.component('head-component', require('./components/front-end/includes/headComponent').default);
Vue.component('item-side', require('./components/front-end/home/item-side/itemSideComponent').default);
Vue.component('item-container', require('./components/front-end/containers/mainGridContainerComponent').default);
Vue.component('order-review', require('./components/front-end/order/reviewOrderComponent').default);

const router = new VueRouter(
    {
        mode: 'history',
        routes: routes
    }
);

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});