<template>
  <!-- <div class="banner-area3">
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
  </div>-->
  <div class="container-custom-1 mt-4">
    <div class="row row-first no-gutters">
      <div class="col-md-12 col-lg-6 order-lg-2 col-xl-3 order-xl-1 nopadding">
        <div class="slider-area">
          <div class="slider-active-3 owl-carousel owl-theme">
            <div data-dot="<span></span>">
              <img
                :src="'uploads/ads_image/template1/adsLeft/'+ templateid[0].image"
                style="object-fit:scale-down;max-height:700px;"
                class="img-fluid float-left mt-2"
                alt
              />
            </div>
            <div data-dot="<span></span>">
              <img
                :src="'uploads/ads_image/template1/adsLeft/'+ templateid[0].image"
                style="object-fit:scale-down;max-height:700px;"
                class="img-fluid float-left mt-2"
                alt
              />
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-12 order-lg-1 col-xl-6 order-xl-2 nopadding">
        <div class="slider-area">
          <div class="slider-active-4 owl-carousel owl-theme">
            <div class="ads-img" data-dot="<span></span>">
              <img
                src="uploads/ads_image/template1/adsMiddle/1568275687.1568107607.1567392981.jpg"
                style="object-fit:cover;"
                class="img-fluid img-ads mt-2"
                alt
              />
            </div>
            <div class="ads-img" data-dot="<span></span>">
              <img
                src="uploads/ads_image/template1/adsMiddle/1568275687.1568107607.1567392981.jpg"
                style="object-fit:cover;"
                class="img-fluid img-ads mt-2"
                alt
              />
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 order-lg-3 col-xl-3 order-xl-3 nopadding">
        <div class="row no-gutters">
          <div class="col-md-12 nopadding">
            <div class="slider-area">
              <div class="slider-active-3 owl-carousel owl-theme">
                <img
                  src="uploads/ads_image/template1/adsTopRight/1568275706.1568109172.grocery (2).jpg"
                  style="object-fit:scale-down;max-height:350px"
                  class="img-fluid float-right mt-2"
                  alt
                />
                <img
                  src="uploads/ads_image/template1/adsTopRight/1568275706.1568109172.grocery (2).jpg"
                  style="object-fit:scale-down;max-height:350px"
                  class="img-fluid float-right mt-2"
                  alt
                />
              </div>
            </div>
          </div>
          <div class="col-md-12 nopadding">
            <div class="slider-area">
              <div class="slider-active-3 owl-carousel owl-theme">
                <img
                  src="uploads/ads_image/template1/adsBottomRight/1568275722.1568175438.grocery (2).jpg"
                  style="object-fit:scale-down;max-height:350px"
                  class="img-fluid float-right"
                  alt
                />
                <img
                  src="uploads/ads_image/template1/adsBottomRight/1568275722.1568175438.grocery (2).jpg"
                  style="object-fit:scale-down;max-height:350px"
                  class="img-fluid float-right"
                  alt
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
  data() {
    return {};
  },
  props:{
      templateid: Array
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
