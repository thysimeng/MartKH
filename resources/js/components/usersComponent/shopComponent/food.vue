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
      orderBy: Number
    };
  },
  mounted() {
    this.$store.dispatch("fetchPosts");
  },
  props: {
    selected: Number
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
