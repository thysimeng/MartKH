@extends('layouts.users')
@section('contents')
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
                            <h4><a href="product-details.html">Sofa Chaise Sleeper</a></h4>
                            <span>$90.00</span>
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
@endsection
