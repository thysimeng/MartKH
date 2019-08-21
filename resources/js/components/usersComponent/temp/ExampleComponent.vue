<template>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h1>
                            {{ message }}
                        </h1>
                    </div>
                    <p>What do you want to see?Click button show</p>
                    <button @click=" showLoginButton = !showLoginButton">Show</button>
                </div>
            </div>
        </div>
        <div v-if="!showLoginButton">
            <p>Hello Thy Si Meng</p>
        </div>
        <p>{{ showSlideP }}</p>
    </div>
</template>

<script>
    export default {
    }
</script>
