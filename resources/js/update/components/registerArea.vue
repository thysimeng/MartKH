<template>
    <!-- register-area start -->
    <div class="register-area ptb-100">
        {{ navigateToHome }}
        <!-- {{ passwordValidate }} -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-form">
                                <form @submit="sumit_register">
                                    <input type="text" placeholder="Name" v-model="name" required>
                                    <input placeholder="Email" type="email" v-model="email" required>
                                    <input type="password" placeholder="Password" v-model="password" required>
                                    <input type="password" placeholder="Password Confirmation" v-model="password_confirmation" required>
                                    <div v-if="passwordValidation.errors.length!=4" class="progress">
                                        <div v-if="passwordValidation.errors.length==3" id="StrengthProgressBar" class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width:20%"></div>
                                        <div v-else-if="passwordValidation.errors.length==2" id="StrengthProgressBar" class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width:60%"></div>
                                        <div v-else-if="passwordValidation.errors.length==1" id="StrengthProgressBar" class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width:80%"></div>
                                        <div v-else-if="passwordValidation.errors.length==0" id="StrengthProgressBar" class="progress-bar bg-success" style="width:100%"></div>
                                    </div>
                                    <p v-if="password==password_confirmation&&passwordValidation.errors.length==0" style="color: green;">Password Confirmation is match</p>
                                    <p v-else-if="password!=password_confirmation&&passwordValidation.errors.length==0" style="color: red;">Password Confirmation is not match</p>
                                    <div v-for="error in passwordValidation.errors" :key="error.key">
                                        <p style="color: red;">{{ error }}</p>
                                    </div>
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register-area end -->
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name:'login',
    data(){
        return{
            name:'',
            email:'',
            password:'',
            password_confirmation:'',
            remember:'',
            authUser:'',
            message:'',

            rules: [
				{ message:'One lowercase letter required.', regex:/[a-z]+/ },
				{ message:"One uppercase letter required.",  regex:/[A-Z]+/ },
				{ message:"8 characters minimum.", regex:/.{8,}/ },
				{ message:"One number required.", regex:/[0-9]+/ }
			],

            danger:'bg-danger progress-bar-striped progress-bar-animated',
            warning:'bg-warning progress-bar-striped progress-bar-animated',
            success:'bg-success',
            widthLength:100,

            // classObject:{
            //     'bg-danger progress-bar-striped progress-bar-animated': this.danger,
            //     'bg-warning progress-bar-striped progress-bar-animated': this.warning,
            //     'bg-success': true
            // },

            // styleObject:{
            //     width: '100%'
            // }
        }
    },
    methods:{
        sumit_register(e){
            e.preventDefault();
            let currentObj = this;

            axios.post('/register',{
                name:currentObj.name,
                email:currentObj.email,
                password: currentObj.password,
                password_confirmation:currentObj.password_confirmation
            }).then(function(response){
                // console.log(response.data);
                currentObj.$store.dispatch('passDataAuth');
            }).catch(function(error){
                console.log(error);
            })
        },
        ...mapActions([
            'passDataAuth'
        ])
    },
    computed:{
        ...mapGetters([
            'authLoginCheck'
        ]),
        navigateToHome(){
            if(this.authLoginCheck==true){
                this.$router.push('/')
            }
        },
        // Password validatiion
        passwordValidation () {
			let errors = []
			for (let condition of this.rules) {
				if (!condition.regex.test(this.password)) {
					errors.push(condition.message)
				}
            }

			if (errors.length === 0) {
				return { valid:true, errors }
			} else {
				return { valid:false, errors }
			}
		}
    }
}
</script>
