<template>
  <div class="shop-product-content tab-content">
    <div id="grid-sidebar1" class="tab-pane fade active show">
      <div class="row">
        <div
          class="col-lg-6 col-md-6 col-xl-3"
          v-for="product in seeMore"
          v-bind:data="product"
          v-bind:key="product.key"
        >
          <div class="product-wrapper mb-30">
            <div class="product-img">
              <a
                href
                title="Quick View"
                data-toggle="modal"
                data-target="#VUEModal"
                @click="quickView(orderedProducts[product-1].id, orderedProducts[product-1].image, orderedProducts[product-1].name, orderedProducts[product-1].description)"
              >
                <img :src="'/uploads/product_image/' + orderedProducts[product-1].image" alt />
              </a>
              <span>hot</span>
              <div class="product-action">
                <!-- <form action @submit="addToWishList">
                  <input type="hidden" :productID="productID=products[product-1].id" />
                  <a class="animate-left" title="Wishlist" href @click="addToWishList">
                    <i class="pe-7s-like"></i>
                  </a>
                </form>-->
                <addTowishList :productID="productID=orderedProducts[product-1].id"></addTowishList>
                <a class="animate-top" title="Add To Cart" href="#">
                  <i class="pe-7s-cart"></i>
                </a>
                <a
                  href
                  class="animate-right"
                  title="Quick View"
                  data-toggle="modal"
                  data-target="#VUEModal"
                  @click="quickView(orderedProducts[product-1].id, orderedProducts[product-1].image, orderedProducts[product-1].name, orderedProducts[product-1].description)"
                >
                  <i class="pe-7s-look"></i>
                </a>
              </div>
            </div>
            <div class="product-content">
              <h4>
                <a href="#">{{ orderedProducts[product-1].name }}</a>
              </h4>
              <span>${{ orderedProducts[product-1].price }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="grid-sidebar2" class="tab-pane fade">
      <div class="row">
        <div
          class="col-lg-12 col-xl-6"
          v-for="product in seeMore"
          v-bind:data="product"
          v-bind:key="product.key"
        >
          <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
            <div class="product-img list-img-width">
              <a
                href
                title="Quick View"
                data-toggle="modal"
                data-target="#VUEModal"
                @click="quickView(orderedProducts[product-1].id, orderedProducts[product-1].image, orderedProducts[product-1].name, orderedProducts[product-1].description)"
              >
                <img :src="'/uploads/product_image/' + orderedProducts[product-1].image" alt />
              </a>
              <span>hot</span>
              <div class="product-action-list-style">
                <a
                  href
                  class="animate-right"
                  title="Quick View"
                  data-toggle="modal"
                  data-target="#VUEModal"
                  @click="quickView(orderedProducts[product-1].id, orderedProducts[product-1].image, orderedProducts[product-1].name, orderedProducts[product-1].description)"
                >
                  <i class="pe-7s-look"></i>
                </a>
              </div>
            </div>
            <div class="product-content-list">
              <div class="product-list-info">
                <h4>
                  <a href="#">{{ orderedProducts[product-1].name }}</a>
                </h4>
                <span>${{ orderedProducts[product-1].price }}</span>
                <p>Lorem ipsum dolor sit amet, mana consectetur adipisicing elit, sed do eiusmod tempor labore.</p>
              </div>
              <div class="product-list-cart-wishlist">
                <div class="product-list-cart">
                  <a class="btn-hover list-btn-style" href="#">add to cart</a>
                </div>
                <div class="product-list-wishlist">
                  <addTowishList
                    class="btn-hover list-btn-wishlist"
                    :productID="productID=orderedProducts[product-1].id"
                  ></addTowishList>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="btn-hover list-btn-style" @click="seeMore++">See more</button>
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
      seeMore: 1,
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
    orderBy: Number
  },
  methods: {
    quickView(PID, v, name, description) {
      return this.productid.push(PID, v, name, description);
    }
  },
  components: {
    modalQuickView: modalQuickView,
    addTowishList
  },
  computed: {
    orderedProducts: function () {
      if (this.orderBy==1){
        return _.orderBy(this.products, 'name')
      }

      else if (this.orderBy==2){
        return _.orderBy(this.products, 'name').reverse()
      }
  }
  }
};
</script>
