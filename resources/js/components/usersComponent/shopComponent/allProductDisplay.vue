<template>
  <div class="shop-product-content tab-content">
    <div class="shop-found">
      <p>
        <span v-if="orderedProducts.length==0">0</span>
        <span v-else-if="orderedProducts.length<seeMore">{{ orderedProducts.length }}</span>
        <span v-else-if="orderedProducts.length>seeMore">{{ seeMore }}</span>
        <span v-else>{{ seeMore }}</span> Product Found of
        <span>{{ orderedProducts.length }}</span>
      </p>
    </div>
    <div id="grid-sidebar1" class="tab-pane fade active show">
      <div class="row">
        <div
          class="col-lg-6 col-md-6 col-xl-3"
          v-for="(product, index) in orderedProducts"
          v-bind:data="product"
          v-bind:key="product.key"
        >
          <div class="product-wrapper mb-30" v-if="index<seeMore">
            <div class="product-img">
              <a
                href
                title="Quick View"
                data-toggle="modal"
                data-target="#VUEModal"
                @click="quickView(product.id, product.image, product.name, product.description, product.price)"
              >
                <img :src="'/uploads/product_image/'+product.image" alt />
              </a>
              <!-- <span>hot</span> -->
              <div class="product-action">
                <addTowishList :productID="productID=product.id"></addTowishList>
                <!-- <a class="animate-top" title="Add To Cart" href="#">
                  <i class="pe-7s-cart"></i>
                </a> -->
                <!-- <a
                  href
                  class="animate-right"
                  title="Quick View"
                  data-toggle="modal"
                  data-target="#VUEModal"
                  @click="quickView(product.id, product.image, product.name, product.description, product.price)"
                >
                  <i class="pe-7s-look"></i>
                </a> -->
              </div>
            </div>
            <div class="product-content">
              <h4>
                <a href="#">{{ product.name }}</a>
              </h4>
              <span>${{ product.price }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="grid-sidebar2" class="tab-pane fade">
      <div class="row">
        <div
          class="col-lg-12 col-xl-6"
          v-for="(product, index) in orderedProducts"
          v-bind:data="product"
          v-bind:key="product.key"
        >
          <div
            v-if="index<seeMore"
            class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60"
          >
            <div class="product-img list-img-width">
              <a
                href
                title="Quick View"
                data-toggle="modal"
                data-target="#VUEModal"
                @click="quickView(product.id, product.image, product.name, product.description, product.price)"
              >
                <img :src="'/uploads/product_image/'+product.image" alt />
              </a>
              <span>hot</span>
              <div class="product-action-list-style">
                <!-- <a
                  href
                  class="animate-right"
                  title="Quick View"
                  data-toggle="modal"
                  data-target="#VUEModal"
                  @click="quickView(product.id, product.image, product.name, product.description, product.price)"
                >
                  <i class="pe-7s-look"></i>
                </a> -->
              </div>
            </div>
            <div class="product-content-list">
              <div class="product-list-info">
                <h4>
                  <a href="#">{{ product.name }}</a>
                </h4>
                <span>${{ product.price }}</span>
                <p>{{ product.description }}</p>
              </div>
              <div class="product-list-cart-wishlist">
                <!-- <div class="product-list-cart">
                  <a class="btn-hover list-btn-style" href="#">add to cart</a>
                </div> -->
                <div class="product-list-wishlist">
                  <addTowishList
                    class="btn-hover list-btn-wishlist"
                    :productID="productID=product.id"
                  ></addTowishList>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button v-if="products.length>12" class="btn-hover list-btn-style" @click="seeMoreUpdate">See more</button>
    <modalQuickView :productid="productid" @clearData="productid = $event"></modalQuickView>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import modalQuickView from "./modalQuickView.vue";
import addTowishList from "../mastercomponent/addTowishList.vue";

export default {
  name: "productsFood",
  data: function() {
    return {
      seeMore: 12,
      productid: [],
      add: Number,
      productID: Number,
      addStatus: Boolean,
      isActive: Boolean
    };
  },
  //   To use props, they must be declared
  props: {
    products: Array,
    orderBy: String
  },
  methods: {
    quickView(PID, image, name, description, price) {
      return this.productid.push(PID, image, name, description, price);
    },
    seeMoreUpdate(){
        this.seeMore= this.seeMore+4;
    }
  },
  components: {
    modalQuickView: modalQuickView,
    addTowishList
  },
  computed: {
    orderedProducts: function() {
      if (this.orderBy == "1") {
        return _.orderBy(this.products, "name");
      } else if (this.orderBy == "2") {
        return _.orderBy(this.products, "name").reverse();
      } else if (this.orderBy == "3") {
        return _.orderBy(this.products, "price");
      } else if (this.orderBy == "4") {
        return _.orderBy(this.products, "price").reverse();
      }
    }
  }
};
</script>
