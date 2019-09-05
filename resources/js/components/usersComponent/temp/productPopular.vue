<template>
  <div class="product-style">
    <div
      class="popular-product-active owl-carousel"
      v-for="product in products"
      :key="product.id"
      :product="product"
    >
      <div class="product-wrapper">
        <div class="product-img">
          <a href="#">
            <img :src="'/uploads/product_image/' + products[1].image" alt />
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
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">{{ products[1].image }}</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>
      <!-- <div class="product-wrapper">
        <div class="product-img">
          <a href="#">
            <img :src="'/uploads/product_image/' + products[0].image" alt />
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
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">Darcy Sofa</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-img">
          <a href="#">
            <img src="assets/img/product/furniture/3.jpg" alt />
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
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">Bladen Sofa</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-img">
          <a href="#">
            <img src="assets/img/product/furniture/4.jpg" alt />
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
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">Ardenboro Sofa</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-img">
          <a href="#">
            <img src="assets/img/product/furniture/1.jpg" alt />
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
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">Daystar Sofa</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-img">
          <a href="#">
            <img src="assets/img/product/furniture/2.jpg" alt />
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
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">Trivia Accent Chair</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>-->
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
// import modalQuickView from "../shopComponent/modalQuickView";

export default {
  name: "shopggg",
  data: function() {
    return {};
  },
  props: {
    products: Array
  }
  // methods: {
  //   quickView(PID, v) {
  //     return this.productID.push(PID, v);
  //   }
  // },
  // components: {
  //   modalQuickView: modalQuickView
  // }
};
</script>
