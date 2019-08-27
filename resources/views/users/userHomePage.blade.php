@extends('layouts.users')
@section('contents')
{{-- Home page section --}}
<div v-if="show">
    {{-- Start slide area --}}
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @foreach ($productSlide as $SlideValue)
                <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url(uploads/slide_image/{{$SlideValue->image}})">
                    <div class="container">
                        <div class="row">
                            <div class="ml-auto col-lg-6">
                                <div class="furniture-content fadeinup-animated">
                                    <h2 class="animated">Comfort <br>Collection.</h2>
                                    <p class="animated">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry.</p>
                                    <a class="furniture-slider-btn btn-hover animated" href="product-details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
{{-- Start slide area --}}
<div class="slider-area">
    <div class="slider-active owl-carousel">
        <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url(uploads/slide/dairy.jpg)">
            <div class="container">
                <div class="row">
                    <div class="ml-auto col-lg-6" style="background:rgba(255, 0, 0, 0.8);">
                        <div class="furniture-content fadeinup-animated mt-4 mb-4 ml-4">
                            <h2 class="animated" style="color:white;">Dairy Products</h2>
                            <p class="animated" style="color:white;">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                            <a class="furniture-slider-btn btn-hover animated" href="product-details.html" style="color:white;">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url(uploads/slide/vegetables.jpg)">
            <div class="container">
                <div class="row">
                    <div class="ml-auto col-lg-6" style="background:rgba(0, 255, 0, 0.6);">
                        <div class="furniture-content fadeinup-animated mt-4 mb-4 ml-4">
                            <h2 class="animated" style="color:white;">Vegetables</h2>
                            <p class="animated" style="color:white;">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                            <a class="furniture-slider-btn btn-hover animated" href="product-details.html" style="color:white;">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End slide area --}}

    <!-- product popular area start -->
    <div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
        <div class="container-fluid">
            <div class="section-title-6 text-center mb-50">
                <h2>Popular Product</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text</p>
            </div>
            <div class="product-style">
                <div class="popular-product-active owl-carousel">
                    @foreach ($productPopular as $productValue)
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('uploads/product_image/'.$productValue->image)}}" alt="">
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal"
                                    href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">{{$productValue->name}}</a></h4>
                        <span>{{$productValue->price}}</span>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="assets/img/product/furniture/2.jpg" alt="">
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal"
                                    href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">Darcy Sofa</a></h4>
                            <span>$90.00</span>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="assets/img/product/furniture/3.jpg" alt="">
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal"
                                    href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">Bladen Sofa</a></h4>
                            <span>$90.00</span>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="assets/img/product/furniture/4.jpg" alt="">
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal"
                                    href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">Ardenboro Sofa</a></h4>
                            <span>$90.00</span>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="assets/img/product/furniture/1.jpg" alt="">
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal"
                                    href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">Daystar Sofa</a></h4>
                            <span>$90.00</span>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="assets/img/product/furniture/2.jpg" alt="">
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal"
                                    href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">Trivia Accent Chair</a></h4>
                            <span>$90.00</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- product popular area end -->

    <!-- product all area start -->
    <div class="product-style-area pt-120">
        <div class="coustom-container-fluid">
            <div class="section-title-7 text-center">
                <h2>All Products</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text</p>
            </div>
            <div class="product-tab-list text-center mb-65 nav" role="tablist">
                <router-link to="/users/foodHome" data-toggle="tab" role="tab">
                    <h4>Food</h4>
                </router-link>
                <router-link to="/users/drinkHome" data-toggle="tab" role="tab">
                    <h4>Drink</h4>
                </router-link>
                {{-- <a href="#furniture3" data-toggle="tab" role="tab">
                    <h4>ArmChair </h4>
                </a>
                <a href="#furniture4" data-toggle="tab" role="tab">
                    <h4>Light</h4>
                </a>
                <a href="#furniture5" data-toggle="tab" role="tab">
                    <h4> Corner</h4>
                </a> --}}
            </div>
            {{-- <div class="tab-content"> --}}
            {{-- <div class="tab-pane active show fade" id="furniture1" role="tabpanel"> --}}
            <router-view name="productFood"></router-view>
            <router-view name="productDrink"></router-view>
            {{-- </div> --}}
            {{-- </div> --}}
            <div class="view-all-product text-center">
                <a href="/users/shop">View All Product</a>
            </div>
        </div>
    </div>
    <!-- product all area end -->
    {{-- End home page section --}}
</div>

{{-- Shop page section --}}
{{-- <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(https://www.facebook.com/images/fb_icon_325x325.png)">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2> shop grid</h2>
                <ul>
                    <li><a href="#">home</a></li>
                    <li>shop grid</li>
                </ul>
            </div>
        </div>
    </div> --}}
<div class="shop-page-wrapper shop-page-padding ptb-100" v-if="!show">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Search Products</h3>
                        <div class="sidebar-search">
                            <form action="#">
                                <input placeholder="Search Products..." type="text">
                                <button><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Filter by Price</h3>
                        <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-categories">
                            <ul>
                                <li><a href="#">Accessories <span>4</span></a></li>
                                <li><a href="#">Book <span>9</span></a></li>
                                <li><a href="#">Clothing <span>5</span> </a></li>
                                <li><a href="#">Homelife <span>3</span></a></li>
                                <li><a href="#">Kids & Baby <span>4</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-overflow mb-45">
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
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">size</h3>
                        <div class="product-size">
                            <ul>
                                <li><a href="#">xl</a></li>
                                <li><a href="#">m</a></li>
                                <li><a href="#">l</a></li>
                                <li><a href="#">ml</a></li>
                                <li><a href="#">lm</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">tag</h3>
                        <div class="product-tags">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Bag</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Tie</a></li>
                                <li><a href="#">Women</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Top rated products</h3>
                        <div class="sidebar-top-rated-all">
                            <div class="sidebar-top-rated mb-30">
                                <div class="single-top-rated">
                                    <div class="top-rated-img">
                                        <a href="#"><img src="{{asset('assets/img/product/sidebar-product/1.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="top-rated-text">
                                        <h4><a href="#">Flying Drone</a></h4>
                                        <div class="top-rated-rating">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <span>$140.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-top-rated mb-30">
                                <div class="single-top-rated">
                                    <div class="top-rated-img">
                                        <a href="#"><img src="{{asset('assets/img/product/sidebar-product/2.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="top-rated-text">
                                        <h4><a href="#">Flying Drone</a></h4>
                                        <div class="top-rated-rating">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <span>$140.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-top-rated mb-30">
                                <div class="single-top-rated">
                                    <div class="top-rated-img">
                                        <a href="#"><img src="{{asset('assets/img/product/sidebar-product/3.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="top-rated-text">
                                        <h4><a href="#">Flying Drone</a></h4>
                                        <div class="top-rated-rating">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <span>$140.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-top-rated mb-30">
                                <div class="single-top-rated">
                                    <div class="top-rated-img">
                                        <a href="#"><img src="{{asset('assets/img/product/sidebar-product/4.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="top-rated-text">
                                        <h4><a href="#">Flying Drone</a></h4>
                                        <div class="top-rated-rating">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                            </ul>
                                        </div>
                                        <span>$140.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <p><span>23</span> Product Found of <span>50</span></p>
                                </div>
                                <div class="shop-selector">
                                    <label>Sort By : </label>
                                    <select name="select">
                                        <option value="">Default</option>
                                        <option value="">A to Z</option>
                                        <option value=""> Z to A</option>
                                        <option value="">In stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar1" data-toggle="tab" role="tab"
                                        aria-selected="false">

                                        <i class="ti-layout-grid4-alt"></i>
                                    </a>
                                    <a href="#grid-sidebar2" data-toggle="tab" role="tab" aria-selected="true">
                                        <i class="ti-menu"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <router-view></router-view>

                    </div>
                </div>
                {{-- <div class="pagination-style mt-30 text-center">
                        <ul>
                            <li><a href="#"><i class="ti-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">19</a></li>
                            <li class="active"><a href="#"><i class="ti-angle-right"></i></a></li>
                        </ul>
                    </div> --}}
            </div>
        </div>
    </div>
</div>
{{-- Shop page section --}}
@endsection