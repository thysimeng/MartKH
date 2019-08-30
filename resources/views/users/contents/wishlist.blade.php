@extends('layouts.users')
@section('contents')
<div class="product-style">
    <div class="popular-product-active owl-carousel">
        @foreach ($data_product as $productValue)
        <div class="product-wrapper">
            <div class="product-img">
                <a href="#">
                    <img src="{{ asset('uploads/product_image/'.$productValue->image)}}" alt="">
                </a>
                <div class="product-action">
                    <a class="animate-top" title="Add To Cart" href="#">
                        <i class="pe-7s-cart"></i>
                    </a>
                    <a class="animate-right" title="Quick View" data-toggle="modal"
                        data-target="#exampleModal" href="#">
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
    </div>
</div>
@endsection