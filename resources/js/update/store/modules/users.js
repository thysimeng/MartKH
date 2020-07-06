import * as types from '../types'
const state = {
    USER_DATA:[]
};
const getters = {
    [types.GETTERS_USER]: state =>{
        return state.USER_DATA;
    }
};
const mutations = {
    [types.MUTATIONS_USER]: (state, user) =>{
        state.USER_DATA=user;
    }
};
const actions = {
    [types.ACTIONS_USER]:({commit})=>{
        axios.get('/users/userProfile2')
        .then(res => commit(types.MUTATIONS_USER, res.data))
        .catch(err=>console.log(err))
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}
