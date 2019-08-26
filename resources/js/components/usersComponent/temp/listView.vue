<template>
  <div class="row">
    <div class="col-lg-12 col-xl-6"  v-for="post in posts" v-bind:data="post" v-bind:key="post.key">
      <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
        <div class="product-img list-img-width">
          <a href="#">
            <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" alt />
          </a>
          <span>hot</span>
          <div class="product-action-list-style">
            <a
              class="animate-right"
              title="Quick View"
              data-toggle="modal"
              data-target="#exampleModal"
              href="#"
            >
              <i class="pe-7s-look"></i>
            </a>
          </div>
        </div>
        <div class="product-content-list">
          <div class="product-list-info">
            <h4>
              <a href="#"> {{ post.name }} </a>
            </h4>
            <span>$150.00</span>
            <p>Lorem ipsum dolor sit amet, mana consectetur adipisicing elit, sed do eiusmod tempor labore.</p>
          </div>
          <div class="product-list-cart-wishlist">
            <div class="product-list-cart">
              <a class="btn-hover list-btn-style" href="#">add to cart</a>
            </div>
            <div class="product-list-wishlist">
              <a class="btn-hover list-btn-wishlist" href="#">
                <i class="pe-7s-like"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import posts from "./Posts.vue";
import { mapGetters } from "vuex";

export default {
  name: "Posts",
  mounted() {
    this.$store.dispatch("fetchPosts");
  },
  methods: {
    deletePost(post) {
      this.$store.dispatch("deletePost", post);
    }
  },
  computed: {
    ...mapGetters(["posts"])
  }
};
</script>
