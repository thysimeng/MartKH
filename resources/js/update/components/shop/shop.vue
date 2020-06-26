<template>
    <div>
        <!-- <shopGrid></shopGrid> -->
        <router-view></router-view>
        <!-- <shopContents></shopContents> -->
        <div v-show="false" v-if="category!='search'">{{fetchDataMethods}}</div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import * as types from '../../store/types'
import shopGrid from './shopComponent/shopGrid'
import shopContents from './shopComponent/shopContents'
export default {
    name:'shop',
    data(){
        return{
            category: this.$route.params.category
        }
    },
    watch:{
        '$route'(to, from){
            this.category =to.params.category;
        }
    },
    computed:{
        fetchDataMethods(){
            this.$store.dispatch(types.ACTIONS_CATEGORIES_PRODUCTS_DATA, this.category);
        }
    },
    components:{
        shopGrid,
        shopContents
    }
}
</script>
