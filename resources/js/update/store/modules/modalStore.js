const state = {
    ProductsModal:[]
};

const getters = {
    ProductDataModal: state => {
        return state.ProductsModal;
    }
};

const mutations = {
    ProductsMutationsModal: (state, dataPass) =>{
        state.ProductsModal=dataPass;
    }
};

const actions = {
    passDataModal:({commit}, dataPass)=>{
        commit('ProductsMutationsModal', dataPass)
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}
