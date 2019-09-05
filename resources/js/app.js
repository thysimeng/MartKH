require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import { routes } from './routes';

import { mapGetters } from "vuex";
import modalQuickView from "./components/usersComponent/shopComponent/modalQuickView.vue";
// Home
import productSearch from './components/usersComponent/search/productSearch.vue';
import productAll from "./components/usersComponent/homeComponent/productAll.vue";
import productFood from "./components/usersComponent/homeComponent/productCategories.vue";


//Shop
import allProductDisplay from './components/usersComponent/shopComponent/allProductDisplay.vue';

// API reader
import store from './components/usersComponent/mainAPI/productsReader';

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    data: {
        show: true,
        showmodal: true,
        products: [],
        productshomecate: [],
        producthome: [],
        productid: [],
    },
    store,
    router,
    methods: {
        showPage() {
            return this.show = false, this.products = []
        },
        showHomePage() {
            return this.show = true
        },
        quickView(PID, v, name, description) {
            return this.producthome.push(PID, v, name, description), this.showmodal=true;
        },
    },
    components: {
        productSearch: productSearch,
        allProductDisplay: allProductDisplay,
        productFood: productFood,
        productAll: productAll,
        modalQuickView: modalQuickView
    },
    mounted() {
        this.$store.dispatch("fetchProductsFood");
    },
    computed: {
        ...mapGetters(["productsFoodHome"]),
        productsCategory() {
            return this.$store.getters.productsFoodHome;
        }
    },
});
