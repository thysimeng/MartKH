<template>
  <div>
    <allProductDisplay :products="products" :orderBy="orderBy= selected"></allProductDisplay>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import allProductDisplay from "./allProductDisplay.vue";

export default {
  name: "productsDrink",
  data: function() {
    return {
      orderBy: String
    };
  },
  mounted() {
    this.$Progress.start();
    this.$store.dispatch("fetchProductsCategories1");
    this.$Progress.finish();
  },
  props: {
    selected: String
  },
  computed: {
    ...mapGetters(["productsCategories1"]),
    products() {
      return this.$store.getters.productsCategories1;
    }
  },
  components: {
    allProductDisplay: allProductDisplay
  }
};
</script>

<style scoped>
</style>
