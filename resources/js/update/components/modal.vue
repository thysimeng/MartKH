<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 15%;top: 19%;">
            <span class="pe-7s-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog modal-quickview-width" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img :src="'../uploads/product_image/'+ProductDataModal.image" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal2" role="tabpanel">
                                    <img :src="'../uploads/product_image/'+ProductDataModal.image" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal3" role="tabpanel">
                                    <img :src="'../uploads/product_image/'+ProductDataModal.image" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="quick-view-list nav" role="tablist">
                            <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                <img :src="'uploads/product_image/'+ProductDataModal.image" alt="" width="100px" heigth="112px">
                            </a>
                            <a href="#modal2" data-toggle="tab" role="tab">
                                <img :src="'uploads/product_image/'+ProductDataModal.image" alt="" width="100px" heigth="112px">
                            </a>
                            <a href="#modal3" data-toggle="tab" role="tab">
                                <img :src="'uploads/product_image/'+ProductDataModal.image" alt="" width="100px" heigth="112px">
                            </a>
                        </div> -->
                    </div>
                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3>{{ ProductDataModal.name }}</h3>
                            <div class="price">
                                <span class="new">${{ ProductDataModal.price }}</span>
                                <!-- <span class="old">$120.00  </span> -->
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                </div>
                                <div class="quick-view-number">
                                    <span>2 Ratting (S)</span>
                                </div>
                            </div>
                            <p>{{ ProductDataModal.description }}</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">{{ ProductDataModal.size }}</option>
                                        <!-- <option value="">900</option>
                                        <option value="">700</option> -->
                                    </select>
                                </div>
                                <div class="select-option-part">
                                    <label>Brand*</label>
                                    <select class="select">
                                        <option value="">{{ ProductDataModal.brand }}</option>
                                        <!-- <option value="">orange</option>
                                        <option value="">pink</option>
                                        <option value="">yellow</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="quickview-plus-minus">
                                <!-- <div class="cart-plus-minus">
                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                </div> -->
                                <div class="quickview-btn-cart">
                                    <a class="btn-hover-black" href="#">add to cart</a>
                                </div>
                                <!-- <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                                </div> -->
                                <addToWishlist :productID="productID=ProductDataModal.id" :styleModal="true" :styleButton="'modal'"></addToWishlist>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- <h1>{{ProductDataModal}}</h1> -->
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import addToWishlist from './wishlist/addTowishlis'
export default {
    name:'modal',
    data(){
        return{

        }
    },
    // props:{
    //     modalData:{
    //         type: Object
    //     }
    // },
    methods:{
        ...mapActions([
            'passDataModal'
        ]),
        passModalData(product){
            this.$store.dispatch('passDataModal', product);
        }
    },
    computed:{
        ...mapGetters([
            'ProductDataModal'
        ])
    },
    components:{
        addToWishlist
    }
}
</script>
