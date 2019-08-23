require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import {routes} from './routes';
// Test read data from DB
import store from './components/usersComponent/mainAPI/productsReader';
// import food from './components/usersComponent/homeComponent/productsFood';
// Vue.component('shopTest', require('./components/usersComponent/shop.vue').default)
// Vue.component('posts', require('./components/usersComponent/Posts.vue').default)
// Vue.component('createPost', require('./components/CreatePost.vue'))
// End Test read data from DB
Vue.use(VueRouter);


const router = new VueRouter({
  routes,
  mode: 'history'
})


const app = new Vue({
    el: '#app',
    store,
    // food,
    router
});
