<template>
    <div :class="{'menu-style-2 furniture-menu menu-hover':navbar, 'mobile-menu':mobileNavbar}">
        <div v-show="false">{{fetchData}}{{ fetchDataSubCategory }}</div>
        <nav v-if="navbar==true" >
            <ul>
                <li><router-link to="/">home</router-link>
                    <!-- <ul class="single-dropdown">
                        <li><a href="index.html">Fashion</a></li>
                        <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                        <li><a href="index-fruits.html">fruits</a></li>
                        <li><a href="index-book.html">book</a></li>
                        <li><a href="index-electronics.html">electronics</a></li>
                        <li><a href="index-electronics-2.html">electronics style 2</a></li>
                        <li><a href="index-food.html">food & drink</a></li>
                        <li><a href="index-furniture.html">furniture</a></li>
                        <li><a href="index-handicraft.html">handicraft</a></li>
                        <li><a target="_blank" href="index-smart-watch.html">smart watch</a></li>
                        <li><a href="index-sports.html">sports</a></li>
                    </ul> -->
                </li>
                <!-- <li><a href="#">pages</a>
                    <ul class="single-dropdown">
                        <li><a href="about-us.html">about us</a></li>
                        <li><a href="menu-list.html">menu list</a></li>
                        <li><a href="login.html">login</a></li>
                        <li><a href="register.html">register</a></li>
                        <li><a href="cart.html">cart page</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="wishlist.html">wishlist</a></li>
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </li> -->
                <li><router-link to="/shop/all">shop</router-link>
                    <div class="category-menu-dropdown shop-menu">
                        <div v-for="(category, index) in categories" :key="category.key" class="category-dropdown-style category-common2 mb-30">
                            <router-link :to="/shop/+category.categories_name"><h4 v-if="index<2" class="categories-subtitle"> {{ category.categories_name }}</h4></router-link>

                            <ul v-for="(subcategory) in subcategories" :key="subcategory.key" >
                                <li v-if="category.id==subcategory.category_id"><router-link :to="'/shop/'+subcategory.subcategory_name"> {{subcategory.subcategory_name}}  {{ subcategory.count }}</router-link></li>
                                <!-- <li v-if="subindex==3&&category.count>3"><a href="shop-grid-2-col.html"> See more</a></li> -->
                            </ul>
                        </div>
                        <!-- <div class="category-dropdown-style category-common2 mb-30">
                            <h4 class="categories-subtitle"> shop layout</h4>
                            <ul>
                                <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                <li><a href="shop.html">grid 4 column</a></li>
                                <li><a href="shop-grid-box.html">grid box style</a></li>
                                <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                <li><a href="shop-list-box.html">list box style</a></li>
                                <li><a href="cart.html">shopping cart</a></li>
                                <li><a href="wishlist.html">wishlist</a></li>
                            </ul>
                        </div>
                        <div class="category-dropdown-style category-common2 mb-30">
                            <h4 class="categories-subtitle"> product details</h4>
                            <ul>
                                <li><a href="product-details.html">tab style 1</a></li>
                                <li><a href="product-details-2.html">tab style 2</a></li>
                                <li><a href="product-details-3.html"> tab style 3</a></li>
                                <li><a href="product-details-4.html">sticky style</a></li>
                                <li><a href="product-details-5.html">sticky style 2</a></li>
                                <li><a href="product-details-6.html">gallery style</a></li>
                                <li><a href="product-details-7.html">gallery style 2</a></li>
                                <li><a href="product-details-8.html">fixed image style</a></li>
                                <li><a href="product-details-9.html">fixed image style 2</a></li>
                            </ul>
                        </div> -->
                        <div class="mega-banner-img">
                            <a href="single-product.html">
                                <img src="uploads/logo/1573123194.png" alt="">
                            </a>
                        </div>
                    </div>
                </li>
                <!-- <li><a href="blog.html">blog</a>
                    <ul class="single-dropdown">
                        <li><a href="blog.html">blog 3 colunm</a></li>
                        <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                        <li><a href="blog-details.html">blog details</a></li>
                        <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                    </ul>
                </li> -->
                <li><router-link to="/contact">contact</router-link></li>
            </ul>
        </nav>
        <nav v-if="mobileNavbar==true"  id="mobile-menu-active">
            <ul class="menu-overflow">
                <li><router-link to="/">Home</router-link>
                    <ul>
                        <li><a href="index.html">Fashion</a></li>
                        <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                        <li><a href="index-fruits.html">Fruits</a></li>
                        <li><a href="index-book.html">book</a></li>
                        <li><a href="index-electronics.html">electronics</a></li>
                        <li><a href="index-electronics-2.html">electronics style 2</a></li>
                        <li><a href="index-food.html">food & drink</a></li>
                        <li><a href="index-furniture.html">furniture</a></li>
                        <li><a href="index-handicraft.html">handicraft</a></li>
                        <li><a href="index-smart-watch.html">smart watch</a></li>
                        <li><a href="index-sports.html">sports</a></li>
                    </ul>
                </li>
                <!-- <li><a href="#">pages</a>
                    <ul>
                        <li><a href="about-us.html">about us</a></li>
                        <li><a href="menu-list.html">menu list</a></li>
                        <li><a href="login.html">login</a></li>
                        <li><a href="register.html">register</a></li>
                        <li><a href="cart.html">cart page</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="wishlist.html">wishlist</a></li>
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </li> -->
                <li><router-link to="/shop/all">shop</router-link>
                    <ul>
                        <li><a href="shop-grid-2-col.html">{{ categories }}</a></li>
                        <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                        <li><a href="shop.html">grid 4 column</a></li>
                        <li><a href="shop-grid-box.html">grid box style</a></li>
                        <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                        <li><a href="shop-list-2-col.html">list 2 column</a></li>
                        <li><a href="shop-list-box.html">list box style</a></li>
                        <li><a href="product-details.html">tab style 1</a></li>
                        <li><a href="product-details-2.html">tab style 2</a></li>
                        <li><a href="product-details-3.html"> tab style 3</a></li>
                        <li><a href="product-details-4.html">sticky style</a></li>
                        <li><a href="product-details-5.html">sticky style 2</a></li>
                        <li><a href="product-details-6.html">gallery style</a></li>
                        <li><a href="product-details-7.html">gallery style 2</a></li>
                        <li><a href="product-details-8.html">fixed image style</a></li>
                        <li><a href="product-details-9.html">fixed image style 2</a></li>
                    </ul>
                </li>
                <!-- <li><router-link to="/shop/all">shop</router-link>
                    <ul>
                        <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                        <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                        <li><a href="shop.html">grid 4 column</a></li>
                        <li><a href="shop-grid-box.html">grid box style</a></li>
                        <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                        <li><a href="shop-list-2-col.html">list 2 column</a></li>
                        <li><a href="shop-list-box.html">list box style</a></li>
                        <li><a href="product-details.html">tab style 1</a></li>
                        <li><a href="product-details-2.html">tab style 2</a></li>
                        <li><a href="product-details-3.html"> tab style 3</a></li>
                        <li><a href="product-details-4.html">sticky style</a></li>
                        <li><a href="product-details-5.html">sticky style 2</a></li>
                        <li><a href="product-details-6.html">gallery style</a></li>
                        <li><a href="product-details-7.html">gallery style 2</a></li>
                        <li><a href="product-details-8.html">fixed image style</a></li>
                        <li><a href="product-details-9.html">fixed image style 2</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="#">BLOG</a>
                    <ul>
                        <li><a href="blog.html">blog 3 colunm</a></li>
                        <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                        <li><a href="blog-details.html">blog details</a></li>
                        <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="contact.html"> Contact  </a></li> -->
            </ul>
        </nav>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex'
import * as types from '../../store/types'

export default {
    name:'navBar',
    data(){
        return{
            meng:this.categories
        }
    },
    props:{
        navbar:{
            type: Boolean,
            default: false
        },
        mobileNavbar:{
            type: Boolean,
            default: false
        },
    },
    computed:{
        ...mapGetters({
            categories: types.GETTER_CATEGORIES_PRODUCTS,
            subcategories: types.GETTERS_CATEGORIES
        }),
        ...mapActions({
            fetchData: types.ACTIONS_CATEGORIES_PRODUCTS,
            fetchDataSubCategory: types.ACTIONS_CATEGORIES
        })
    }
}
</script>
