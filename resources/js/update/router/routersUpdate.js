import slideArea from '../components/slideArea.vue';
import productArea from '../components/productArea.vue';
import premiumArea from '../components/premiumArea.vue';
import allProductArea from '../components/allProductArea.vue';
import testimonialsArea from '../components/testimonialsArea.vue';
import servicesArea from '../components/servicesArea.vue';

import profileComponent from '../components/profile.vue';
import shopComponent from '../components/shop/shop.vue';
import shopContents from '../components/shop/shopComponent/shopContents.vue';

import loginArea from '../components/loginArea';
import registerArea from '../components/registerArea';

export const routesUpdate =
    {
        path: '/',
        name: 'home',
        components: {
            'slide-area':slideArea,
            'product-area':productArea,
            'premium-area':premiumArea,
            'all-product-area':allProductArea,
            'testimonials-area':testimonialsArea,
            'services-area':servicesArea
        }
    };
export const routesShop =
    {
        path: '/shop',
        component: shopComponent,
        children: [
            {path: '', component: shopContents},
            {path: ':category', component: shopContents}
        ]
    };
export const login =
    {
        path: '/login',
        component: loginArea
    };
export const register =
    {
        path: '/register',
        component: registerArea
    };
export const profile =
    {
        path: '/profile',
        component: profileComponent
    };
