// Master componnent
import addTowishList from './components/usersComponent/mastercomponent/addTowishList.vue';

// Search component
import productSearch from './components/usersComponent/search/productSearch.vue';

// Home components
import productAll from './components/usersComponent/homeComponent/productAll';

// Shop Components
import shop from './components/usersComponent/shopComponent/shop.vue';
import food from './components/usersComponent/shopComponent/food.vue';

export const routes = [
    {
        path: '/users',
        components: {
            productSearch: productSearch,
            productAll: productAll,
            addTowishList: addTowishList
        }
    },
    {
        path: '/users/foodHome',
        components: {
            productSearch: productSearch,
            productAll: productAll,
            addTowishList: addTowishList
        }
    },
    {
        path: '/users/drinkHome',
        components: {
            productSearch: productSearch,
            productAll: productAll,
            addTowishList: addTowishList
        }
    },
    {
        path: '/users/shop',
        components: {
            productSearch: productSearch,
            shop:shop,
            addTowishList: addTowishList
        }
    },
    {
        path: '/users/shop/foodVue',
        components: {
            productSearch: productSearch,
            food:food,
            addTowishList: addTowishList
        }
    },
];
