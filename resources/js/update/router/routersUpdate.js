import slideArea from '../components/slideArea.vue';
import productArea from '../components/productArea.vue';
import premiumArea from '../components/premiumArea.vue';
import allProductArea from '../components/allProductArea.vue';
import testimonialsArea from '../components/testimonialsArea.vue';
import servicesArea from '../components/servicesArea.vue';

import shopComponent from '../components/shop/shop.vue';

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
        component: shopComponent
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
