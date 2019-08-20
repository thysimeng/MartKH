import shop from './components/usersComponent/shop.vue';
import food from './components/usersComponent/food.vue';

export const routes = [
    { path: '/users/shop', component: shop},
    { path: '/users/food', component: food },
    // { path: '/users/modalQuickView', component: modalQuickView },
    // { path: '/users/listView', component: listView},
    // { path: '/food', component: food, children:[
    //     {path: '', component: foodStart},
    //     {path: ':id', component: foodDetail},
    //     {path: ':id/edit', component: foodEdit, name: 'foodEdit'},
    // ] },
    // { path: '/drink', component: drink }
  ];
