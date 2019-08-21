<template>
  <div>
    <productAll :products="products"></productAll>
    <!-- <h1>productFood component</h1> -->
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import productAll from "./productAll.vue";

export default {
  name: "productFood",
  data: function () {
      return {

      }
  },
  mounted() {
    this.$store.dispatch("fetchProductsFood");
  },
  computed: {
    ...mapGetters(["productsFoodHome"]),
    products() {
      return this.$store.getters.productsFoodHome;
    }
  },
  components: {
    productAll: productAll
  }
};
</script>
