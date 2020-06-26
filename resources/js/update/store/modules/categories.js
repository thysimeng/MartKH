import * as types from '../types'
const state = {
    SUB_CATEGOIRES_PRODUCTS:[]
};
const getters = {
    [types.GETTERS_CATEGORIES]: state =>{
        return state.SUB_CATEGOIRES_PRODUCTS;
    }
};
const mutations = {
    [types.MUTATIONS_CATEGORIES]: (state, subCategories) =>{
        state.SUB_CATEGOIRES_PRODUCTS=subCategories;
    }
};
const actions = {
    [types.ACTIONS_CATEGORIES]:({commit})=>{
        axios.get('/getSubCategories')
        .then(res => commit(types.MUTATIONS_CATEGORIES, res.data))
        .catch(err=>console.log(err))
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}
