<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MartKH</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="{{asset('image/x-icon')}}" href="{{asset('icon/mkh.png')}}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/all.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icofont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <div id="app">
        <!-- header start -->
        <header>
            <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                <div class="container-fluid">
                    <div class="header-bottom-wrapper">
                        <div class="logo-2 furniture-logo ptb-30">
                            <a href="/users">
                                {{-- <img src="{{asset('assets/img/logo/2.png')}}" alt=""> --}}
                                <img src="{{asset('icon/mkh-logo.png')}}" alt="" style="width:250px;height:78px;">
                            </a>
                        </div>
                        <div class="menu-style-2 furniture-menu menu-hover">
                            <nav>
                                <ul>
                                    <li><a href="/users">Home</a>
                                        {{-- <router-link to="/users" @click.native="showHomePage()">Home</router-link> --}}
                                        <ul class="single-dropdown">
                                            <li><a href="index.html">Fashion</a></li>
                                            {{-- <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                            <li><a href="index-fruits.html">fruits</a></li>
                                            <li><a href="index-book.html">book</a></li>
                                            <li><a href="index-electronics.html">electronics</a></li>
                                            <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                            <li><a href="index-food.html">food & drink</a></li>
                                            <li><a href="index-furniture.html">furniture</a></li>
                                            <li><a href="index-handicraft.html">handicraft</a></li>
                                            <li><a target="_blank" href="index-smart-watch.html">smart watch</a></li>
                                            <li><a href="index-sports.html">sports</a></li> --}}
                                        </ul>
                                    </li>
                                    {{-- <li><a href="/food">Food</a>
                                        <ul class="single-dropdown">
                                            <li>
                                                <router-link to="/food">Food</router-link>
                                            </li>
                                            <li>
                                                <router-link to="/drink">Drink</router-link>
                                            </li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="cart.html">cart page</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/drink">drink</a>
                                        <div class="category-menu-dropdown shop-menu">
                                            <div class="category-dropdown-style category-common2 mb-30">
                                                <h4 class="categories-subtitle"> shop layout</h4>
                                                <ul>
                                                    <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                                    <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                                    <li><a href="shop.html">grid 4 column</a></li>
                                                    <li><a href="shop-grid-box.html">grid box style</a></li>
                                                    <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                                    <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                                    <li><a href="shop-list-box.html">list box style</a></li>
                                                    <li><a href="cart.html">shopping cart</a></li>
                                                    <li><a href="wishlist.html">wishlist</a></li>
                                                </ul>
                                            </div>
                                            <div class="category-dropdown-style category-common2 mb-30">
                                                <h4 class="categories-subtitle">shop</h4>
                                                <ul>
                                                    <li><a href="product-details.html">tab style 1</a></li>
                                                    <li><a href="product-details-2.html">tab style 2</a></li>
                                                    <li><a href="product-details-3.html"> tab style 3</a></li>
                                                    <li><a href="product-details-4.html">sticky style</a></li>
                                                    <li><a href="product-details-5.html">sticky style 2</a></li>
                                                    <li><a href="product-details-6.html">gallery style</a></li>
                                                    <li><a href="product-details-7.html">gallery style 2</a></li>
                                                    <li><a href="product-details-8.html">fixed image style</a></li>
                                                    <li><a href="product-details-9.html">fixed image style 2</a></li>
                                                </ul>
                                            </div>
                                            <div class="mega-banner-img">
                                                <a href="single-product.html">
                                                    <img src="{{asset('assets/img/banner/18.jpg')}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li> --}}
                                <li><router-link to="/users/shop" @click.native="showPage()">Shop</router-link>
                                        <ul class="single-dropdown">
                                            <li><router-link to="/users/shop/foodVue" @click.native="showPage()">Food</router-link></li>
                                            {{-- <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-details-sidebar.html">blog details 2</a></li> --}}
                                        </ul>
                                    </li>
                                    {{-- <li><a href="contact.html">contact</a></li> --}}
                                </ul>
                            </nav>
                        </div>
                        <div class="header-cart">
                            <a class="icon-cart-furniture" href="#">
                                <i class="ti-shopping-cart"></i>
                                <span class="shop-count-furniture green" style="background-color:red;">02</span>
                            </a>
                            <ul class="cart-dropdown">
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img src="{{asset('assets/img/cart/1.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h5><a href="#"> Bits Headphone</a></h5>
                                        <h6><a href="#">Black</a></h6>
                                        <span>$80.00 x 1</span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </div>
                                </li>
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img src="{{asset('assets/img/cart/2.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h5><a href="#"> Bits Headphone</a></h5>
                                        <h6><a href="#">Black</a></h6>
                                        <span>$80.00 x 1</span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </div>
                                </li>
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img src="{{asset('assets/img/cart/3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h5><a href="#"> Bits Headphone</a></h5>
                                        <h6><a href="#">Black</a></h6>
                                        <span>$80.00 x 1</span>
                                    </div>
                                    <div class="cart-delete">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </div>
                                </li>
                                <li class="cart-space">
                                    <div class="cart-sub">
                                        <h4>Subtotal</h4>
                                    </div>
                                    <div class="cart-price">
                                        <h4>$240.00</h4>
                                    </div>
                                </li>
                                <li class="cart-btn-wrapper">
                                    <a class="cart-btn btn-hover" href="#">view cart</a>
                                    <a class="cart-btn btn-hover" href="#">checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="/users">HOME</a>
                                            <ul>
                                                <li><a href="index.html">Fashion</a></li>
                                                <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                                {{-- <li><a href="index-fruits.html">Fruits</a></li>
                                                <li><a href="index-book.html">book</a></li>
                                                <li><a href="index-electronics.html">electronics</a></li>
                                                <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                                <li><a href="index-food.html">food & drink</a></li>
                                                <li><a href="index-furniture.html">furniture</a></li>
                                                <li><a href="index-handicraft.html">handicraft</a></li>
                                                <li><a href="index-smart-watch.html">smart watch</a></li>
                                                <li><a href="index-sports.html">sports</a></li> --}}
                                            </ul>
                                        </li>
                                        <li><router-link to="/users/shop" @click.native="showPage()">Shop</router-link>
                                            <ul>
                                                <li><router-link to="/users/shop/foodVue" @click.native="showPage()">Food</router-link></li>
                                                {{-- <li><a href="menu-list.html">menu list</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="register.html">register</a></li>
                                                <li><a href="cart.html">cart page</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="contact.html">contact</a></li> --}}
                                            </ul>
                                        </li>
                                        {{-- <li><a href="#">shop</a>
                                            <ul>
                                                <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                                <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                                <li><a href="shop.html">grid 4 column</a></li>
                                                <li><a href="shop-grid-box.html">grid box style</a></li>
                                                <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                                <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                                <li><a href="shop-list-box.html">list box style</a></li>
                                                <li><a href="product-details.html">tab style 1</a></li>
                                                <li><a href="product-details-2.html">tab style 2</a></li>
                                                <li><a href="product-details-3.html"> tab style 3</a></li>
                                                <li><a href="product-details-4.html">sticky style</a></li>
                                                <li><a href="product-details-5.html">sticky style 2</a></li>
                                                <li><a href="product-details-6.html">gallery style</a></li>
                                                <li><a href="product-details-7.html">gallery style 2</a></li>
                                                <li><a href="product-details-8.html">fixed image style</a></li>
                                                <li><a href="product-details-9.html">fixed image style 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">BLOG</a>
                                            <ul>
                                                <li><a href="blog.html">blog 3 colunm</a></li>
                                                <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html"> Contact </a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-furniture wrapper-padding-2 border-top-3 border-bottom-3">
                <div class="container-fluid">
                    <div class="furniture-bottom-wrapper">
                        <div class="furniture-login">
                            <ul>
                                @auth
                                @if (Route::has('login'))
                                <li><a href="/users/profile">Profile</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @endif
                                @endauth

                                @if ( Auth::guest() )
                                <li>Get Access: <a href="/login">login</a></li>
                                <li><a href="/register">register</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="furniture-search">
                            <form action="#">
                                <input placeholder="I am Searching for . . ." type="text">
                                <button>
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="furniture-wishlist">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i
                                            class="ti-reload"></i> Compare</a></li>
                                <li><a href="wishlist.html"><i class="ti-heart"></i> Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        @yield('contents')
        {{-- footer start --}}
        <footer class="footer-area">
            <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
                <div class="container-fluid">
                    <div class="widget-wrapper">
                        <div class="footer-widget mb-30">
                            <a href="#"><img src="{{asset('icon/mkh-logo.png')}}" alt="" style="width:250px;"></a>
                            <div class="footer-about-2">
                                <p>MartKh provide you everything<br>Food, drink and shop place<br>Find what you want</p>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Contact Info</h3>
                            <div class="footer-info-wrapper-3">
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Address: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>Heng Ly<br>Phnom Penh</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Phone: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>+8801 (33) 515609735 <br>+8801 (66) 223352333</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>E-mail: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p><a href="#"> email@domain.com</a> <br><a href="#"> domain@mail.info</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Newsletter</h3>
                            <div class="footer-newsletter-2">
                                <p>Send us your mail or next updates</p>
                                <div id="mc_embed_signup" class="subscribe-form-5">
                                    <form
                                        action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                        class="validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input type="email" value="" name="EMAIL" class="email"
                                                placeholder="Enter mail address" required>
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                            <div class="mc-news" aria-hidden="true"><input type="text"
                                                    name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1"
                                                    value=""></div>
                                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe"
                                                    id="mc-embedded-subscribe" class="button"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom ptb-20 gray-bg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="copyright-furniture">
                                <p>Copyright © <a href="https://hastech.company/">HasTech</a> 2018 . All Right Reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- footer end --}}
    </div>

    <!-- all js here -->
    <script src="{{asset('/js/app.js')}}"></script>
    {{-- <script src="{{asset('/js/all.js')}}"></script> --}}
    <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/ajax-mail.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
