<template>
    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-form">
                                <form @submit="sumit_login">
                                    <input type="text" placeholder="Email" v-model="email">
                                    <input type="password" placeholder="Password" v-model="password">
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox" v-model="remember">
                                            <label>Remember me</label>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <button type="submit" class="default-btn floatright" @click="passDataAuth">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name:'login',
    data(){
        return{
            email:'',
            password:'',
            remember:'',
            message:'',
        }
    },
    methods:{
        sumit_login(e){
            e.preventDefault();
            let currentObj = this;
            axios.post('/login',{
                email:currentObj.email,
                password: currentObj.password,
                remember: currentObj.remember
            }).then(({ data }) => {
                let metaName="meta name\=\"csrf-token\" content\=\"";
                var indexOfToken=data.search(metaName);
                var token = data.slice(indexOfToken+32, 40);
                window.axios.defaults.headers.common['X-CSRF-TOKEN']=token;
                currentObj.$store.dispatch('passDataAuth');
                currentObj.$router.push('/');
            }
            ).catch(error => {
                console.log('sumit_login'+error);
                currentObj.$store.dispatch('passDataAuth')
            }
            );
        },
        ...mapActions([
            // actions for user login
            'passDataAuth'
        ])

    },
    computed:{
        ...mapGetters([
            'authLoginCheck'
        ])

    }
}
</script>
