// Search component
import productSearch from './components/usersComponent/search/productSearch.vue';

// Home components
import productPopularSender from './components/usersComponent/homeComponent/productPopularSender';
import productAll from './components/usersComponent/homeComponent/productAll';

// Shop Components
import shop from './components/usersComponent/shopComponent/shop.vue';
import food from './components/usersComponent/shopComponent/food.vue';

export const routes = [
    {
        path: '/users',
        components: {
            productSearch: productSearch,
            productPopularSender: productPopularSender,
            productAll: productAll,
        }
    },
    {
        path: '/users/foodHome',
        components: {
            productSearch: productSearch,
            productPopularSender: productPopularSender,
            productAll: productAll,
        }
    },
    {
        path: '/users/drinkHome',
        components: {
            productSearch: productSearch,
            productPopularSender: productPopularSender,
            productAll: productAll,
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
];
