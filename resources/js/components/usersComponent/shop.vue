<template>
  <div>
      <allProductDisplay :products="products"></allProductDisplay>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import allProductDisplay from './allProductDisplay.vue';

export default {
  data: function() {
    return {
        productData:  [ { "pid": 1}]
    };
  },
  name: "Posts",
  l() {
    this.$store.dispatch("fetchPosts");
  },
  computed: {
    ...mapGetters(["productsAll"]),
    products () {
        return this.$store.getters.productsAll
    }
  },
  components: {
    allProductDisplay: allProductDisplay
  }
};
</script>
