<template>
    <header>
        {{ updateAuthData }}
        <div v-show="false">{{ fetchData }}</div>
        <div class="header-top-furniture wrapper-padding-2 res-header-sm">
            <div class="container-fluid">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 furniture-logo ptb-30">
                        <router-link to="/">
                            <img :src="logo" alt="" style="width:250px;height:78px;">
                        </router-link>
                    </div>
                    <nvabar></nvabar>
                    <div class="header-cart">
                        <!-- <a class="icon-cart-furniture" href="#">
                            <i class="ti-shopping-cart"></i>
                            <span class="shop-count-furniture green">02</span>
                        </a> -->
                        <ul class="cart-dropdown">
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h5><a href="#"> Bits Headphone</a></h5>
                                    <h6><a href="#">Black</a></h6>
                                    <span>$80.00 x 1</span>
                                </div>
                                <div class="cart-delete">
                                    <a href="#"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="#"><img src="assets/img/cart/2.jpg" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h5><a href="#"> Bits Headphone</a></h5>
                                    <h6><a href="#">Black</a></h6>
                                    <span>$80.00 x 1</span>
                                </div>
                                <div class="cart-delete">
                                    <a href="#"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="#"><img src="assets/img/cart/3.jpg" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h5><a href="#"> Bits Headphone</a></h5>
                                    <h6><a href="#">Black</a></h6>
                                    <span>$80.00 x 1</span>
                                </div>
                                <div class="cart-delete">
                                    <a href="#"><i class="ti-trash"></i></a>
                                </div>
                            </li>
                            <li class="cart-space">
                                <div class="cart-sub">
                                    <h4>Subtotal</h4>
                                </div>
                                <div class="cart-price">
                                    <h4>$240.00</h4>
                                </div>
                            </li>
                            <li class="cart-btn-wrapper">
                                <a class="cart-btn btn-hover" href="#">view cart</a>
                                <a class="cart-btn btn-hover" href="#">checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
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
                                    <li><a href="#">pages</a>
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
                                    </li>
                                    <li><a href="#">shop</a>
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
                                    </li>
                                    <li><a href="#">BLOG</a>
                                        <ul>
                                            <li><a href="blog.html">blog 3 colunm</a></li>
                                            <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact  </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
            <div class="container-fluid">
                <div class="furniture-bottom-wrapper">
                    <div class="furniture-login">
                        <ul>
                            <!-- <li>Get Access: <a href="login.html">Login </a></li> -->
                            <!-- <li v-if="authLoginCheck==true">Your profile: <router-link to="/">Meng</router-link></li> -->
                            <li v-if="authLoginCheck==true">Your profile: <router-link to="/profile">{{ userInfo.name }}</router-link></li>
                            <li v-if="authLoginCheck==true">
                                <form @submit="logout">
                                    <button style="cursor: pointer;">Logout</button>
                                </form>
                                {{ message }}
                            </li>
                            <!-- <li v-if="authLoginCheck==true">
                                <a href="/logout">Logout</a>
                            </li> -->
                            <!-- <li v-if="authLoginCheck!=true">Get Access: <router-link to="/login">Login</router-link></li> -->
                            <li v-if="authLoginCheck!=true">Get Access: <a href="/login">Login</a></li>
                            <!-- <li v-if="authLoginCheck!=true"><router-link to="/register">Register</router-link></li> -->
                            <li v-if="authLoginCheck!=true"><a href="/register">Register</a></li>
                            <!-- <li><a href="register.html">Reg </a></li> -->
                        </ul>
                    </div>
                    <search></search>
                    <div class="furniture-wishlist">
                        <ul>
                            <!-- <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i class="ti-reload"></i> Compare</a></li> -->
                            <!-- <li><a href="wishlist.html"><i class="ti-heart"></i> Wishlist</a></li> -->
                            <li v-if="authLoginCheck==true"><router-link to="/wishlist"><i class="ti-heart"></i> Wishlist</router-link></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
import { mapGetters, mapActions } from 'vuex';
import * as types from '../store/types.js';
import search from './mainHeaderComponents/search';
import nvabar from './mainHeaderComponents/navBar'
export default {
    data(){
        return{
            logo: '/uploads/logo/1573123194.png',
            message:'',
            token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods:{
        ...mapActions([
            'passDataAuth'
        ]),
        logout(e){
            e.preventDefault();
            let currentObj = this;

            axios.post('/logout').then(({ data }) => {
                let metaName="meta name\=\"csrf-token\" content\=\"";
                var indexOfToken=data.search(metaName);
                var token = data.slice(indexOfToken+32, 40);
                window.axios.defaults.headers.common['X-CSRF-TOKEN']=token;
                currentObj.$store.dispatch('passDataAuth')
            }
            ).catch(error => {
                console.log(error);
                currentObj.$store.dispatch('passDataAuth')
            }
            )
        },
    },
    computed:{
        ...mapGetters({
            authLoginCheck:'authLoginCheck', userInfo: types.GETTERS_USER
        }),
        updateAuthData(){
            this.$store.dispatch('passDataAuth');
        },
        ...mapActions({
            fetchData: types.ACTIONS_USER
        })
    },
    components:{
        search,
        nvabar
    }
}
</script>
