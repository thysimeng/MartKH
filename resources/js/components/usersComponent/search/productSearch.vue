<template>
  <div class="furniture-search">
    <form action @submit="searchProduct">
      <input placeholder="I am Searching for . . ." type="text" v-model="searchInput" />
      <button :disabled="!isValid" @click="[ChangeData(), ChangeShow()]">
        <!-- <router-link to="/search"> -->
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
      searchInput: ""
    };
  },
  props: {
    products: Array,
    show: Boolean
  },
  methods: {
    ChangeData() {
      this.products = this.products;
      this.$emit("changedatabyemit", this.products);
    },
    ChangeShow() {
      this.show = false;
      this.$emit("changeshowbyemit", this.show);
    },
    searchProduct(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/searchweithwh", {
          searchInput: this.searchInput
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
    isValid() {
      return this.searchInput.dataInput !== "";
    }
  }
};
</script>
