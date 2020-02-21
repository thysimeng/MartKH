<template>
  <!-- Start shop page -->
  <div class="shop-page-wrapper shop-page-padding ptb-100">
    <!-- <div
      class="breadcrumb-area pt-205 breadcrumb-padding pb-210"
      style="background-image: url(uploads/ads_image/template3/adsMiddle/1568270410.Thefashion_20180201163145-316360.png)"
    >
      <div class="container-fluid">
        <div class="breadcrumb-content text-center">
          <h2>shop grid</h2>
          <ul>
            <li>
              <a href="#">home</a>
            </li>
            <li>
              <a href>products</a>
            </li>
            <li>{{ categories }}</li>
          </ul>
        </div>
      </div>
    </div>-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <div class="shop-sidebar mr-50">
            <div class="sidebar-widget mb-50">
              <h3 class="sidebar-title">Search Products</h3>
              <div class="sidebar-search">
                <form action="#">
                  <input placeholder="Search Products..." type="text" />
                  <button>
                    <i class="ti-search"></i>
                  </button>
                </form>
              </div>
            </div>

            <!-- <div class="slidecontainer">
              <input type="range" min="1" max="100" value="50" class="slider" id="myRange" />
              <p>
                Value:
                <span id="demo"></span>
              </p>
            </div>-->
            <filterByPrice :productsAllFromParent="productsAllFromParent" @updatedDataTOparent="productsAllFromParent=$event"></filterByPrice>
            <!-- <div class="sidebar-widget mb-45">
              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-categories">
                <ul>
                  <li>
                    <a href="#">
                      Accessories
                      <span>4</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Book
                      <span>9</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Clothing
                      <span>5</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Homelife
                      <span>3</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Kids & Baby
                      <span>4</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>-->
            <!-- <div class="sidebar-widget sidebar-overflow mb-45">
              <h3 class="sidebar-title">color</h3>
              <div class="product-color">
                <ul>
                  <li class="red">b</li>
                  <li class="pink">p</li>
                  <li class="blue">b</li>
                  <li class="sky">b</li>
                  <li class="green">y</li>
                  <li class="purple">g</li>
                </ul>
              </div>
            </div>-->
            <!-- <div class="sidebar-widget mb-40">
              <h3 class="sidebar-title">size</h3>
              <div class="product-size">
                <ul>
                  <li>
                    <a href="#">xl</a>
                  </li>
                  <li>
                    <a href="#">m</a>
                  </li>
                  <li>
                    <a href="#">l</a>
                  </li>
                  <li>
                    <a href="#">ml</a>
                  </li>
                  <li>
                    <a href="#">lm</a>
                  </li>
                </ul>
              </div>
            </div>-->
            <!-- <div class="sidebar-widget mb-40">
              <h3 class="sidebar-title">tag</h3>
              <div class="product-tags">
                <ul>
                  <li>
                    <a href="#">Clothing</a>
                  </li>
                  <li>
                    <a href="#">Bag</a>
                  </li>
                  <li>
                    <a href="#">Women</a>
                  </li>
                  <li>
                    <a href="#">Tie</a>
                  </li>
                  <li>
                    <a href="#">Women</a>
                  </li>
                </ul>
              </div>
            </div> -->
            <!-- <div class="sidebar-widget mb-50">
              <h3 class="sidebar-title">Top rated products</h3>
              <div class="sidebar-top-rated-all">
                <div class="sidebar-top-rated mb-30">
                  <div class="single-top-rated">
                    <div class="top-rated-img">
                      <a href="#">
                        <img src="assets/img/product/sidebar-product/1.jpg" alt />
                      </a>
                    </div>
                    <div class="top-rated-text">
                      <h4>
                        <a href="#">Flying Drone</a>
                      </h4>
                      <div class="top-rated-rating">
                        <ul>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                        </ul>
                      </div>
                      <span>$140.00</span>
                    </div>
                  </div>
                </div>
                <div class="sidebar-top-rated mb-30">
                  <div class="single-top-rated">
                    <div class="top-rated-img">
                      <a href="#">
                        <img src="assets/img/product/sidebar-product/2.jpg" alt />
                      </a>
                    </div>
                    <div class="top-rated-text">
                      <h4>
                        <a href="#">Flying Drone</a>
                      </h4>
                      <div class="top-rated-rating">
                        <ul>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                        </ul>
                      </div>
                      <span>$140.00</span>
                    </div>
                  </div>
                </div>
                <div class="sidebar-top-rated mb-30">
                  <div class="single-top-rated">
                    <div class="top-rated-img">
                      <a href="#">
                        <img src="assets/img/product/sidebar-product/3.jpg" alt />
                      </a>
                    </div>
                    <div class="top-rated-text">
                      <h4>
                        <a href="#">Flying Drone</a>
                      </h4>
                      <div class="top-rated-rating">
                        <ul>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                        </ul>
                      </div>
                      <span>$140.00</span>
                    </div>
                  </div>
                </div>
                <div class="sidebar-top-rated mb-30">
                  <div class="single-top-rated">
                    <div class="top-rated-img">
                      <a href="#">
                        <img src="assets/img/product/sidebar-product/4.jpg" alt />
                      </a>
                    </div>
                    <div class="top-rated-text">
                      <h4>
                        <a href="#">Flying Drone</a>
                      </h4>
                      <div class="top-rated-rating">
                        <ul>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                          <li>
                            <i class="pe-7s-star"></i>
                          </li>
                        </ul>
                      </div>
                      <span>$140.00</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <categories
              :showCategory="showCategory"
              @showCategoryUpdated="showCategory=$event"
              :productsAllFromParent="productsAllFromParent"
              @productsCategoryUpdated="productsAllFromParent=$event"
            ></categories>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="shop-product-wrapper res-xl res-xl-btn">
            <div class="shop-bar-area">
              <div class="shop-bar pb-60">
                <div class="shop-found-selector">
                  <div class="shop-found">
                    <p>
                      <span></span>You can find display product
                      <span></span>
                    </p>
                  </div>
                  <div class="shop-selector">
                    <label>Sort By :</label>
                    <select v-model="selected">
                      <option value="1">Default</option>
                      <option value="1">A to Z</option>
                      <option value="2">Z to A</option>
                      <option value="3">price (Low to Higt)</option>
                      <option value="4">price (High to Low)</option>
                      <!-- <option value=3>In stock</option> -->
                    </select>
                  </div>
                </div>
                <div class="shop-filter-tab">
                  <div class="shop-tab nav" role="tablist">
                    <a
                      class="active"
                      href="#grid-sidebar1"
                      data-toggle="tab"
                      role="tab"
                      aria-selected="false"
                    >
                      <i class="ti-layout-grid4-alt"></i>
                    </a>
                    <a href="#grid-sidebar2" data-toggle="tab" role="tab" aria-selected="true">
                      <i class="ti-menu"></i>
                    </a>
                  </div>
                </div>
              </div>
              <allProductDisplay
                v-if="categories==showCategory&show!=3"
                :products="products=productsAllFromParent"
                :orderBy="orderBy= selected"
              ></allProductDisplay>

                <div v-else-if="categories=='filterByPrice'&show!=3&productsAllFromParent.length==0">
                    <h1>No product match your rang price</h1>
                </div>

              <allProductDisplay
                v-else-if="categories=='filterByPrice'&show!=3&productsAllFromParent.length!=0"
                :products="products=productsAllFromParent"
                :orderBy="orderBy= selected"
              ></allProductDisplay>

              <food v-else-if="categories=='food'&show!=3" :selected="selected"></food>

              <drink v-else-if="categories=='drink'&show!=3" :selected="selected"></drink>

              <shop v-else-if="categories=='all'&show!=3" :selected="selected"></shop>

              <allProductDisplay
                v-else-if="show==3"
                :products="products = productsshop"
                :orderBy="orderBy= selected"
              ></allProductDisplay>

            </div>
          </div>
          <!-- <div class="pagination-style mt-30 text-center">
            <ul>
              <li>
                <a href="#">
                  <i class="ti-angle-left"></i>
                </a>
              </li>
              <li>
                <a href="#">1</a>
              </li>
              <li>
                <a href="#">2</a>
              </li>
              <li>
                <a href="#">...</a>
              </li>
              <li>
                <a href="#">19</a>
              </li>
              <li class="active">
                <a href="#">
                  <i class="ti-angle-right"></i>
                </a>
              </li>
            </ul>
          </div>-->
        </div>
      </div>
    </div>
  </div>
  <!-- <div>
    <h1>Hello World</h1>
  </div>-->
  <!-- End shop page -->
</template>

<script>
import shop from "./shop.vue";
import food from "./food.vue";
import drink from "./drink.vue";
import allProductDisplay from "./allProductDisplay.vue";
import categories from "./categories.vue";
import filterByPrice from "./filterByPrice.vue";
export default {
  name: "shopHomePage",
  data() {
    return {
      categories: this.$route.params.categories,
      selected: '1',
      orderBy: Number,
      showCategory: "",
      productsAllFromParent: [],
      products: this.productsshop,
      priceMin: 1,
      priceMax: 999
    };
  },
  props: {
    productsshop: Array,
    show: Number
  },
  watch: {
    $route(to, from) {
      this.categories = to.params.categories;
    }
  },
  components: {
    shop: shop,
    food: food,
    allProductDisplay: allProductDisplay,
    categories,
    filterByPrice,
    drink
  }
};
</script>
