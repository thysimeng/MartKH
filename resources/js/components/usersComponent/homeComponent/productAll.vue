<template>
  <div>
    <div
      class="coustom-row-5"
      v-for="product in products"
      v-bind:data="product"
      v-bind:key="product.key"
    >
      <div class="custom-col-three-5 custom-col-style-5 mb-65">
        <div class="product-wrapper">
          <div class="product-img">
            <a href="#">
              <img :src="'/uploads/product_image/'+ product.image" alt />
            </a>
            <div class="product-action">
              <a class="animate-left" title="Wishlist" href="#">
                <i class="pe-7s-like"></i>
              </a>
              <a class="animate-top" title="Add To Cart" href="#">
                <i class="pe-7s-cart"></i>
              </a>
              <a
                class="animate-right"
                title="Quick View"
                data-toggle="modal"
                data-target="#exampleModal"
                href="#"
                @click="quickView(product.pid, product.image)"
              >
                <i class="pe-7s-look"></i>
              </a>
            </div>
          </div>
          <div class="funiture-product-content text-center">
            <h4>
              <a href="product-details.html">{{ product.name }}</a>
            </h4>
            <span>$90.00</span>
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
  </div>
</template>
<script>
import modalQuickView from "../shopComponent/modalQuickView";
export default {
  name: "productAll",
  props: {
    products: Array
  },
    data: function() {
      return {
        seeMore: 1,
        productsgg: this.products,
        productID: []
      };
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
