import MUTATION_TYPES from '../../constants/mutationTypes';
import serverApiClient from '../../clients/serverApiClient';

var state = {
    focus: [],
};

export default {
    namespaced: true,
    state: state,
    mutations: {
        [MUTATION_TYPES.SET_FOCUS] (state, payload) {
            if(!Array.isArray(payload.focus)){
                payload.focus = [];
            }
            state.focus = payload.focus;
        },
    },
    getters: {
        focus: (state) => {
            return state.focus;
        },
    },
    actions: {
        requestFocus () 
        {
            return serverApiClient.requestFocus();
        },
        submitFocusCreate ({}, focus) 
        {
            return serverApiClient.submitFocusCreate(focus);
        },
        submitFocusEdit ({}, focus) 
        {
            return serverApiClient.submitFocusEdit(focus);
        },

        setFocuss ({ commit }, focus) 
        {
            commit({
                type: MUTATION_TYPES.SET_FOCUS,
                focus: focus
            });
        },
    }
};