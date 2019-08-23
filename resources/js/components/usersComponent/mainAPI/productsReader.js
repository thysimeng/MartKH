import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

    export default new Vuex.Store({
        state:{
            //Home
            productsPopular:[],
            productsFoodHome:[],
            productsFoodDrink:[],
            //Shop
            products:[],
            productsFood:[],
            productsAll:[],
        },
        mutations:{
            //Home
            fetch_products_popular(state, popular){
                return state.productsPopular = popular
            },
            fetch_products_food_home(state, foodHome){
                return state.productsFoodHome = foodHome
            },
            fetch_products_food_drink(state, drinkHome){
                return state.productsFoodDrink = drinkHome
            },

            //Shop
            FETCH_POSTS(state, post) {
                return state.products = post
            },
            fetch_products_food(state, food){
                return state.productsFood = food
            },
            fetch_products_all(state, food){
                return state.productsAll = food
            },
        },
        actions:{
            //Home
            fetchProductsPopular({commit}) {
                axios.get('/users/all')
                    .then(res => {
                        commit('fetch_products_popular', res.data)
                    }).catch(err => {
                        console.log(err)
                    })
            },
            fetchProductsFood({commit}) {
                axios.get('/users/food')
                    .then(res => {
                        commit('fetch_products_food_home', res.data)
                    }).catch(err => {
                        console.log(err)
                    })
            },
            fetchProductsDrink({commit}) {
                axios.get('/users/all')
                    .then(res => {
                        commit('fetch_products_food_drink', res.data)
                    }).catch(err => {
                        console.log(err)
                    })
            },

            //Shop
            fetchPosts({commit}) {
                axios.get('/usersTest')
                    .then(res => {
                        commit('FETCH_POSTS', res.data)
                    }).catch(err => {
                    console.log(err)
                }),
                axios.get('/users/food')
                    .then(res => {
                        commit('fetch_products_food', res.data)
                    }).catch(err => {
                        console.log(err)
                    }),
                axios.get('/users/all')
                    .then(res => {
                        commit('fetch_products_all', res.data)
                    }).catch(err => {
                        console.log(err)
                    })
            },
            fetchFood({commit}) {
                axios.get('/users/food')
                    .then(res => {
                        commit('fetch_products_food', res.data)
                    }).catch(err => {
                        console.log(err)
                    })
            },

        },
        getters:{
            // Home
            productsPopular: state => {
                return state.productsPopular
            },
            productsFoodHome: state => {
                return state.productsFoodHome
            },
            productsFoodDrink: state => {
                return state.productsFoodDrink
            },

            // Shop
            products: state => {
                 return state.products
            },
            productsFood: state => {
                return state.productsFood
            },
            productsAll: state => {
                return state.productsAll
            }
        }
    })
