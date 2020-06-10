<template>
    <div>
        <div v-show="false">{{ SlideData }}{{slideDataGet}}</div>
        <!-- templateID=1 -->
        <div v-if="GetSlide[0].data==1" class="container-custom-1 mt-4">
            <div class="row row-first no-gutters">
                <div class="col-md-12 col-lg-6 order-lg-2 col-xl-3 order-xl-1 nopadding">
                    <carousel :speed="2000" :paginationEnabled="false" :loop="true" :autoplay="true" class="slider-area" :per-page="1" :mouse-drag="false">
                        <slide v-for="slide in GetSlideData.left" :key="slide.key" >
                            <div class="slider-area">
                                <div class="slider-active-3">
                                        <div data-dot="<span></span>">
                                            <img :src="'uploads/ads_image/template1/adsLeft/'+slide.image"
                                                style="object-fit:scale-down;max-height:700px;" class="img-fluid float-left mt-2"
                                                alt="">
                                        </div>
                                </div>
                            </div>
                        </slide>
                    </carousel>
                </div>
                <div class="col-md-12 col-lg-12 order-lg-1 col-xl-6 order-xl-2 nopadding">
                    <carousel :loop="true" :autoplay="true" class="slider-area" :per-page="1" :mouse-drag="false">
                        <slide v-for="slide in GetSlideData.middle" :key="slide.key">
                            <div class="slider-area">
                                <div class="slider-active-4">
                                    <div class=" ads-img" data-dot="<span></span>">
                                        <img :src="'uploads/ads_image/template1/adsMiddle/'+slide.image"
                                            style="object-fit:cover;" class="img-fluid img-ads mt-2" alt="">
                                    </div>
                                </div>
                            </div>
                        </slide>
                    </carousel>
                </div>
                <div class="col-md-12 col-lg-6 order-lg-3 col-xl-3 order-xl-3 nopadding">
                    <div class="row no-gutters">
                        <div class="col-md-12 nopadding">
                            <carousel :speed="1000" :paginationEnabled="false" :loop="true" :autoplay="true" class="slider-area" :per-page="1" :mouse-drag="false">
                                <slide v-for="slide in GetSlideData.topRight" :key="slide.key">
                                    <div class="slider-area">
                                        <div class="slider-active-3">
                                            <img :src="'uploads/ads_image/template1/adsTopRight/'+slide.image"
                                                style="object-fit:scale-down;max-height:350px" class="img-fluid float-right mt-2"
                                                alt="">
                                        </div>
                                    </div>
                                </slide>
                            </carousel>
                        </div>
                        <div class="col-md-12 nopadding">
                            <carousel :speed="3000" :paginationEnabled="false" :loop="true" :autoplay="true" class="slider-area" :per-page="1" :mouse-drag="false">
                                <slide v-for="slide in GetSlideData.bottomRight" :key="slide.key">
                                    <div class="slider-area">
                                        <div class="slider-active-3">
                                            <img :src="'uploads/ads_image/template1/adsBottomRight/'+slide.image"
                                                style="object-fit:scale-down;max-height:350px" class="img-fluid float-right" alt="">
                                        </div>
                                    </div>
                                </slide>
                            </carousel>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- templateID=2 -->
        <div v-if="GetSlide[0].data==2" class="container-custom-2">
            <div class="row row-first ">
                <div class="col-md-12 col-lg-8 col-xl-8 ">
                    <carousel :speed="2000" :paginationEnabled="false" :loop="true" :autoplay="true" class="slider-area" :per-page="1" :mouse-drag="false">
                        <slide v-for="slide in GetSlideData.left" :key="slide.key" >
                            <div class="slider-area">
                                <div class="slider-active-4">
                                    <div data-dot="<span></span>">
                                        <img :src="'uploads/ads_image/template2/adsLeft/'+slide.image"
                                            style="object-fit:scale-down;max-height:960px;" class="img-fluid mt-3" alt="">
                                    </div>
                                </div>
                            </div>
                        </slide>
                    </carousel>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4 ">
                    <div class="row ">
                        <div class="col-md-12 ">
                            <carousel :speed="2000" :paginationEnabled="false" :loop="true" :autoplay="true" class="slider-area" :per-page="1" :mouse-drag="false">
                                <slide v-for="slide in GetSlideData.topRight" :key="slide.key" >
                                    <div class="slider-area">
                                        <div class="slider-active-3">
                                                <div data-dot="<span></span>">
                                                    <img :src="'uploads/ads_image/template2/adsTopRight/'+slide.image"
                                                        style="object-fit:scale-down;max-height:480px;" class="img-fluid mt-3" alt="">
                                                </div>
                                        </div>
                                    </div>
                                </slide>
                            </carousel>
                        </div>
                        <div class="col-md-12">
                            <carousel :speed="2000" :paginationEnabled="false" :loop="true" :autoplay="true" class="slider-area" :per-page="1" :mouse-drag="false">
                                <slide v-for="slide in GetSlideData.bottomRight" :key="slide.key" >
                                    <div class="slider-area">
                                        <div class="slider-active-3">
                                                <div data-dot="<span></span>">
                                                    <img :src="'uploads/ads_image/template2/adsBottomRight/'+slide.image"
                                                        style="object-fit:scale-down;max-height:480px;" class="img-fluid mt-3" alt="">
                                                </div>
                                        </div>
                                    </div>
                                </slide>
                            </carousel>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- templateID=3 -->
        <carousel v-if="GetSlide[0].data==3" class="slider-area" :per-page="1" :mouse-drag="false">
            <slide v-for="slide in GetSlideData" :key="slide.key">
                <div class="container">
                    <div class="single-slider-4 slider-height-6 bg-img" :style="'background-image: url(\'uploads/ads_image/template3/adsMiddle/'+slide.image+'\')'">
                        <div class="row">
                            <div class="ml-auto col-lg-6">
                                <div class="furniture-content fadeinup-animated">
                                    <h2 class="animated">Comfort  <br>Collection.</h2>
                                    <p class="animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a class="furniture-slider-btn btn-hover animated" href="product-details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </slide>
        </carousel>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import * as types from '../store/types'
export default {
    name:'slideArea',
    data(){
        return{
            data:''
        }
    },
    computed:{
        ...mapGetters({
            GetSlide: types.GETTER_SLIDE_ID,
            GetSlideData: types.GETTER_SLIDE_DATA
        }),
        ...mapActions({
            SlideData: types.ACTIONS_SLIDE_ID,
            slideDataGet: types.ACTIONS_SLIDE_DATA
        })
    }
}
</script>
