<template>
    <!-- header end -->
    <!-- <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>wishlist</h2>
                <ul>
                    <li><a href="#">home</a></li>
                    <li> wishlist </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- shopping-cart-area start -->
    <div class="cart-main-area pt-95 pb-100 wishlist">
        {{ navigateToHome }}
        <div v-show="false">
            {{ productsActionsWishlist }}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">wishlist</h1>
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>remove</th>
                                        <th>images</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody v-if="productDataWishlist.lenght!=0">
                                    <tr v-for="product in productDataWishlist" :key="product.key" :data="product">
                                        <td class="product-remove">
                                            <addToWishlist :productID="product.id" :styleButton="'x'"></addToWishlist>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img :src="'/uploads/product_image/'+product.image" alt="" width="101px" height="101px"></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{ product.name }}</a></td>
                                        <td class="product-price-cart"><span class="amount">${{ product.price }}</span></td>
                                        <td class="product-quantity">
                                            <input value="1" type="number">
                                        </td>
                                        <td class="product-subtotal">$165.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area end -->
</template>

<script>
import addToWishlist from './addTowishlis'
import {mapGetters, mapActions} from 'vuex';
export default {
    name: 'wishlist',
    methods:{
        ...mapActions([
            'passDataAuth'
        ]),
        addToWishlist(e){
            e.preventDefault();
            let currentObje = this;
            axios.post('/users/wishlist',{
                productID: 13
            }).then(res => {
                console.log(res.data);
                currentObj.$store.dispatch('passDataAuth');
            })
            .catch(err=>{
                console.log(err);
                currentObj.$store.dispatch('passDataAuth');
            })
            this.$store.dispatch('productsActionsWishlist')
        }
    },
    computed:{
        ...mapGetters([
            'productDataWishlist',
            'authLoginCheck'
        ]),
        ...mapActions([
            'productsActionsWishlist'
        ]),
        navigateToHome(){
            if(this.authLoginCheck==false){
                this.$router.push('/')
            }
        },
    },
    components:{
        addToWishlist
    }
}
</script>
