<template>
    <div class="coustom-row-5">
        {{ fetchData }}
        <div v-for="Product in ProductData" :data="Product" :key="Product.key" class="custom-col-three-5 custom-col-style-5 mb-65">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="#">
                        <img :src="'uploads/product_image/'+Product.image" alt="">
                    </a>
                    <div class="product-action">
                        <!-- <a class="animate-left" title="Wishlist" href="#">
                            <i class="pe-7s-like"></i>
                        </a> -->
                        <addToWishlist :productID="productID=Product.id" :style1="true"></addToWishlist>
                        <!-- <a class="animate-top" title="Add To Cart" href="#">
                            <i class="pe-7s-cart"></i>
                        </a> -->
                        <!-- <a @click="passModalData(Product.name, Product.image, Product.price,Product.description, Product.size, Product.brand)" class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"> -->
                        <a @click="passModalData(Product)" class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                            <i class="pe-7s-look"></i>
                        </a>
                    </div>
                </div>
                <div class="funiture-product-content text-center">
                    <h4><a href="product-details.html">{{ Product.name }}</a></h4>
                    <span>${{ Product.price }}</span>
                    <div class="product-rating-5">
                        <i class="pe-7s-star black"></i>
                        <i class="pe-7s-star black"></i>
                        <i class="pe-7s-star"></i>
                        <i class="pe-7s-star"></i>
                        <i class="pe-7s-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex';
import addToWishlist from '../wishlist/addTowishlis'
export default {
    name:'tabContents',
    data(){
        return{
            modalData:{
                name:'',
                imageData:'',
                price: Number,
                Description: '',
                size:''
            }
        }
    },
    props:{
        category:{
            type: String,
            default:'Drink'
        }
    },
    methods:{
        passModalData(product){
            this.$store.dispatch('passDataModal', product);
        },
        ...mapActions([
            'passDataModal'
        ]),

    },
    computed:{
        ...mapGetters([
            'ProductData'
        ]),
        ...mapActions([
            'fetchProducts'
        ]),
        fetchData(){
            if(this.category!=''){
                this.$store.dispatch('fetchProducts', this.category);
            }
            else if (this.category==''){
                this.$store.dispatch('fetchProducts', 'Drink');
            }
        }
    },
    components:{
        // modalView,
        addToWishlist
    }
}
</script>
