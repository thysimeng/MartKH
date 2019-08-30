<template>
  <div class="shop-product-content tab-content">
    <div id="grid-sidebar1" class="tab-pane fade active show">
      <div class="row">
        <div
          class="col-lg-6 col-md-6 col-xl-3"
          v-for="product in seeMore"
          v-bind:data="product"
          v-bind:key="product.key"
        >
          <div class="product-wrapper mb-30">
            <div class="product-img">
              <a href="#">
                <img :src="'/uploads/product_image/' + products[product-1].image" alt="" />
              </a>
              <span>hot</span>
              <div class="product-action">
                <a class="animate-left" title="Wishlist" href="#" type="submit">
                    <i class="pe-7s-like"></i>
                </a>
                <a class="animate-top" title="Add To Cart" href="#">
                  <i class="pe-7s-cart"></i>
                </a>
                <a
                  href
                  class="animate-right"
                  title="Quick View"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  @click="quickView(products[product-1].pid, products[product-1].image)"
                >
                  <i class="pe-7s-look"></i>
                </a>
              </div>
            </div>
            <div class="product-content">
              <h4>
                <a href="#">{{ products[product-1].name }}</a>
              </h4>
              <span>$115.00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="grid-sidebar2" class="tab-pane fade">
      <div class="row">
        <div
          class="col-lg-12 col-xl-6"
          v-for="product in seeMore"
          v-bind:data="product"
          v-bind:key="product.key"
        >
          <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
            <div class="product-img list-img-width">
              <a href="#">
                <img :src="'/uploads/product_image/' + products[product-1].image" alt="" />
              </a>
              <span>hot</span>
              <div class="product-action-list-style">
                <a
                  href
                  class="animate-right"
                  title="Quick View"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  @click="quickView(products[product-1].pid, products[product-1].image)"
                >
                  <i class="pe-7s-look"></i>
                </a>
              </div>
            </div>
            <div class="product-content-list">
              <div class="product-list-info">
                <h4>
                  <a href="#">{{ products[product-1].name }}</a>
                </h4>
                <span>$150.00</span>
                <p>Lorem ipsum dolor sit amet, mana consectetur adipisicing elit, sed do eiusmod tempor labore.</p>
              </div>
              <div class="product-list-cart-wishlist">
                <div class="product-list-cart">
                  <a class="btn-hover list-btn-style" href="#">add to cart</a>
                </div>
                <div class="product-list-wishlist">
                  <a class="btn-hover list-btn-wishlist" href="#">
                    <i class="pe-7s-like"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button @click="seeMore++">See more</button>
    <modalQuickView :productID="productID" @clearData="productID = $event"></modalQuickView>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import modalQuickView from "./modalQuickView.vue";

export default {
  name: "productsFood",
  data: function() {
    return {
      seeMore: 1,
      productID: [],
      add: Number
    };
  },
  //   To use props, they must be declared
  props: {
    products: Array
  },
  methods: {
    quickView(PID, v) {
      return this.productID.push(PID, v);
    }
  },
  components: {
    modalQuickView: modalQuickView
  }
};
</script>

<style scoped>
</style>
