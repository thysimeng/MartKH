<template>
  <div class="product-style">
    <div class="popular-product-active owl-carousel">
      <div class="product-wrapper">
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
              @click="quickView(products[0].pid, products[0].image)"
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">{{ products[0].name }}</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>
    </div>
    <modalQuickView :productID="productID"></modalQuickView>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import modalQuickView from "../shopComponent/modalQuickView";

export default {
  name: "shopggg",
  data: function() {
    return {
      seeMore: 1,
      productID: []
    };
  },
  mounted() {
    this.$store.dispatch("fetchProductsPopular");
  },
  computed: {
    ...mapGetters(["productsPopular"]),
    products() {
      return this.$store.getters.productsPopular;
    }
  },
  methods: {
    quickView(PID, v) {
      return this.productID.push(PID, v);
    }
  },
  components: {
    modalQuickView: modalQuickView,
  }
};
</script>
