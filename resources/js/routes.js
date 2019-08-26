// Home components
import productPopularSender from './components/usersComponent/homeComponent/productPopularSender';
import productAll from './components/usersComponent/homeComponent/productAll';
import productFood from './components/usersComponent/homeComponent/productFood';
import productDrink from './components/usersComponent/homeComponent/productDrink';

// Shop Components
import shop from './components/usersComponent/shopComponent/shop.vue';
import food from './components/usersComponent/shopComponent/food.vue';

export const routes = [{
        path: '/users/shop',
        component: shop
    },
    {
        path: '/users/shop/foodVue',
        component: food
    },
    {
        path: '/users',
        components: {
            productPopularSender: productPopularSender,
            productAll: productAll,
            productFood: productFood
        },
        children: [{
            path: "/foodHome",
            name: 'food',
            component: productFood
        }]
    },
    {
        path: '/users/foodHome',
        components: {
            productPopularSender: productPopularSender,
            productAll: productAll,
            productFood: productFood
        }
    },
    {
        path: '/users/drinkHome',
        components: {
            productPopularSender: productPopularSender,
            productAll: productAll,
            productDrink: productDrink
        }
    }
    // { path: '/users/modalQuickView', component: modalQuickView },
    // { path: '/users/listView', component: listView},
    // { path: '/food', component: food, children:[
    //     {path: '', component: foodStart},
    //     {path: ':id', component: foodDetail},
    //     {path: ':id/edit', component: foodEdit, name: 'foodEdit'},
    // ] },
    // { path: '/drink', component: drink }
];
