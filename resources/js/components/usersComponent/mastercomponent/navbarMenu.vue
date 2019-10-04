<template>
  <div>
    <form action @submit="categoryDisplay">
      <input type="hidden" :productsProps="productsProps" />
      <!-- <div>
        {{ testwishlist }}
        <a
          v-if="showwishlish"
          title="Wishlist"
          href
          @click="addToWishList"
          class
          :class="{'backgroundred': showwishlish}"
        >
          <i class="pe-7s-like"></i>
        </a>
      </div>
      <div>
        <a
          v-if="!showwishlish"
          title="Wishlist"
          href
          @click="addToWishList"
          class
          :class="{'backgroundred': showwishlish}"
        >
          <i class="pe-7s-like"></i>
        </a>
      </div> -->
    </form>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "wishList",
  data: function() {
    return {
        productsProps:this.products,
    //   addStatus: false,
    //   showwishlish: false
    };
  },
  //   To use props, they must be declared
  props: {
    category: String,
    products: Array,
    // isActive: Boolean
  },
  methods: {
    categoryDisplay(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/products/categoryForNavbar", {
          category: this.category
        })
        .then(function(response) {
          currentObj.productsProps = response.data;
        })
        .catch(function(error) {
          currentObj.productsProps = error;
        });
    }
  },
//   mounted() {
//     this.$store.dispatch("fetchProductsWishList");
//   },
//   computed: {
//     ...mapGetters(["productsWishList"]),
//     productsWishlist() {
//       return this.$store.getters.productsWishList;
//     },
//     divClasses: function() {
//       return {
//         backgroundred: this.addStatus
//       };
//     },
//     noneRed: function() {
//       return {
//         backgroundred: !this.addStatus
//       };
//     },
//     testwishlist() {
//       for (var i = 0; i < this.productsWishlist.length; i++) {
//         if (this.productsWishlist[i].wishlist_id == this.productID) {
//           (this.showwishlish = true)
//           return ;
//         }
//       }
//       this.showwishlish
//       return ;
//     }
//   }
};
</script>
 <style scoped>
.backgroundred {
  background: red;
}
</style>
