<template>
  <div>
    <form action @submit="addToWishList">
      <input type="hidden" :productID="productID" />
      <a title="Wishlist" href @click="addToWishList">
        <i class="pe-7s-like"></i>
      </a>
      {{ productID }}
    </form>
  </div>
</template>
<script>
export default {
  name: "wishList",
  data: function() {
    return {
      addStatus: Boolean
    };
  },
  //   To use props, they must be declared
  props: {
      productID: Number
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
          currentObj.addStatus = response.data;
        })
        .catch(function(error) {
          currentObj.addStatus = error;
        });
    }
  }
};
</script>
