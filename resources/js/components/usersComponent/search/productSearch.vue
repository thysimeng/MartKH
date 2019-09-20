<template>
  <div class="furniture-search">
    {{ ChangeData }}
    <form action @submit="searchProduct">
      <input placeholder="I am Searching for . . ." type="text" v-model="searchInput" />
      <button :disabled="!isValid" @click="ChangeShow">
        <!-- <router-link to="/products/search"> -->
        <i class="ti-search"></i>
        <!-- </router-link> -->
      </button>
    </form>
  </div>
</template>
<script>
export default {
  name: "searchButton",
  data() {
    return {
      searchInput: "",
      showProps: this.show,
      productsProps: this.products
    };
  },
  props: {
    products: Array,
    show: Number
  },
  methods: {
    ChangeShow() {
      this.showProps = 3;
      this.$emit("changeshowbyemit", this.showProps);
    },
    searchProduct(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/searchweithwh", {
          searchInput: this.searchInput
        })
        .then(function(response) {
          currentObj.productsProps = response.data;
        })
        .catch(function(error) {
          currentObj.productsProps = error;
        });
    }
  },
  computed: {
    isValid() {
      return this.searchInput.dataInput !== "";
    },
    ChangeData() {
      this.productsProps = this.productsProps;
      this.$emit("changedatabyemit", this.productsProps);
    }
  }
};
</script>
