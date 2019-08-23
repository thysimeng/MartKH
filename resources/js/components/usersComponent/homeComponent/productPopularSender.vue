<template>
  <div>
    <productPopularGG :products="products"></productPopularGG>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import productPopularGG from "./productPopular.vue";

export default {
  name: "shopggg",
  data: function() {
    return {
    };
  },
  mounted() {
    this.$store.dispatch("fetchProductsPopular");
  },
  computed: {
    ...mapGetters(["productsPopular"]),
    products() {
      return this.$store.getters.productsPopular;
    }
  },
  methods: {
    quickView(PID, v) {
      return this.productID.push(PID, v);
    }
  },
  components: {
    productPopularGG: productPopularGG
  }
};
</script>
