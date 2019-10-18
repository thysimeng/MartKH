<template>
  <div class="sidebar-widget mb-40">
    <notifications group="foo" :max="displayMax" />
    {{ showNitification }}
    <!-- <Button @click="showNitification">Show nitification</Button> -->
    <h3 class="sidebar-title">Filter by Price</h3>
    <div class="price-slider">
      <input v-model="priceMin" min="0" max="199" step="0.5" type="range" />
      <input v-model="priceMax" min="0" max="199" step="0.5" type="range" />
    </div>
    <div class="price_filter">
      <!-- <div id="slider-range"></div> -->
      <div class="price_slider_amount">
        <div class="label-input">
          <label>price :</label>
          Min$<input type="number" v-model="priceMin" name="price" placeholder="Min" />
          Max$<input type="number" v-model="priceMax" name="price" placeholder="Max" />
        </div>
        <router-link
          class="customerStyle"
          to="/products/filterByPrice"
          tag="button"
          @click.native="filterByPrice(priceMin, priceMax)"
        >Filter</router-link>
        <!-- <button type="button" @click="filterByPrice(priceMin, priceMax)">Filter</button> -->
      </div>
    </div>
    <div v-show="false">{{ updatedDataTOparent }}</div>
    <!-- {{ productsAfterFilter }} -->
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "filterByPrice",
  data() {
    return {
      displayMax: 1,
      priceMin: 9,
      priceMax: 159,
      productsAfterFilter: [],
      productsAllFromParentProps: this.productsAllFromParent
    };
  },
  props: {
    productsAllFromParent: Array
  },
  mounted() {
    this.$store.dispatch("fetchPosts");
  },
  methods: {
    filterByPrice(priceMin, priceMax) {
      var temp = [];
      var a = 0;
      for (var i = 0; i < this.productsFilter.length; i++) {
        if (
          this.productsFilter[i].price >= priceMin &&
          this.productsFilter[i].price <= priceMax
        ) {
          temp.push(this.productsFilter[i]);
        }
      }
      this.productsAfterFilter = [];
      return (this.productsAfterFilter = temp);
    }
  },
  computed: {
    ...mapGetters(["productsAll"]),
    productsFilter() {
      return this.$store.getters.productsAll;
    },
    updatedDataTOparent() {
      this.productsAllFromParentProps = this.productsAfterFilter;
      this.$emit("updatedDataTOparent", this.productsAllFromParentProps);
    },
    showNitification() {
      if (this.priceMin > this.priceMax) {
        this.$notify({
          group: "foo",
          type: "error",
          reverse: true,
          title: "Wrong Minimum Price",
          text: "Minimum price must not bigger than maximum price"
        });
      }
    }
  }
};
</script>
<style scoped>
.customerStyle {
  background-color: #626262;
  border: none;
  color: white;
  padding: 3px 4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  /* margin: 4px 2px; */
  cursor: pointer;
}
.price-slider {
  position: relative;
  width: 100%;
  margin: 0 auto 20px;
  height: 35px;
  text-align: center;
}
.price-slider input {
  pointer-events: none;
  position: absolute;
  left: 0;
  top: 15px;
  width: 100%;
  outline: none;
  height: 18px;
  margin: 0;
  padding: 0;
  border-radius: 8px;
}
.price-slider input::-webkit-slider-thumb {
  pointer-events: all;
  position: relative;
  z-index: 1;
  outline: 0;
  -webkit-appearance: none;
  height: 24px;
  width: 24px;
  border-radius: 12px;
  background-color: white;
  border: 2px solid black;
}
</style>
