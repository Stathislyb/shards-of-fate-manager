import MainMenu from '../../navigation/main_menu/main_menu.js';
import MUTATION_TYPES from '../../constants/mutationTypes';

var state = {
    breadcrumbs: [],
    navigation: {
        main_menu: MainMenu,
    }
};

export default {
    namespaced: true,
    state: state,
    mutations: {
        [MUTATION_TYPES.SET_BREADCRUMBS] (state, payload) {
            state.breadcrumbs = payload.breadcrumbs;
        },
    },
    getters: {
        breadcrumbs: (state) => {
            return state.breadcrumbs;
        },
        navigation: (state) => {
            return state.navigation;
        },
        mainMenu: (state) => {
            return state.navigation.main_menu;
        },
    },
    actions: {
        setBreadcrumbs ({ commit }, breadcrumbs) 
        {
            commit({
                type: MUTATION_TYPES.SET_BREADCRUMBS,
                breadcrumbs: breadcrumbs
            });
        },
    }
};