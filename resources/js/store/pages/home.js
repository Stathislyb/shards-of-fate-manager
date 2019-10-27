import MUTATION_TYPES from '../../constants/mutationTypes';
import serverApiClient from '../../clients/serverApiClient';

var state = {
    chapters: [],
};

export default {
    namespaced: true,
    state: state,
    mutations: {
        [MUTATION_TYPES.SET_CHAPTERS] (state, payload) {
            state.chapters = payload.chapters;
        },
    },
    getters: {
        chapters: (state) => {
            return state.chapters;
        },
    },
    actions: {
        requestChapters () 
        {
            return serverApiClient.requestChapter();
        },
        submitChapterCreate ({}, chapter) 
        {
            return serverApiClient.submitChapterCreate(chapter);
        },
        submitChapterEdit ({}, chapter) 
        {
            return serverApiClient.submitChapterEdit(chapter);
        },

        setChapters ({ commit }, chapters) 
        {
            commit({
                type: MUTATION_TYPES.SET_CHAPTERS,
                chapters: chapters
            });
        },
    }
};