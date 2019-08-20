<template>
    <div>
        <h1>Food detail ID : {{ $route.params.id }}</h1>
        <router-link :to="{ name:'foodEdit' }">Edit</router-link>
    </div>
</template>
