<template>
  <div>
    <allProductDisplay :products="products"></allProductDisplay>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import allProductDisplay from "./allProductDisplay.vue";

export default {
  name: "shop",
  data: function () {
      return {

      }
  },
  mounted() {
    this.$store.dispatch("fetchPosts");
  },
  computed: {
    ...mapGetters(["productsAll"]),
    products() {
      return this.$store.getters.productsAll;
    }
  },
  components: {
    allProductDisplay: allProductDisplay
  }
};
</script>
