<template>
    <div>
        <form @submit="logout">
            <button>Logout</button>
        </form>
        {{ authUser }}
        {{ message }}
    </div>
</template>
<script>
export default {
    name:'logout',
    data(){
        return{
            authUser:'',
            message:''
        }
    },
    methods:{
        logout(e){
            e.preventDefault();
            let currentObj = this;

            axios.post('/logout').then(function(response){
                currentObj.authUser=response.data;
            }).catch(function(error){
                currentObj.message=error;
                console.log(error);
            })
        },
    }
}
</script>
