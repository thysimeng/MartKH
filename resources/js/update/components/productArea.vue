<template>
    <div class="popular-product-area wrapper-padding-3 pt-50 pb-115">
        <div class="container-fluid">
            <div class="section-title-6 text-center mb-50">
                <h2>Popular Product</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
            <!-- <div class="product-style">
                <div class="popular-product-active owl-carousel">
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
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">Sofa Chaise Sleeper</a></h4>
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
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
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
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
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
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
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
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
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
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">Trivia Accent Chair</a></h4>
                            <span>$90.00</span>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="product-style">
                <carousel  class="popular-product-active" :per-page="5" :mouse-drag="false">
                    <slide v-for="number in 5" :key="number.key">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRR4rxQwfBzD63gidHccowwLpYiNDtn70jrjDGPHPg09LDtpCsj" alt="">
                                </a>
                                <div class="product-action">
                                    <!-- <a class="animate-left" title="Wishlist" href="#">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                    <a class="animate-top" title="Add To Cart" href="#">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                    <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                        <i class="pe-7s-look"></i>
                                    </a> -->
                                </div>
                            </div>
                            <div class="funiture-product-content text-center">
                                <h4><a href="product-details.html">Sofa Chaise Sleeper</a></h4>
                                <span>$90.00</span>
                            </div>
                        </div>
                    </slide>
                    <slide v-for="number in 5" :key="number.key">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="https://www.nchsoftware.com/slideshow/images/slider-1.jpg" alt="">
                                </a>
                                <div class="product-action">
                                    <!-- <a class="animate-left" title="Wishlist" href="#">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                    <a class="animate-top" title="Add To Cart" href="#">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                    <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                        <i class="pe-7s-look"></i>
                                    </a> -->
                                </div>
                            </div>
                            <div class="funiture-product-content text-center">
                                <h4><a href="product-details.html">Sofa Chaise Sleeper</a></h4>
                                <span>$90.00</span>
                            </div>
                        </div>
                    </slide>
                </carousel>
            </div>
        </div>
    </div>
</template>
