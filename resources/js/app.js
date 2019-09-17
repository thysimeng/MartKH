require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueCarousel from 'vue-carousel';
import { routes } from './routes';
import Notifications from 'vue-notification';

import { mapGetters } from "vuex";
import modalQuickView from "./components/usersComponent/shopComponent/modalQuickView.vue";

//master component
import addTowishList from "./components/usersComponent/mastercomponent/addTowishList.vue";
import wishlistDisplay from "./components/usersComponent/mastercomponent/wishlistDisplay.vue";
// import nitification from "./components/usersComponent/mastercomponent/nitification.vue";

// Home
import productSearch from './components/usersComponent/search/productSearch.vue';
import productAll from "./components/usersComponent/homeComponent/productAll.vue";
import productFood from "./components/usersComponent/homeComponent/productCategories.vue";
import slideShow from "./components/usersComponent/homeComponent/slideShow.vue";


//Shop
import allProductDisplay from './components/usersComponent/shopComponent/allProductDisplay.vue';
import shopHomePage from './components/usersComponent/shopComponent/shopHomePage.vue';

// API reader
import store from './components/usersComponent/mainAPI/productsReader';

Vue.use(VueRouter);
Vue.use(VueCarousel);
Vue.use(Notifications);

const router = new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    data: {
        show: 1,
        showmodal: true,
        products: [],
        productshomecate: [],
        producthome: [],
        productid: [],
        productID: Number,
        shownitification: false
    },
    store,
    router,
    methods: {
        showPage() {
            return this.show = 2, this.products = []
        },
        showHomePage() {
            return this.show = true
        },
        quickView(PID, v, name, description) {
            return this.producthome.push(PID, v, name, description), this.showmodal = true;
        },
        datachange(){
            this.shownitification = true;
        }
    },
    components: {
        productSearch: productSearch,
        shopHomePage: shopHomePage,
        allProductDisplay: allProductDisplay,
        productFood: productFood,
        productAll: productAll,
        modalQuickView: modalQuickView,
        slideShow: slideShow,
        // Master component
        addTowishList: addTowishList,
        wishlistDisplay: wishlistDisplay
        // nitification: nitification
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
