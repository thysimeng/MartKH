require('./bootstrap');
// start Update section
window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueCarousel from 'vue-carousel';
import { routes } from './update/router/routes';
import Notifications from 'vue-notification';
import VueProgressBar from 'vue-progressbar'
import { mapGetters } from "vuex";
// end Update section

import modalQuickView from "./components/usersComponent/shopComponent/modalQuickView.vue";
//master component
import addTowishList from "./components/usersComponent/mastercomponent/addTowishList.vue";
import wishlistDisplay from "./components/usersComponent/mastercomponent/wishlistDisplay.vue";
// import nitification from "./components/usersComponent/mastercomponent/nitification.vue";
// Home
import productSearch from './components/usersComponent/search/productSearch.vue';
import productAll from "./components/usersComponent/homeComponent/productAll.vue";
import productFood from "./components/usersComponent/homeComponent/productCategories.vue";
// import slideShow from "./components/usersComponent/homeComponent/slideShow.vue";


//Shop
import allProductDisplay from './components/usersComponent/shopComponent/allProductDisplay.vue';
import shopHomePage from './components/usersComponent/shopComponent/shopHomePage.vue';


// start Update section
// API reader
import store from './update/store/productsReader';

import mainHeader from './update/components/mainHeader.vue';
import footerArea from './update/components/footerArea.vue';
import modalArea from './update/components/modal.vue';
import modalCompare from './update/components/modalCompare.vue';
//end update section

Vue.use(VueRouter);
Vue.use(VueCarousel);
Vue.use(Notifications);
Vue.use(VueProgressBar, {
    color: 'blue',
    failedColor: 'red',
    height: '2px'
  })

// start update section

// end update section

const router = new VueRouter({
    routes,
    mode: 'history'
})
// end Update section

const app = new Vue({
    el: '#app',
    data: {
        show: 1,
        showmodal: true,
        products: [],
        productsshop: [],
        productshomecate: [],
        producthome: [],
        productid: [],
        productID: Number,
        shownitification: false,
        templateid: 1
    },
    // start Update section
    store,
    router,
    // end Update section
    methods: {
        showPage() {
            return this.show = 2, this.products = []
        },
        showHomePage() {
            return this.show = true
        },
        quickView(PID, image, name, description, price) {
            return this.producthome.push(PID, image, name, description, price), this.showmodal = true;
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
        // slideShow: slideShow,
        // Master component
        addTowishList: addTowishList,
        wishlistDisplay: wishlistDisplay,
        // nitification: nitification

        // start Update section
        mainHeader,
        footerArea,
        modalArea,
        modalCompare
        // end Update section
    },
    mounted() {
        this.$store.dispatch("fetchProductsFood");
    },
    computed: {
        ...mapGetters(["productsFoodHome"]),
        productsCategory() {
            this.products=this.productsShop;
            return this.$store.getters.productsFoodHome;
        },
        templateID() {
            let currentObj = this;
            axios
              .get("/setTemplateID", {})
              .then(function(response) {
                currentObj.templateid = response.data;
              })
              .catch(function(error) {
                currentObj.templateid = error;
              });
          }
    },

});
