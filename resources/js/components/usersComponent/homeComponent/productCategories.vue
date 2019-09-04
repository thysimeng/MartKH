<template>
  <div class="product-tab-list text-center mb-65 nav" role="tablist">
    <a href data-toggle="tab" role="tab" @click="sendDatatoApp()">
      <h4>Food</h4>
    </a>
    <a href data-toggle="tab" role="tab" @click="sendDatatoAppAll()">
      <h4>Drink</h4>
    </a>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import productAll from "./productAll.vue";

export default {
  name: "productFood",
  props: {
    productshomecate: Array
  },
  methods: {
    sendDatatoApp() {
      this.productshomecate = this.products;
      this.$emit("senddata", this.productshomecate);
    },
    sendDatatoAppAll() {
      this.productshomecate = this.productsAll;
      this.$emit("senddata", this.productshomecate);
    }
  },
  mounted() {
    this.$store.dispatch("fetchProductsFood");
    this.$store.dispatch("fetchProductsDrink");
  },
  computed: {
    ...mapGetters(["productsFoodHome"]),
    products() {
      return this.$store.getters.productsFoodHome;
    },
    productsAll() {
      return this.$store.getters.productsFoodDrink;
    }
  },
  components: {
    productAll: productAll
  }
};
</script>
