import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

    export default new Vuex.Store({
        state:{
            productsFood:[]
        },
        mutations:{
            fetch_products_food(state, food){
                return state.productsFood = food
            }
        },
        actions:{
            fetchPosts({commit}) {
                axios.get('/users/food')
                    .then(res => {F
                        commit('fetch_products_food', res.data)
                    }).catch(err => {
                        console.log(err)
                    })
            }
        },
        getters:{
            productsFood: state => {
                return state.productsFood
            }
        }
    })
