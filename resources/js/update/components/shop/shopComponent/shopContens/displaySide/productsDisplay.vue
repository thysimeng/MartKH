<template>
    <div class="shop-product-content tab-content">
        <div v-show="false">{{ fetchProductsAll }}</div>
        <div id="grid-sidebar1" class="tab-pane fade active show">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xl-3" v-for="product in allProductData.data" :key="product.key">
                    <div class="product-wrapper mb-30">
                        <div class="product-img">
                            <a href="#">
                                <img :src="'/uploads/product_image/'+product.image" alt="">
                            </a>
                            <span>hot</span>
                            <div class="product-action">
                                <addToWishlist :productID="productID=product.id" :style1="true"></addToWishlist>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a @click="passModalData(product)" class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="#">{{ product.name }}</a></h4>
                            <span>${{ product.price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="grid-sidebar2" class="tab-pane fade">
            <div class="row">
                <div v-for="product in allProductData.data" :key="product.key" class="col-lg-12 col-xl-6">
                    <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                        <div class="product-img list-img-width">
                            <a href="#">
                                <img :src="'/uploads/product_image/'+product.image" alt="">
                            </a>
                            <span>hot</span>
                            <div class="product-action-list-style">
                                <a @click="passModalData(product)" class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content-list">
                            <div class="product-list-info">
                                <h4><a href="#">{{ product.name }}</a></h4>
                                <span>${{ product.price }}</span>
                                <p>{{ product.description }}</p>
                            </div>
                            <div class="product-list-cart-wishlist">
                                <div class="product-list-cart">
                                    <a class="btn-hover list-btn-style" href="#">add to cart</a>
                                </div>
                                <div class="product-list-wishlist">
                                    <addToWishlist :productID="productID=product.id" :style2="true"></addToWishlist>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
import addToWishlist from '../../../../wishlist/addTowishlis';
export default {
    name: 'productDisplay',
    data(){
        return{
            productID:''
        }
    },
    methods:{
        ...mapActions([
            'passDataModal'
        ]),
        passModalData(product){
            this.$store.dispatch('passDataModal', product);
        }
    },
    computed:{
        ...mapActions([
            'fetchProductsAll',
        ]),
        ...mapGetters([
            'allProductData'
        ])
    },
    components:{
        addToWishlist
    }
}
</script>
