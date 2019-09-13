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
    <slide-Show></slide-Show>
    {{-- Start slide area --}}
    {{-- template 1  --}}
    {{-- <div class="container-custom-1 mt-4">
        <div class="row row-first no-gutters">
            <div class="col-md-12 col-lg-6 order-lg-2 col-xl-3 order-xl-1 nopadding">
                <div class="slider-area">
                    <div class="slider-active-3 owl-carousel owl-theme">
                        @foreach ($adsLeft1 as $adLeft1)
                        <div data-dot="<span></span>">
                            <img src="{{ asset('uploads/ads_image/template1/adsLeft/'.$adLeft1->image) }}"
                                style="object-fit:scale-down;max-height:700px;" class="img-fluid float-left mt-2"
                                alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 order-lg-1 col-xl-6 order-xl-2 nopadding">
                <div class="slider-area">
                    <div class="slider-active-4 owl-carousel owl-theme">
                        @foreach ($adsMiddle1 as $adMiddle1)
                        <div class=" ads-img" data-dot="<span></span>">
                            <img src="{{ asset('uploads/ads_image/template1/adsMiddle/'.$adMiddle1->image) }}"
                                style="object-fit:cover;" class="img-fluid img-ads mt-2" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 order-lg-3 col-xl-3 order-xl-3 nopadding">
                <div class="row no-gutters">
                    <div class="col-md-12 nopadding">
                        <div class="slider-area">
                            <div class="slider-active-3 owl-carousel owl-theme">
                                @foreach ($adsTopRight1 as $adTopRight1)
                                <img src="{{ asset('uploads/ads_image/template1/adsTopRight/'.$adTopRight1->image)}}"
                                    style="object-fit:scale-down;max-height:350px" class="img-fluid float-right mt-2"
                                    alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 nopadding">
                        <div class="slider-area">
                            <div class="slider-active-3 owl-carousel owl-theme">
                                @foreach ($adsBottomRight1 as $adBottomRight1)
                                <img src="{{ asset('uploads/ads_image/template1/adsBottomRight/'.$adBottomRight1->image)}}"
                                    style="object-fit:scale-down;max-height:350px" class="img-fluid float-right" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- End template 1  --}}
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
                                {{-- <form action="{{ url('/users/wishlist') }}" method="post" id="submitWishList">
                                @csrf
                                <input type="hidden" name="product_id" value="">
                                <a onclick="wishList({{ $productValue->id }})" class="animate-left my-click"
                                    title="Wishlist" href="javascript:void(0)" id="buttonSubmitWishList">
                                    <i class="pe-7s-like"></i>
                                </a>
                                </form> --}}
                                <add-Towish-List :product-i-d="{{ $productValue->id }}"></add-Towish-List>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a href class="animate-right" title="Quick View" data-toggle="modal" data-target="#VUEModal"
                                    @click="quickView({{ $productValue->id }}, '{{ $productValue->image }}', '{{ $productValue->name }}', '{{ $productValue->description }}')">
                                    <i class="pe-7s-look"></i>
                                </a>
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
            <product-Food :productshomecate="productshomecate" @senddata="productshomecate = $event"
                @senddatashowmodal="showmodal = $event"></product-Food>
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

{{-- test template 2 --}}
<div class="container-custom-2 mt-4">
    <div class="row row-first ">
        <div class="col-md-12 col-lg-8 col-xl-8 ">
            <div class="slider-area">
                <div class="slider-active-4 owl-carousel owl-theme">
                    @foreach ($adsLeft2 as $adLeft2)
                    <div data-dot="<span></span>">
                        {{-- <a href="#"><img src="{{ asset('uploads/slide/vegetables (1).jpg')}}"
                        style="object-fit:scale-down;max-height:960px;" class="img-fluid mt-3" alt=""></a> --}}
                        <img src="{{ asset('uploads/ads_image/template2/adsLeft/'.$adLeft2->image) }}"
                            style="object-fit:scale-down;max-height:960px;" class="img-fluid mt-3" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 col-xl-4 ">
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="slider-area">
                        <div class="slider-active-3 owl-carousel owl-theme">
                            @foreach ($adsTopRight2 as $adTopRight2)
                            <img src="{{ asset('uploads/ads_image/template2/adsTopRight/'.$adTopRight2->image)}}"
                                style="object-fit:scale-down;max-height:480px;" class="img-fluid mt-3" alt="">
                            {{-- <a href="#"><img src="{{ asset('uploads/slide/supermarket (1).jpg')}}"
                            style="object-fit:scale-down;max-height:480px;" class="img-fluid mt-3" alt=""></a> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="slider-area">
                        <div class="slider-active-3 owl-carousel owl-theme">
                            @foreach ($adsBottomRight2 as $adBottomRight2)
                            <img src="{{ asset('uploads/ads_image/template2/adsBottomRight/'.$adBottomRight2->image)}}"
                                style="object-fit:scale-down;max-height:480px;" class="img-fluid mt-3" alt="">
                            {{-- <a href="#"><img src="{{ asset('uploads/slide/supermarket (1).jpg')}}"
                            style="object-fit:scale-down;max-height:480px;" class="img-fluid mt-3" alt=""></a> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End test template 2 --}}

{{-- test template 3 --}}
<div class="container-custom-3 mt-3">
    <div class="row row-first">
        <div class="col-12">
            <div class="slider-area">
                <div class="slider-active-4 owl-carousel owl-theme">
                    @foreach ($adsMiddle3 as $adMiddle3)
                    <div data-dot="<span></span>">
                        {{-- <a href="#"><img src="{{ asset('uploads/slide/vegetables (1).jpg')}}"
                        style="object-fit:cover;max-height:760px;" class="img-fluid" alt=""></a> --}}
                        <img src="{{ asset('uploads/ads_image/template3/adsMiddle/'.$adMiddle3->image) }}"
                            style="object-fit:cover;max-height:760px;" class="img-fluid" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End test template 3 --}}

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
    // $(document).ready(function(){
    // });
</script>

<script>
    var id = null;

    function wishList(id,name) {
        document.querySelector('[name="product_id"]').setAttribute('value', id);
    }

</script>
@endsection
