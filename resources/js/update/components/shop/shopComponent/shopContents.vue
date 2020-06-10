<template>
    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid">
            <div class="row">
                <filterSide></filterSide>
                <displaySide></displaySide>
            </div>
        </div>
    </div>
</template>
<script>
import filterSide from './shopContens/filterSide'
import displaySide from './shopContens/displaySide'
export default {
    name:'shopContents',
    components:{
        filterSide,
        displaySide
    }
}
</script>
