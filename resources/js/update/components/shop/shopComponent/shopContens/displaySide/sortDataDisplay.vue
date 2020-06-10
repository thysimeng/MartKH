<template>
    <div class="shop-selector">
        {{ sortProducts }}
        <label>Sort By :</label>
        <select v-model="sortValue">
            <option>Default</option>
            <option>A to Z</option>
            <option>Z to A</option>
            <option>In stock</option>
        </select>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
    name:'sortData',
    data(){
        return {
            sortValue: ''
        }
    },
    computed:{
        ...mapActions([
            'sortProducts'
        ]),
        sortProducts(){
            this.$store.dispatch('sortProducts', this.sortValue);
        }
    },
}
</script>
