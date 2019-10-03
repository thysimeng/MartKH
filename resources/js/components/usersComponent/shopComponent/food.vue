<template>
  <div>
    <allProductDisplay :products="products" :orderBy="orderBy= selected"></allProductDisplay>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import allProductDisplay from "./allProductDisplay.vue";

export default {
  name: "productsFood",
  data: function() {
    return {
      orderBy: String
    };
  },
  mounted() {
    this.$store.dispatch("fetchPosts");
  },
  props: {
    selected: String
  },
  computed: {
    ...mapGetters(["productsFood"]),
    products() {
      return this.$store.getters.productsFood;
    }
  },
  components: {
    allProductDisplay: allProductDisplay
  }
};
</script>

<style scoped>
</style>
