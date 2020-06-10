<template>
    <div>
        <shopGrid></shopGrid>
        <shopContents></shopContents>
    </div>
</template>

<script>
import shopGrid from './shopComponent/shopGrid'
import shopContents from './shopComponent/shopContents'
export default {
    name:'shop',
    components:{
        shopGrid,
        shopContents
    }
}
</script>
