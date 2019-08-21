@extends('layouts.users')
@section('contents')
@include('users.contents.slideArea')
<!-- product area start -->
<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
    <div class="container-fluid">
        <div class="section-title-6 text-center mb-50">
            <h2>Popular Product</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text</p>
        </div>
        <router-view name="productPopular"></router-view>
        {{-- <router-view name="food"></router-view> --}}
    </div>
</div>
<!-- product area end -->

<!-- product all area start -->
<div class="product-style-area pt-120">
    <div class="coustom-container-fluid">
        <div class="section-title-7 text-center">
            <h2>All Products</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text</p>
        </div>
        <div class="product-tab-list text-center mb-65 nav" role="tablist">
            <router-link to="/users/foodHome" data-toggle="tab" role="tab"><h4>Food</h4></router-link>
            <router-link to="/users/drinkHome" data-toggle="tab" role="tab"><h4>Drink</h4></router-link>
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
        <div class="tab-content">
            <div class="tab-pane active show fade" id="furniture1" role="tabpanel">
                <router-view name="productFood"></router-view>
                <router-view name="productDrink"></router-view>
            </div>
        </div>
        <div class="view-all-product text-center">
            <a href="/users/shop">View All Product</a>
        </div>
    </div>
</div>
<!-- product all area end -->
@endsection
