@extends('layouts.usersUpdate')
@section('contents')
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- header start -->
    <main-header></main-header>
    <router-view></router-view>
    <!-- header end -->

    {{-- start slide area    --}}
    <router-view name="slide-area"></router-view>
    {{-- <slide-area></slide-area> --}}
    {{-- end slide area --}}

    <!-- product area start -->
    <router-view name="product-area"></router-view>
    {{-- <product-area></product-area> --}}
    <!-- product area end -->

    <!-- discount area start -->
    {{-- <router-view name="discount-area"></router-view> --}}
    {{-- <discount-area></discount-area> --}}
    <!-- discount area end -->

    <!-- premium area start -->
    <router-view name="premium-area"></router-view>
    {{-- <premium-area></premium-area> --}}
    <!-- premium area end -->

    <!-- product area start -->
    <router-view name="all-product-area"></router-view>
    {{-- <all-product-area></all-product-area> --}}
    <!-- product area end -->

    <!-- testimonials area start -->
    {{-- <router-view name="testimonials-area"></router-view> --}}
    {{-- <testimonials-area></testimonials-area> --}}
    <!-- testimonials area end -->

    <!-- services area start -->
    {{-- <router-view name="services-area"></router-view> --}}
    {{-- <services-area></services-area> --}}
    <!-- services area end -->

    <!-- footer area start -->
    <footer-area></footer-area>
    <!-- modal -->
    <modal-area></modal-area>
    <!-- modal -->
    {{-- <modal-compare></modal-compare> --}}
@endsection
