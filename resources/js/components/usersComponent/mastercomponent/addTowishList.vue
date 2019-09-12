<template>
  <div>
    <form action @submit="addToWishList">
      <input type="hidden" :productID="productID" />
      <div>
        {{ normalizedList }}
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
      </div>
    </form>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "wishList",
  data: function() {
    return {
      addStatus: false,
      showwishlish: false
    };
  },
  //   To use props, they must be declared
  props: {
    productID: Number,
    isActive: Boolean
  },
  methods: {
    addToWishList(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/users/wishlist", {
          productID: this.productID
        })
        .then(function(response) {
          currentObj.showwishlish = response.data;
        })
        .catch(function(error) {
          currentObj.showwishlish = error;
        });
    }
  },
  mounted() {
    this.$store.dispatch("fetchProductsWishList");
  },
  computed: {
    ...mapGetters(["productsWishList"]),
    productsWishlist() {
      return this.$store.getters.productsWishList;
    },
    divClasses: function() {
      return {
        backgroundred: this.addStatus
      };
    },
    noneRed: function() {
      return {
        backgroundred: !this.addStatus
      };
    },
    normalizedList() {
      for (var i = 0; i < this.productsWishlist.length; i++) {
        if (this.productsWishlist[i].wishlist_id == this.productID) {
          (this.showwishlish = true)
          return ;
        }
      }
      this.showwishlish
      return ;
    }
  }
};
</script>
 <style scoped>
.backgroundred {
  background: red;
}
</style>
