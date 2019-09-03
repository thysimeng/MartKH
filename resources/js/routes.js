// Search component
import productSearch from './components/usersComponent/search/productSearch.vue';

// Home components
import productPopularSender from './components/usersComponent/homeComponent/productPopularSender';
import productAll from './components/usersComponent/homeComponent/productAll';
import productFood from './components/usersComponent/homeComponent/productFood';
import productDrink from './components/usersComponent/homeComponent/productDrink';

// Shop Components
import shop from './components/usersComponent/shopComponent/shop.vue';
import food from './components/usersComponent/shopComponent/food.vue';
import searchResult from './components/usersComponent/shopComponent/searchResult.vue';

export const routes = [
    {
        path: '/search',
        components:{
            productSearch: productSearch,
            productPopularSender: productPopularSender,
            productAll: productAll,
            productFood: productFood
        }
    },
    {
        path: '/users',
        components: {
            productSearch: productSearch,
            productPopularSender: productPopularSender,
            productAll: productAll,
            productFood: productFood
        }
    },
    {
        path: '/users/foodHome',
        components: {
            productSearch: productSearch,
            productPopularSender: productPopularSender,
            productAll: productAll,
            productFood: productFood
        }
    },
    {
        path: '/users/drinkHome',
        components: {
            productSearch: productSearch,
            productPopularSender: productPopularSender,
            productAll: productAll,
            productDrink: productDrink
        }
    },
    {
        path: '/users/shop',
        components: {
            productSearch: productSearch,
            shop:shop
        }
    },
    {
        path: '/users/shop/foodVue',
        components: {
            productSearch: productSearch,
            food:food
        }
    },
    // { path: '/users/modalQuickView', component: modalQuickView },
    // { path: '/users/listView', component: listView},
    // { path: '/food', component: food, children:[
    //     {path: '', component: foodStart},
    //     {path: ':id', component: foodDetail},
    //     {path: ':id/edit', component: foodEdit, name: 'foodEdit'},
    // ] },
    // { path: '/drink', component: drink }
];
