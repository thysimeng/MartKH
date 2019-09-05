<template>
  <div class="product-tab-list text-center mb-65 nav" role="tablist">
    <a href class="active" data-toggle="tab" role="tab" @click="sendDatatoApp()">
      <h4>{{ productsCategory[0].categories_name }}</h4>
    </a>
    <a href data-toggle="tab" role="tab" @click="sendDatatoAppAll()">
      <h4>{{ productsCategory1[0].categories_name }}</h4>
    </a>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import productAll from "./productAll.vue";

export default {
  name: "productFood",
  props: {
    productshomecate: Array,
    showmodal: Boolean
  },
  methods: {
    sendDatatoApp() {
      this.productshomecate = this.productsCategory;
      this.showmodal = false;
      this.$emit("senddata", this.productshomecate);
      this.$emit("senddatashowmodal", this.showmodal);
    },
    sendDatatoAppAll() {
      this.productshomecate = this.productsCategory1;
      this.$emit("senddata", this.productshomecate);
      this.$emit("senddatashowmodal", this.showmodal);
    }
  },
  mounted() {
    this.$store.dispatch("fetchProductsFood");
    this.$store.dispatch("fetchProductsCategories1");
  },
  computed: {
    ...mapGetters(["productsFoodHome"]),
    ...mapGetters(["productsCategories1"]),
    productsCategory() {
      return this.$store.getters.productsFoodHome;
    },
    productsCategory1() {
      return this.$store.getters.productsCategories1;
    }
  },
  components: {
    productAll: productAll
  }
};
</script>
