<template>
    <div class="col-lg-3">
        <div class="shop-sidebar mr-50">
            <filters :fltersBySearch="true" :title="'Search Products'"></filters>
            <filters :filtersByPrice="true"></filters>
            <filters :filtersByCategories="true" :title="'Categories'"></filters>
            <!-- <filters :fitersByColors="true" :title="'Colors'"></filters>
            <filters :fitersBySize="true" :title="'Size'"></filters>
            <filters :filtersByTag="true" :title="'Tag'"></filters>
            <filters :filtersByRelate="true" :title="'Top rated products'"></filters> -->
        </div>
    </div>
</template>

<script>
import filters from '../../.././baseComponent/filters'
export default {
    name:'filterSide',
    components:{
        filters,
    }
}
</script>
