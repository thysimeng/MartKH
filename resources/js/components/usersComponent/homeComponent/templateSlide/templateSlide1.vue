<template>
  <!-- <slide>
      <div
        class="single-slider-4 slider-height-6 bg-img"
        style="background-image: url(https://www.facebook.com/images/fb_icon_325x325.png)"
      >
        <div class="container">
          <div class="row">
            <div class="ml-auto col-lg-6" style="background:rgba(255, 0, 0, 0.8);">
              <div class="furniture-content fadeinup-animated mt-4 mb-4 ml-4">
                <h2 class="animated" style="color:white;">Dairy Products</h2>
                <p class="animated" style="color:white;">
                  Lorem Ipsum is simply dummy text of the
                  printing and typesetting
                  industry.
                </p>
                <a
                  class="furniture-slider-btn btn-hover animated"
                  href="product-details.html"
                  style="color:white;"
                >Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </slide>-->

  <div class="banner-area3">
    <div class="pl-100 pr-100">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-12 col-lg-4 col-xl-4">
            <carousel
              :per-page="1"
              :navigate-to="someLocalProperty"
              :mouse-drag="true"
              :autoplay="true"
              :autoplayTimeout="2000"
              :loop="true"
              :paginationEnabled="false"
            >
              <slide>
                <div class="banner-wrapper mrgn-negative">
                  <a href="#">
                    <img src="assets/img/banner/8.jpg" alt />
                  </a>
                  <div class="banner-wrapper2-content">
                    <h3>Speatial</h3>
                    <h2>Style</h2>
                    <span>Start from $299.00</span>
                  </div>
                </div>
              </slide>
              <slide>
                <div class="banner-wrapper mrgn-negative">
                  <a href="#">
                    <img src="assets/img/banner/8.jpg" alt />
                  </a>
                  <div class="banner-wrapper2-content">
                    <h3>Speatial</h3>
                    <h2>Style</h2>
                    <span>Start from $299.00</span>
                  </div>
                </div>
              </slide>
            </carousel>
          </div>
          <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="row no-gutters banner-mrg">
              <div class="col-md-6">
                <div class="banner-wrapper mrgn-b-5 mrgn-r-5">
                  <carousel
                    :per-page="1"
                    :navigate-to="someLocalProperty"
                    :mouse-drag="true"
                    :autoplay="true"
                    :autoplayTimeout="2000"
                    :loop="true"
                    :paginationEnabled="false"
                  >
                    <slide>
                      <img src="assets/img/banner/9.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#1">Shop Now</a>
                      </div>
                    </slide>
                  </carousel>
                  <!-- <div1></div1> -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="banner-wrapper mrgn-b-5">
                  <carousel
                    :per-page="1"
                    :navigate-to="someLocalProperty"
                    :mouse-drag="true"
                    :autoplay="true"
                    :autoplayTimeout="3000"
                    :loop="true"
                    :paginationEnabled="false"
                  >
                    <slide>
                      <img src="assets/img/banner/10.jpg" alt />
                      <div class="banner-wrapper3-content banner-text-color">
                        <a href="#2">Shop Now</a>
                      </div>
                    </slide>
                    <slide>
                      <img src="assets/img/banner/10.jpg" alt />
                      <div class="banner-wrapper3-content banner-text-color">
                        <a href="#2">Shop Now</a>
                      </div>
                    </slide>
                  </carousel>
                </div>
              </div>
              <div class="col-md-6">
                <div class="banner-wrapper mrgn-r-5">
                  <carousel
                    :per-page="1"
                    :navigate-to="someLocalProperty"
                    :mouse-drag="true"
                    :autoplay="true"
                    :autoplayTimeout="2000"
                    :loop="true"
                    :paginationEnabled="false"
                  >
                    <slide>
                      <img src="assets/img/banner/11.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#3">Shop Now</a>
                      </div>
                    </slide>
                    <slide>
                      <img src="assets/img/banner/11.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#3">Shop Now</a>
                      </div>
                    </slide>
                  </carousel>
                </div>
              </div>
              <div class="col-md-6">
                <div class="banner-wrapper">
                  <carousel
                    :per-page="1"
                    :navigate-to="someLocalProperty"
                    :mouse-drag="true"
                    :autoplay="true"
                    :autoplayTimeout="5000"
                    :loop="true"
                    :paginationEnabled="false"
                  >
                    <slide>
                      <img src="assets/img/banner/12.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#4">Shop Now</a>
                      </div>
                    </slide>
                    <slide>
                      <img src="assets/img/banner/12.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#4">Shop Now</a>
                      </div>
                    </slide>
                  </carousel>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <slide>
    </slide>
    <slide>
      <div class="banner-area3">
        <div class="pl-100 pr-100">
          <div class="container">
            <div class="row no-gutters">
              <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="banner-wrapper mrgn-negative">
                  <a href="#">
                    <img src="assets/img/banner/8.jpg" alt />
                  </a>
                  <div class="banner-wrapper2-content">
                    <h3>Speatial</h3>
                    <h2>Style</h2>
                    <span>Start from $299.00</span>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-8 col-xl-8">
                <div class="row no-gutters banner-mrg">
                  <div class="col-md-6">
                    <div class="banner-wrapper mrgn-b-5 mrgn-r-5">
                      <img src="assets/img/banner/9.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#">Shop Now</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="banner-wrapper mrgn-b-5">
                      <img src="assets/img/banner/10.jpg" alt />
                      <div class="banner-wrapper3-content banner-text-color">
                        <a href="#">Shop Now</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="banner-wrapper mrgn-r-5">
                      <img src="assets/img/banner/11.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#">Shop Now</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="banner-wrapper">
                      <img src="assets/img/banner/12.jpg" alt />
                      <div class="banner-wrapper3-content">
                        <a href="#">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </slide>-->
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
// import div1 from "./subtemplate/div1.vue"
export default {
  data() {
    return {
      //   data: [
      //     '<div class="example-slide">Slide 1</div>',
      //     '<div class="example-slide">Slide 2</div>',
      //     '<div class="example-slide">Slide 3</div>'
      //   ]
    };
  },
  components: {
    Carousel,
    Slide
    // div1
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
