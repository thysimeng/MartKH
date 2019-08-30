require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import {routes} from './routes';

import store from './components/usersComponent/mainAPI/productsReader';
import productSearch from './components/usersComponent/search/productSearch.vue';
import allProductDisplay from './components/usersComponent/shopComponent/allProductDisplay.vue';
Vue.use(VueRouter);

const router = new VueRouter({
  routes,
  mode: 'history'
})

const app = new Vue({
    el: '#app',
    data: {
        show: true,
        products: []
    },
    store,
    // food,
    router,
    methods:{
        showPage(){
            return this.show=false, this.products=[]
        },
        showHomePage(){
            return this.show=true
        }
    },
    components:{
        productSearch: productSearch,
        allProductDisplay: allProductDisplay
    }
});
