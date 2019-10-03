<template>
  <!-- shopping-cart-area start -->
  <div class="cart-main-area pt-95 pb-100 wishlist">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h1 class="cart-heading">wishlist</h1>
          <div class="table-content table-responsive">
            <table>
              <thead>
                <tr>
                  <th>images</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>remove</th>
                </tr>
              </thead>
              <tbody>
                <deleteWishlist
                  v-for="(wishlist, index) in productWishlistDisplay"
                  :data="index"
                  :key="index.key"
                  :productArr="productArr= productWishlistDisplay[index]"
                ></deleteWishlist>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import deleteWishlist from "./subWishlist/deleteWishlist.vue";
export default {
  name: "wishlistDiplay",
  data: function() {
    return {
      productArr: []
    };
  },
  mounted() {
    this.$Progress.start();
    this.$store.dispatch("fetchProductsWishlistDisplay");
    this.$Progress.finish();
  },
  computed: {
    ...mapGetters(["productWishlistDisplay"]),
    productWishlistDisplay() {
      return this.$store.getters.productWishlistDisplay;
    }
  },
  components: {
    deleteWishlist
  }
};
</script>
