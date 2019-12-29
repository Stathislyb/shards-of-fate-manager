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
        increaseFocus ({}, focus) 
        {
            return serverApiClient.submitFocusEdit({
                id: focus.id,
                spend_weeks: focus.spend_weeks + 1
            });
        },
        decreaseFocus ({}, focus) 
        {
            return serverApiClient.submitFocusEdit({
                id: focus.id,
                spend_weeks: focus.spend_weeks > 1 ? focus.spend_weeks - 1 : 0
            });
        },
        submitFocusGoalCreate ({}, focusGoal) 
        {
            return serverApiClient.submitFocusGoalCreate(focusGoal);
        },
        submitFocusGoalEdit ({}, focusGoal) 
        {
            return serverApiClient.submitFocusGoalEdit(focusGoal);
        },

        setFocus ({ commit }, focus) 
        {
            commit({
                type: MUTATION_TYPES.SET_FOCUS,
                focus: focus
            });
        },
        updateFocusState ({ commit, state }, focus) 
        {
            const updatedFocus = state.focus.map(focusItem => {
                if(focusItem.id == focus.id){
                    focusItem = focus;
                }
                return focusItem;
            });            
            commit({
                type: MUTATION_TYPES.SET_FOCUS,
                focus: updatedFocus
            });
        },
    }
};