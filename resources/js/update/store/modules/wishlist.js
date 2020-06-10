import Axios from "axios";

const state = {
    productsWishlist:[]
};

const getters = {
    productDataWishlist: state => {
        return state.productsWishlist;
    }
};

const mutations = {
    productMuntationsWishlist: (state, dataGet) =>{
        state.productsWishlist = dataGet;
    }
};

const actions = {
    productsActionsWishlist:({commit})=>{
        Axios.get('/wishlistproducts').then(res=>{
            commit('productMuntationsWishlist', res.data);
        }).catch(err=>{
            console.log(err);
        })
    },
    assProductActionsWishlist:({commit}, productID)=>{
        Axios.post()
    }
};

export default {
    state,
    getters,
    mutations,
    actions
};
