<template>
  <div class="furniture-search">
    <form action @submit="searchProduct">
      <input placeholder="I am Searching for . . ." type="text" v-model="searchInput" />
      <button :disabled="!isValid">
          <i class="ti-search"></i>
      </button>
    </form>
    <strong>Output:</strong>
    <pre>
        {{products}}
    </pre>
    <allProductDisplay :products="products"></allProductDisplay>
    <!-- <searchResult :products="products"></searchResult> -->
  </div>
</template>
<script>
// import { mapGetters } from "vuex";
import allProductDisplay from '../shopComponent/allProductDisplay.vue'
// import searchResult from '../shopComponent/searchResult.vue'

export default {
  name: "searchButton",
  data() {
    return {
      searchInput: "",
      products: []
    };
  },
  methods: {
    searchProduct(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/searchweithwh", {
          a: this.searchInput
        })
        .then(function(response) {
          currentObj.products = response.data;
        })
        .catch(function(error) {
          currentObj.products = error;
        });
    }
  },
  computed: {
    // ...mapGetters(["productSearch"]),
    // products() {
    //   return this.$store.getters.productSearch;
    // },
    isValid() {
      return this.searchInput.dataInput !== "";
    }
  },
  components:{
      allProductDisplay : allProductDisplay,
    //   searchResult: searchResult
  }
};
</script>
