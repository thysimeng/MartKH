<template>
  <carousel
    :per-page="1"
    :navigate-to="someLocalProperty"
    :mouse-drag="true"
    :autoplay="true"
    :autoplayTimeout="2000"
  >
    <slide>
      <div class="col-md-6">
        <div class="banner-wrapper mrgn-b-5 mrgn-r-5">
          <img src="assets/img/banner/9.jpg" alt />
          <div class="banner-wrapper3-content">
            <a href="#1">Shop Now</a>
          </div>
        </div>
      </div>
    </slide>
  </carousel>

  <!-- <div>
      hello
  </div> -->
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
  data() {
    return {
    };
  },
  components: {
    Carousel,
    Slide
  }
};
</script>

<style scoped>
.example-slide {
  align-items: center;
  background-color: #666;
  color: #999;
  display: flex;
  font-size: 1.5rem;
  justify-content: center;
  min-height: 10rem;
}
</style>
