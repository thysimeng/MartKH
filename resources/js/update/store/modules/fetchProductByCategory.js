import * as types from '../types'

const state = {
    Products:[],
    CATEGOIRES_PRODUCTS:[]
};

const getters = {
    ProductData: state => {
        return state.Products;
    },
    [types.GETTER_CATEGORIES_PRODUCTS]: state =>{
        return state.CATEGOIRES_PRODUCTS;
    }
};

const mutations = {
    ProductsMutations: (state, dataRespond) =>{
        state.Products=dataRespond;
    },
    [types.MUTATIONS_CATEGORIES_PRODUCTS]: (state, dataCategoriesName) =>{
        state.CATEGOIRES_PRODUCTS=dataCategoriesName;
    }
};

const actions = {
    fetchProducts:({commit}, category)=>{
        axios.get('/vue/Products/'+category)
            .then(res => {
                commit('ProductsMutations', res.data)
            }).catch(err => {
                console.log(err)
            })
    },
    [types.ACTIONS_CATEGORIES_PRODUCTS]:({commit})=>{
        axios.get('vue/categoriesName')
        .then(res => commit(types.MUTATIONS_CATEGORIES_PRODUCTS, res.data))
        .catch(err=>console.log(err))
    },
    [types.ACTIONS_CATEGORIES_PRODUCTS_DATA]:({commit}, category)=>[
        axios.get('/vue/getCategoriesByName/'+category)
        .then(res =>
            {console.log(res.data);
            commit('allProductsMutations', res.data)}
        )
        .catch(err => console.log(err))
    ]
}

export default {
    state,
    mutations,
    actions,
    getters
}
