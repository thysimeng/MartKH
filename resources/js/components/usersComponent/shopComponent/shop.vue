<template>
  <div>
    <allProductDisplay :products="products" :orderBy="orderBy= selected"></allProductDisplay>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import allProductDisplay from "./allProductDisplay.vue";

export default {
  name: "shop",
  data: function() {
    return {
      orderBy: String
    };
  },
  props: {
    selected: String
  },
  mounted() {
    this.$Progress.start();
    this.$store.dispatch("fetchPosts");
    this.$Progress.finish();
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
