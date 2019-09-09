<template>
  <carousel>
    <slide v-for="abc in 9" v-bind:data="a" v-bind:key="abc">
      <div class="product-wrapper">
        <div class="product-img">
          <a href="#">
            <img src="assets/img/product/furniture/1.jpg" alt />
          </a>
          <div class="product-action">
            <a class="animate-left" title="Wishlist" href="#">
              <i class="pe-7s-like"></i>
            </a>
            <a class="animate-top" title="Add To Cart" href="#">
              <i class="pe-7s-cart"></i>
            </a>
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
        <div class="funiture-product-content text-center">
          <h4>
            <a href="product-details.html">Sofa Chaise Sleeper</a>
          </h4>
          <span>$90.00</span>
        </div>
      </div>
    </slide>
  </carousel>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
  data() {
    return {
      data: [
        '<div class="example-slide">Slide 1</div>',
        '<div class="example-slide">Slide 2</div>',
        '<div class="example-slide">Slide 3</div>'
      ]
    };
  },
  components: {
    Carousel,
    Slide
  }
};
</script>
