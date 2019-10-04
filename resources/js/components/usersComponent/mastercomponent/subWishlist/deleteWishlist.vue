<template>
  <tr v-show="showwishlish">
    <td class="product-thumbnail">
      <a href="#">
        <img :src="'/uploads/product_image/' + productArr.image" alt width="85px" height="101px" />
      </a>
    </td>
    <td class="product-name">
      <a href="#">{{ productArr.name }}</a>
    </td>
    <td class="product-price-cart">
      <span class="amount">${{ productArr.price }}</span>
    </td>
    <td class="product-remove">
      <form action @submit="addToWishList">
        <input type="hidden" :productID="productID=productArr.id" />
        <a href @click="addToWishList">
          <i class="pe-7s-close"></i>
        </a>
      </form>
    </td>
  </tr>
</template>
<script>
export default {
  name: "deleteWishlist",
  data: function() {
    return {
      productID: Number,
      showwishlish: true
    };
  },
  props: {
    productArr: Object
  },
  methods: {
    addToWishList(e) {
      e.preventDefault();
      let currentObj = this;
      currentObj.$Progress.start();
      axios
        .post("/users/wishlist", {
          productID: this.productID
        })
        .then(function(response) {
          currentObj.showwishlish = response.data;
          currentObj.$Progress.finish();
        })
        .catch(function(error) {
          currentObj.showwishlish = error;
          currentObj.$Progress.fail();
        });
    }
  }
};
</script>
