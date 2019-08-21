<template>
  <div>
      <allProductDisplay :products="products"></allProductDisplay>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import allProductDisplay from './allProductDisplay.vue'

export default {
  name: "productsFood",
  mounted() {
    this.$store.dispatch("fetchPosts");
  },
  computed: {
    ...mapGetters(["productsFood"]),
    products () {
        return this.$store.getters.productsFood
    }
  },
    components:{
        allProductDisplay : allProductDisplay
    }
};
</script>

<style scoped>
</style>
