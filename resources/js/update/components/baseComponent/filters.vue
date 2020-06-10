<template>
    <div class="sidebar-widget" :class="[{'mb-40':filtersByPrice},
                                            {'mb-50':fltersBySearch},
                                            {'mb-40':fitersBySize},
                                            {'mb-40':filtersByTag},
                                            {'mb-45':filtersByCategories},
                                            {'mb-50':filtersByRelate},
                                            {'mb-45 sidebar-overflow ':fitersByColors}]">
        <h3 v-if="title!=''" class="sidebar-title">{{ title }}</h3>

        <!-- filter by search -->
        <div v-if="fltersBySearch" class="sidebar-search">
            <form>
                <input placeholder="Search Products..." type="text" v-model="search" required>
                <button @click="SubmitfiltersBySearch"><i class="ti-search"></i></button>
            </form>
        </div>

        <!-- filter by price -->
        <input v-if="filtersByPrice" type="range" v-model="min">
        <input v-if="filtersByPrice" type="range" v-model="max">
        <div v-if="filtersByPrice" class="price_slider_amount price_filter">
            <div class="label-input">
                <label>price : </label>
                <input type="text" placeholder="Min" v-model="min"/>
                <input type="text" value="-" style="width: 15px;"/>
                <input type="text" placeholder="Max" v-model="max"/>
            </div>
            <form @submit="filterByPriceSubmit">
                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- filter by categories -->
        <div v-if="filtersByCategories" class="sidebar-categories">
            <div v-show="false">{{ fetchData }}</div>
            <ul v-for="category in categories" :key="category.key">
                <li style="cursor: pointer;"><a @click="fetchDataMethods(category.categories_name)">{{ category.categories_name }} <span>{{ category.count }}</span></a></a></li>
                <!-- <li><a href="#">Book <span>9</span></a></li> -->
            </ul>
        </div>

        <!-- filter by colors -->
        <div v-if="fitersByColors" class="product-color">
            <ul>
                <li class="red">b</li>
                <li class="pink">p</li>
                <li class="blue">b</li>
                <li class="sky">b</li>
                <li class="green">y</li>
                <li class="purple">g</li>
            </ul>
        </div>

        <!-- filter by size -->
        <div class="product-size" v-if="fitersBySize">
            <ul>
                <li><a href="#">xl</a></li>
                <li><a href="#">m</a></li>
                <li><a href="#">l</a></li>
                <li><a href="#">ml</a></li>
                <li><a href="#">lm</a></li>
            </ul>
        </div>

        <!-- filters by Tag -->
        <div v-if="filtersByTag" class="product-tags">
            <ul>
                <li><a href="#">Clothing</a></li>
                <li><a href="#">Bag</a></li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Tie</a></li>
                <li><a href="#">Women</a></li>
            </ul>
        </div>

        <!-- relate products -->
        <div v-if="filtersByRelate" class="sidebar-top-rated-all">
            <div class="sidebar-top-rated mb-30">
                <div class="single-top-rated">
                    <div class="top-rated-img">
                        <a href="#"><img src="assets/img/product/sidebar-product/1.jpg" alt=""></a>
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
                        <a href="#"><img src="assets/img/product/sidebar-product/2.jpg" alt=""></a>
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
                        <a href="#"><img src="assets/img/product/sidebar-product/3.jpg" alt=""></a>
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
                        <a href="#"><img src="assets/img/product/sidebar-product/4.jpg" alt=""></a>
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
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import * as types from '../../store/types'
export default {
    name:'filterByPrice',
    data(){
        return{
            min:1,
            max:3,
            search:''
        }
    },
    props:{
        title:{
            type: String,
            default:''
        },
        filtersByPrice:{
            type: Boolean,
            default: false
        },
        fltersBySearch:{
            type: Boolean,
            default: false
        },
        fitersByColors:{
            type: Boolean,
            default: false
        },
        fitersBySize:{
            type: Boolean,
            default: false
        },
        filtersByCategories:{
            type: Boolean,
            default: false
        },
        filtersByTag:{
            type: Boolean,
            default: false
        },
        filtersByRelate:{
            type: Boolean,
            default: false
        },

    },
    methods:{
        ...mapActions({
            filterByPriceActions: types.FILTER_BY_PRICE
        }),
        fetchDataMethods(category){
            console.log(category);
            this.$store.dispatch(types.ACTIONS_CATEGORIES_PRODUCTS_DATA, category);
        },
        filterByPriceSubmit(e){
            e.preventDefault();
            let currentObject = this;
            let min_price;
            let max_price;
            if(currentObject.min<=currentObject.max){
                min_price = currentObject.min;
                max_price = currentObject.max;
            }
            else
            {
                min_price = currentObject.max;
                max_price = currentObject.min
            }
            axios.get('/vue/filterByPrice/'+min_price+', '+max_price).then(res=>{
                this.$store.dispatch(types.FILTER_BY_PRICE, res.data);
            }).catch(err=>{
                console.log(err)
            });
        },
        SubmitfiltersBySearch(e){
            e.preventDefault();
            let currentObject=this;
            if(currentObject.search==''){
                currentObject.search='all';
            }
            axios.get('/vue/filtersBySearch/'+currentObject.search).then(res => {
                this.$store.dispatch(types.FILTER_BY_PRICE, res.data);
            })
            .catch(err => console.log(err))
        }
    },
    computed:{
        ...mapGetters({
            categories: types.GETTER_CATEGORIES_PRODUCTS
        }),
        ...mapActions({
            fetchData: types.ACTIONS_CATEGORIES_PRODUCTS
        })
    }

}
</script>
