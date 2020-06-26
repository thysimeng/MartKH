<template>
    <form @submit="addToWishlist">
        <div v-show="false">
            {{ backgroundFill }}
            {{ productsActionsWishlist }}
        </div>
        <!-- <router-link v-if="authLoginCheck==false" style="cursor: pointer;" to="/login" :class="{'animate-left':style1, 'btn-hover list-btn-wishlist':style2}"><i class="pe-7s-like"></i></router-link> -->
        <!-- <a v-else-if="authLoginCheck==false" style="cursor: pointer;" href="/login" :class="{'animate-left':style1, 'btn-hover list-btn-wishlist':style2}"><i class="pe-7s-like"></i></a> -->
        <div v-if="authLoginCheck==true" :class="{'quickview-btn-wishlist':styleModal}">
            <a v-if="styleButton=='heart'" style="cursor: pointer;" @click="addToWishlist" :class="{'animate-left':style1, 'btn-hover list-btn-wishlist':style2}" title="Wishlist" :style="{background: wishlistBG}"><i class="pe-7s-like"></i></a>
            <a v-else-if="styleButton=='modal'" class="btn-hover"  @click="addToWishlist"><i class="pe-7s-like"></i></a>
            <a v-else-if="styleButton=='x'" style="cursor: pointer;" @click="addToWishlist"><i class="pe-7s-close"></i></a>
        </div>
        <div v-if="authLoginCheck==false" :class="{'quickview-btn-wishlist':styleModal}">
            <a class="btn-hover" href="/login"><i class="pe-7s-like"></i></a>
        </div>

    </form>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name:'addToWishlist',
    data(){
        return{
            wishlistBG:'black'
        }
    },
    props:{
        productID:{
            type: Number
        },
        style1:{
            type: Boolean,
            default: false
        },
        style2:{
            type: Boolean,
            default: false
        },
        styleModal:{
            type: Boolean,
            default: false
        },
        styleButton:{
            type: String,
            default: 'heart'
        },
    },
    methods:{
        addToWishlist(e){
            e.preventDefault();
            let currentObje = this;
            axios.post('/users/wishlist',{
                productID: this.productID
            }).then(res => {
                console.log(res.data);
                if(res.data){
                    currentObje.wishlistBG='red';
                }
                else
                {
                    currentObje.wishlistBG='';
                }
                this.$store.dispatch('productsActionsWishlist')
            })
            .catch(err=>console.log(err))
        }
    },
    computed:{
        ...mapGetters([
            'productDataWishlist',
            'authLoginCheck'
        ]),
        // function for test background
        backgroundFill(){
            let test = false;
            for(var i=0;i<this.productDataWishlist.length;i++){
                if(this.productDataWishlist[i].id==this.productID){
                    test = true;
                    break;
                }
            }
            if(test==true){
                this.wishlistBG='red';
            }
            else{
                this.wishlistBG='black';
            }
            // console.log(this.productDataWishlist);
        },
        ...mapActions([
            'productsActionsWishlist'
        ])
    }
}
</script>
