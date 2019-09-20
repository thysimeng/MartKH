<template>
  <div class="tab-content">
    <div class="tab-pane active show fade" id="furniture1" role="tabpanel">
      <div class="coustom-row-5">
        <div
          class="custom-col-three-5 custom-col-style-5 mb-65"
          v-for="product in productshomecate"
          v-bind:data="product"
          v-bind:key="product.key"
        >
          <div class="product-wrapper">
            <div class="product-img">
              <a
                href
                title="Quick View"
                data-toggle="modal"
                data-target="#VUEModal"
                @click="quickView(product.id, product.image, product.name, product.description)"
              >
                <img :src="'/uploads/product_image/'+ product.image" alt />
              </a>
              <div class="product-action">
                <!-- <a class="animate-left" title="Wishlist" href="#">
                  <i class="pe-7s-like"></i>
                </a>-->
                <addTowishList :productID="productID = product.id" class="animate-left"></addTowishList>
                <a class="animate-top" title="Add To Cart" href="#">
                  <i class="pe-7s-cart"></i>
                </a>
                <a
                  href
                  class="animate-right"
                  title="Quick View"
                  data-toggle="modal"
                  data-target="#VUEModal"
                  @click="quickView(product.id, product.image, product.name, product.description)"
                >
                  <i class="pe-7s-look"></i>
                </a>
              </div>
            </div>
            <div class="funiture-product-content text-center">
              <h4>
                <a href="product-details.html">{{ product.name }}</a>
              </h4>
              <span>${{ product.price }}</span>
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
    <modalQuickView :productid="productid" v-if="!showmodal"></modalQuickView>
  </div>
</template>
<script>
import modalQuickView from "../shopComponent/modalQuickView";
import addTowishList from "../mastercomponent/addTowishList.vue";
export default {
  name: "productAll",
  props: {
    showmodal: Boolean,
    productshomecate: Array
  },
  data: function() {
    return {
      productid: [],
      productID: Number
    };
  },
  methods: {
    quickView(PID, v, name, description) {
      this.showmodal = false;
      this.productid = [PID, v, name, description];
    }
  },
  components: {
    modalQuickView: modalQuickView,
    addTowishList
  }
};
</script>
