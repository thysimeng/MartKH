// let state = {
//     posts: []
// }

// let getters = {
//     posts: state => {
//         return state.posts
//     }
// }

// let mutations = {
//     FETCH_POSTS(state, posts) {
//         return state.posts = posts
//     }

// }

// let actions = {
//     fetchPosts({commit}) {
//         axios.get('/usersTest')
//             .then(res => {
//                 commit('FETCH_POSTS', res.data)
//             }).catch(err => {
//             console.log(err)
//         })
//     }
// }

import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

    export default new Vuex.Store({
        state:{
            products:[],
            productsFood:[],
            productsAll:[]
        },
        mutations:{
            FETCH_POSTS(state, post) {
                return state.products = post
            },
            fetch_products_food(state, food){
                return state.productsFood = food
            },
            fetch_products_all(state, food){
                return state.productsAll = food
            }
        },
        actions:{
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
            }
        },
        getters:{
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
