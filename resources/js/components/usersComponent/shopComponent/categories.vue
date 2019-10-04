<template>
  <div class="sidebar-widget mb-45">
    <div v-show="false">{{ products }}{{ productCategories }}{{ updateDataToParent }}</div>
    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-categories">
      <ul>
        <li v-for="(category, index) in categories" :data="category" :key="category.key">
          <router-link
            :to="'/products/'+category.categories_name"
            @click.native="showCategoryData(category.categories_name, index)"
            v-if="index!=0&index<5"
          >
            {{ category.categories_name }}
            <span>{{ category.count }}</span>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
import allProductDisplay from "./allProductDisplay.vue";

export default {
  name: "shop",
  data: function() {
    return {
      index: 0,
      orderBy: Number,
      arrCategories: Array,
      categories: {
        categories_name: String,
        count: Number
      },
      productsAllFromParentProps: this.productsAllFromParent,
      showCategoryProps: this.showCategory
    };
  },
  props: {
    showCategory: String,
    productsAllFromParent: Array
  },
  methods: {
    showCategoryData(value, index) {
      this.showCategoryProps = this.categories[index].categories_name;
      this.index = index;
    }
  },
  mounted() {
    this.$Progress.start();
    this.$store.dispatch("fetchPosts");
    this.$Progress.finish();
  },
  computed: {
    ...mapGetters(["productsAll"]),
    products() {
      return this.$store.getters.productsAll;
    },
    productCategories() {
      var uniqueCategories = [{categories_name: String, count: Number}];
      var temp = [];
      var j = 0;
      var shortCatgories = _.orderBy(this.products, "categories_name");
      // push categories_name to uniqueCategories
      for (var i = 0; i < shortCatgories.length; i++) {
        uniqueCategories.push({
          categories_name: shortCatgories[i].categories_name,
          count: 0
        });
      }

      // make categories_name unique
      for (var i = 0; i < uniqueCategories.length - 1; i++) {
        if (
          uniqueCategories[i].categories_name !=
          uniqueCategories[i + 1].categories_name
        ) {
          temp[j++] = uniqueCategories[i];
        }
      }
      temp[j++] = uniqueCategories[uniqueCategories.length - 1];

      // count each element in array
      for (var i = 0; i < temp.length; i++) {
        var count = 0;
        for (var j = 0; j < shortCatgories.length; j++) {
          if (temp[i].categories_name == shortCatgories[j].categories_name) {
            count++;
          }
        }
        temp[i].count = [count];
        count = 1;
      }
      this.categories = temp;
      return;
    },
    updateDataToParent() {
      this.$emit("showCategoryUpdated", this.showCategoryProps);
      this.arrCategories = [];
      for (var i = 0; i < this.products.length; i++) {
        if (
          this.categories[this.index].categories_name ==
          this.products[i].categories_name
        ) {
          this.arrCategories.push(this.products[i]);
        }
      }
      this.productsAllFromParentProps = this.arrCategories;
      this.$emit("productsCategoryUpdated", this.productsAllFromParentProps);
    }
  }
};
</script>
