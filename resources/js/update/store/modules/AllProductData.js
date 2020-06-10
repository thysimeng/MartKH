import * as type from '../types';

const state = {
    allProducts:[]
};

const getters = {
    allProductData: state => {
        return state.allProducts;
    }
};

const mutations = {
    allProductsMutations: (state, dataRespond) =>{
        state.allProducts=dataRespond;
    },
    sortProductsMutations: (state, sortOption) =>{
        if (sortOption=='Default'){
            state.allProducts;
        }
        else if (sortOption=='A to Z'){
            var ArrayData = state.allProducts.data;
            ArrayData = _.orderBy(ArrayData, "name");
            state.allProducts.data = [];
            state.allProducts.data = ArrayData;
        }
        else if (sortOption=='Z to A'){
            var ArrayData = state.allProducts.data;
            ArrayData = _.orderBy(ArrayData, "name").reverse();
            state.allProducts.data = [];
            state.allProducts.data = ArrayData;
        }
    }
};

const actions = {
    fetchProductsAll:({commit})=>{
        axios.get('/vue/allProduct')
            .then(res => {
                commit('allProductsMutations', res.data);
            }).catch(err => {
                console.log(err);
            });
    },
    sortProducts:({commit}, sortOption)=>{
        commit('sortProductsMutations', sortOption);
    },
    [type.NEXT_PAGE_PRODUCTS]:({commit}, urlPagenate)=>{
        axios.get(urlPagenate)
            .then(res => {
                commit('allProductsMutations', res.data);
            }).catch(err => {
                console.log(err);
            });
    },
    [type.FILTER_BY_PRICE]:({commit}, dataGetFromRequest)=>{
        commit('allProductsMutations', dataGetFromRequest);
    }
};

export default {
    state,
    mutations,
    actions,
    getters
};
