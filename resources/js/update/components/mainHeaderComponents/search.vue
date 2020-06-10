<template>
    <div class="furniture-search">
        <form action="#">
            <input v-if="search==''" placeholder="I am Searching for . . ." type="text" v-model="search">
            <input v-else placeholder="I am Searching for . . ." type="text" v-model="search">
            <button @click="SubmitfiltersBySearch">
                <i class="ti-search"></i>
            </button>
        </form>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex'
import * as types from '../../store/types'
export default {
    name:'search',
    data(){
        return{
            search:''
        }
    },
    methods:{
        ...mapActions({
            filterByPriceActions: types.FILTER_BY_PRICE
        }),
        SubmitfiltersBySearch(e){
            this.$router.push('/shop');
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
    }
}
</script>
