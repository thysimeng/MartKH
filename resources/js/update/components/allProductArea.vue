<template>
    <div class="product-style-area pt-120">
        <div class="coustom-container-fluid">
            <div class="section-title-7 text-center">
                <h2>All Products</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
            <div class="product-tab-list text-center mb-65 nav" role="tablist">
                <a @click="passCategory('Drink')" class="active" href="#furniture1" data-toggle="tab" role="tab">
                    <h4>Drink </h4>
                </a>
                <a @click="passCategory('Food')" href="#furniture2" data-toggle="tab" role="tab">
                    <h4>Food </h4>
                </a>
                <!-- <a href="#furniture3" data-toggle="tab" role="tab">
                    <h4>ArmChair </h4>
                </a>
                <a href="#furniture4" data-toggle="tab" role="tab">
                    <h4>Light</h4>
                </a>
                <a href="#furniture5" data-toggle="tab" role="tab">
                    <h4> Corner</h4>
                </a> -->
            </div>
            <div class="tab-content">
                <div class="tab-pane active show fade" id="furniture1" role="tabpanel">
                    <tabContent :category="category"></tabContent>
                </div>
                <div class="tab-pane fade" id="furniture2" role="tabpanel">
                    <tabContent :category="category"></tabContent>
                </div>
                <!-- <div class="tab-pane fade" id="furniture3" role="tabpanel">
                    <tabContent :category="category"></tabContent>
                </div>
                <div class="tab-pane fade" id="furniture4" role="tabpanel">
                    <tabContent :category="category"></tabContent>
                </div>
                <div class="tab-pane fade" id="furniture5" role="tabpanel">
                    <tabContent :category="category"></tabContent>
                </div> -->
            </div>
            <div class="view-all-product text-center">
                <!-- <a href="shop.html">View All Product</a> -->
                <router-link to="/shop">View All Product</router-link>
            </div>
        </div>
    </div>
</template>

<script>
import tabContent from './allProductArea/tabContent.vue';
export default {
    name:'allProduct',
    data (){
        return {
            category: ''
        }
    },
    methods:{
        passCategory(category){
            this.category = category
        }
    },
    computed:{
    },
    components:{
        tabContent
    }
}
</script>
