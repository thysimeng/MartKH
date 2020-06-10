const state = {
    authCheck:false
};

const getters = {
    authLoginCheck: state =>{
        return state.authCheck;
    }
};

const mutations= {
    authLoginCheckData: (state, auth) =>{
        state.authCheck = auth;
    }
};

const actions= {
    passDataAuth:({commit})=>{
        axios.get('/authCkecker')
        .then(res =>{
            commit('authLoginCheckData', res.data)
        })
        .catch(err => {
            console.log(err);
        })
    },

    updateDataAuthOffline:({commit}, authDataPass)=>{
        commit('authLoginCheckData', authDataPass);
    }
};

export default {
    state,
    getters,
    mutations,
    actions
}
