<template>
    <div class="col-lg-9">
        <div class="shop-product-wrapper res-xl res-xl-btn">
            <div class="shop-bar-area">
                <div class="shop-bar pb-60">
                    <div class="shop-found-selector">
                        <div class="shop-found">
                            <p><span>{{ allProductData.to }}  </span> Products of <span>  {{ allProductData.total }} </span>
                            </p>
                        </div>
                        <sortDataDisplay></sortDataDisplay>
                    </div>
                    <div class="shop-filter-tab">
                        <div class="shop-tab nav" role=tablist>
                            <a class="active" href="#grid-sidebar1" data-toggle="tab" role="tab" aria-selected="false">
                                <i class="ti-layout-grid4-alt"></i>
                            </a>
                            <a href="#grid-sidebar2" data-toggle="tab" role="tab" aria-selected="true">
                                <i class="ti-menu"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <productsDisplay></productsDisplay>
            </div>
        </div>
        <div class="pagination-style mt-30 text-center">
            <ul>
                <li>
                    <a @click="dataPerPage(allProductData.prev_page_url)">
                        <i class="ti-angle-left"></i>
                    </a>
                </li>

                <li v-if="allProductData.current_page!=1">
                    <a @click="dataPerPage(allProductData.prev_page_url)">{{allProductData.current_page-1}}</a>
                </li>

                <li class="active">
                    <a>{{allProductData.current_page}}</a>
                </li>

                <li v-if="allProductData.current_page+1<allProductData.last_page">
                    <a @click="dataPerPage(allProductData.next_page_url)">{{allProductData.current_page+1}}</a>
                </li>

                <li v-if="allProductData.current_page+2<allProductData.last_page">
                    <a>...</a>
                </li>

                <li v-if="allProductData.current_page!=allProductData.last_page">
                    <a @click="dataPerPage(allProductData.last_page_url)">{{ allProductData.last_page }}</a>
                </li>

                <li>
                    <a @click="dataPerPage(allProductData.next_page_url)">
                        <i class="ti-angle-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import * as type from '../../../../store/types';
import productsDisplay from './displaySide/productsDisplay';
import sortDataDisplay from './displaySide/sortDataDisplay';
export default {
    name:'displaySide',
    methods:{
        ...mapActions({
            nextPageProducts: type.NEXT_PAGE_PRODUCTS
        }),
        dataPerPage(urlPagenate){
            this.$store.dispatch(type.NEXT_PAGE_PRODUCTS, urlPagenate)
        }
    },
    computed:{
        ...mapGetters([
            'allProductData'
        ])
    },
    components:{
        productsDisplay,
        sortDataDisplay
    }
}
</script>
