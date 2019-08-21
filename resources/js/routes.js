// Home components
import productPopular from './components/usersComponent/homeComponent/productPopular';
import productAll from './components/usersComponent/homeComponent/productAll';
import productFood from './components/usersComponent/homeComponent/productFood';
import productDrink from './components/usersComponent/homeComponent/productDrink';

// Shop Components
import shop from './components/usersComponent/shopComponent/shop.vue';
import food from './components/usersComponent/shopComponent/food.vue';

export const routes = [
    { path: '/users/shop', component: shop },
    { path: '/users/foodVue', component: food },
    {
        path: '/users', components: {
            productPopular: productPopular,
            productAll: productAll,
            productFood: productFood
        },
        children:[
            {path:"/foodHome", name: 'food', component: productFood}
        ]
    },
    {
        path: '/users/foodHome', components: {
            productPopular: productPopular,
            productAll: productAll,
            productFood: productFood
        }
    },
    {
        path: '/users/drinkHome', components: {
            productPopular: productPopular,
            productAll: productAll,
            productDrink: productDrink
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
