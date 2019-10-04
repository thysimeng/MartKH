<template>
  <div class="product-tab-list text-center mb-65 nav" role="tablist">
    <!-- <a href="">a{{ productsCategory[0].categories_name }}</a> -->
    <a
      href
      class="active"
      data-toggle="tab"
      role="tab"
      @click="sendDatatoApp()"
      v-if="productsCategory.length!=0"
    >
      <h4>{{ productsCategory[0].categories_name }}</h4>
    </a>
    <a
      href
      data-toggle="tab"
      role="tab"
      @click="sendDatatoAppAll()"
      v-if="productsCategory1.length!=0"
    >
      <h4>{{ productsCategory1[0].categories_name }}</h4>
    </a>
    <div v-if="displayData==1">{{ updatedData }}</div>
    <div v-else-if="displayData==2">{{ updatedData1 }}</div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import productAll from "./productAll.vue";

export default {
  name: "productFood",
  data: function() {
    return {
      productshomecateProps: this.productshomecate,
      displayData: 1
    };
  },
  props: {
    productshomecate: Array,
    showmodal: Boolean
  },
  methods: {
    sendDatatoApp() {
      this.displayData = 1;
    },
    sendDatatoAppAll() {
      this.displayData = 2;
    }
  },
  mounted() {
    this.$Progress.start();
    this.$store.dispatch("fetchProductsFood");
    this.$store.dispatch("fetchProductsCategories1");
    this.$Progress.finish();
  },
  computed: {
    ...mapGetters(["productsFoodHome"]),
    ...mapGetters(["productsCategories1"]),
    productsCategory() {
      return this.$store.getters.productsFoodHome;
    },
    productsCategory1() {
      return this.$store.getters.productsCategories1;
    },
    updatedData() {
      this.showmodal = false;
      this.$emit("senddatashowmodal", this.showmodal);
      this.productshomecateProps = this.productsCategory;
      this.$emit("senddata", this.productshomecateProps);
    },
    updatedData1() {
      this.showmodal = false;
      this.$emit("senddatashowmodal", this.showmodal);
      this.productshomecateProps = this.productsCategory1;
      this.$emit("senddata", this.productshomecateProps);
    }
  },
  components: {
    productAll: productAll
  }
};
</script>
