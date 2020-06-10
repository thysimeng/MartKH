import * as types from '../types';
const state = {
    sildeID:[],
    slideData:[]
};
const getters = {
    [types.GETTER_SLIDE_ID]: state =>{
        return state.sildeID;
    },
    [types.GETTER_SLIDE_DATA]: state =>{
        return state.slideData;
    }
};

const mutations = {
    [types.MUTATIONS_SLIDE_ID]: (state, dataRespond) =>{
        state.sildeID = dataRespond;
    },
    [types.MUTATIONS_SLIDE_DATA]: (state, dataRespond) =>{
        state.slideData = dataRespond;
    }
};

const actions = {
    [types.ACTIONS_SLIDE_ID]:({commit})=>{
        axios.get('/vue/getAdsTemplateID')
        .then(res => commit(types.MUTATIONS_SLIDE_ID, res.data))
        .catch(err => console.log(err))
    },
    [types.ACTIONS_SLIDE_DATA]:({commit})=>{
        axios.get('/vue/getADSData')
        .then(res=>commit(types.MUTATIONS_SLIDE_DATA, res.data))
        .catch(err => console.log(err))
    }
};

export default{
    state,
    mutations,
    actions,
    getters
};
