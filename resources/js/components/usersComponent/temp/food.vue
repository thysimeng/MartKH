<template>
    <div>
        <h1>Here is your food</h1>
        <button @click="loadID">Load ID</button>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    methods:{
            loadID(){
                this.$router.push('/drink');
            }
    }
}
</script>
