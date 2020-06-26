// // Master componnent
// import addTowishList from './components/usersComponent/mastercomponent/addTowishList.vue';
// import wishlistDisplay from './components/usersComponent/mastercomponent/wishlistDisplay.vue';

// // Search component
// import productSearch from './components/usersComponent/search/productSearch.vue';

// // Home components
// import productAll from './components/usersComponent/homeComponent/productAll';

// // Shop Components
// import shopHomePage from './components/usersComponent/shopComponent/shopHomePage.vue';
// import shop from './components/usersComponent/shopComponent/shop.vue';
// import food from './components/usersComponent/shopComponent/food.vue';

//user profile
// import userProfile from './components/usersComponent/userProfile/userProfile.vue';

import {routesUpdate, routesShop, login, register, profile} from './routersUpdate';
import { wishlistRoutes } from './wishlist';

export const routes = [
    routesUpdate,
    routesShop,
    login,
    register,
    wishlistRoutes,
    profile
    // {
    //     path: '/users',
    //     components: {
    //         productSearch: productSearch,
    //         productAll: productAll,
    //         addTowishList: addTowishList
    //     }
    // },
    // {
    //     path: '/users/foodHome',
    //     components: {
    //         productSearch: productSearch,
    //         productAll: productAll,
    //         addTowishList: addTowishList
    //     }
    // },
    // {
    //     path: '/users/drinkHome',
    //     components: {
    //         productSearch: productSearch,
    //         productAll: productAll,
    //         addTowishList: addTowishList
    //     }
    // },
    // { path: '/products/:categories', component: shopHomePage },
    // {
    //     path: '/wishlists',
    //     components: {
    //         wishlistDisplay: wishlistDisplay,
    //     }
    // },
    // // {
    //     // path: '/users/profile',
    //     // components: {
    //         // productSearch: productSearch,
    //         // productAll: productAll,
    //         // addTowishList: addTowishList
    //     // }
    // // },
    // // {
    // //     path: '/users/shop',
    // //     components: {
    // //         shopHomePage: shopHomePage,
    // //         productSearch: productSearch,
    // //         shop: shop,
    // //         addTowishList: addTowishList
    // //     }
    // // },
    // // {
    // //     path: '/users/shop/foodVue',
    // //     components: {
    // //         productSearch: productSearch,
    // //         food: food,
    // //         addTowishList: addTowishList
    // //     }
    // // },
];
