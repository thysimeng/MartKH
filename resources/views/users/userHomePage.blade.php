@extends('layouts.users')
@section('contents')
@if (Session::has('message'))
<div class="alert alert-success">
    <p>{{ Session::get('message') }}</p>
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
</div>
@endif
{{-- Home page section --}}
<div v-if="show">
    {{-- Start slide area --}}
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @foreach ($ads as $ad)
            <div class="single-slider-4 slider-height-6 bg-img"
                style="background-image: url(uploads/ads_image/{{$ad->image}})">
                <div class="container">
                    <div class="row">
                        <div class="ml-auto col-lg-6" style="background:rgba(255, 0, 0, 0.8);">
                            <div class="furniture-content fadeinup-animated mt-4 mb-4 ml-4">
                                <h2 class="animated" style="color:white;">Dairy Products</h2>
                                <p class="animated" style="color:white;">Lorem Ipsum is simply dummy text of the
                                    printing and typesetting
                                    industry.</p>
                                <a class="furniture-slider-btn btn-hover animated" href="product-details.html"
                                    style="color:white;">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- End slide area --}}

    <!-- product popular area start -->
    <div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
        <div class="container-fluid">
            <div class="section-title-6 text-center mb-50">
                <h2>Popular Product</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the
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
                                <form action="{{ route('list-wishlist') }}" method="post" id="submitWishList">
                                    @csrf
                                    <input type="hidden" name="product_id" value="">
                                    <a onclick="wishList({{ $productValue->id }})" class="animate-left my-click"
                                        title="Wishlist" href="javascript:void(0)" id="buttonSubmitWishList">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                    <a class="animate-top" title="Add To Cart" href="#">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                    <a href class="animate-right" title="Quick View" data-toggle="modal"
                                        data-target="#VUEModal"
                                        @click="quickView({{ $productValue->id }}, '{{ $productValue->image }}', '{{ $productValue->name }}', '{{ $productValue->description }}')">
                                        <i class="pe-7s-look"></i>
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">{{$productValue->name}}</a></h4>
                            <span>${{$productValue->price}}</span>
                        </div>
                    </div>
                    @endforeach
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
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the
                    industry's standard dummy text</p>
            </div>
            {{-- Passed and get data from child component  --}}
            <product-Food :productshomecate="productshomecate" @senddata="productshomecate = $event" @senddatashowmodal="showmodal = $event"></product-Food>
            {{-- Passed to productall component for view --}}
            <product-All :productshomecate="productsCategory" :showmodal="showmodal" v-if="showmodal"></product-All>
            <product-All :productshomecate="productshomecate" :showmodal="showmodal"></product-All>
            <div class="view-all-product text-center">
                <router-link to="/users/shop" @click.native="showPage()">View All Product</router-link>
            </div>
        </div>
    </div>
    <modal-Quick-View :productid="producthome"></modal-Quick-View>
</div>
{{-- End home page section --}}

{{-- Start shop page --}}
<div class="shop-page-wrapper shop-page-padding ptb-100" v-if="!show">
    <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210"
        style="background-image: url(https://www.facebook.com/images/fb_icon_325x325.png)">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2> shop grid</h2>
                <ul>
                    <li><a href="#">home</a></li>
                    <li>shop grid</li>
                </ul>
            </div>
        </div>
    </div>
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
                        <router-view name="shop" v-if="products.length==0"></router-view>
                        <router-view name="food" v-if="products.length==0"></router-view>
                        {{-- <router-view name="allProductDisplay"></router-view> --}}
                        {{-- <product-Search></product-Search> --}}
                        {{-- <search-Result></search-Result> --}}
                        <all-Product-Display :products="products" v-if="products.length!=0"></all-Product-Display>
                    </div>
                </div>
                <div class="pagination-style mt-30 text-center">
                    <ul>
                        <li><a href="#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">19</a></li>
                        <li class="active"><a href="#"><i class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End shop page --}}
@endsection

@section('script')
<script type="text/javascript">
    $('.my-click').on('click', function(event) {
                $("#submitWishList").submit();
            });
</script>

<script>
    var id = null;

    function wishList(id,name) {
        document.querySelector('[name="product_id"]').setAttribute('value', id);
    }

</script>
@endsection
