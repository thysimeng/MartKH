<template>
  <!-- <div>
  </div> -->
    <div class="row">
      <div>
        <carousel
          :per-page="1"
          :navigate-to="someLocalProperty"
          :mouse-drag="true"
          :autoplay="true"
          :autoplayTimeout="2000"
        >
          <slide>
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
          </slide>
        </carousel>
      </div>
      <div>
        <carousel
          :per-page="1"
          :navigate-to="someLocalProperty"
          :mouse-drag="true"
          :autoplay="true"
          :autoplayTimeout="2000"
        >
          <slide>
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
          </slide>
        </carousel>
      </div>
    </div>
  <!-- <div class="row">
    <div class="column" style="background-color:#aaa;">
      <h2>Column 1</h2>
      <p>Some text..</p>
    </div>
    <div class="column" style="background-color:#bbb;">
      <h2>Column 2</h2>
      <p>Some text..</p>
    </div>
  </div> -->
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

<style scoped>
.template-slide {
  /* align-items: center;
  background-color: #666;
  color: #999;
  display: flex;
  font-size: 1.5rem;
  justify-content: center; */
  min-height: 10rem;
}

* {
  box-sizing: border-box;
}
/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
