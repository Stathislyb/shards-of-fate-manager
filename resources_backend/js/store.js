import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import Index from './store/pages/Index.js';
import BasicLayout from './store/components/BasicLayout.js';
var stores = require("./store.pages.js");

Vue.use(Vuex);

window.Vuex = require('vuex');

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    state: {
        base_url: process.env.MIX_BASE_URL+'/',
        base_relative_url: process.env.MIX_BASE_RELATIVE_URL+'/',
        storage_url: process.env.MIX_STORAGE_URL+'/',
    },
    modules: {
        components: {
            namespaced: true,
            modules: {
                BasicLayout: BasicLayout,
            }
        },
        pages: {
            namespaced: true,
            modules: {
                Index: stores.index,
                chapter_list_delete: stores.chapter_list_delete,
                chapter_create: stores.chapter_create,
                chapter_update: stores.chapter_update,
                chapter_list_delete: stores.chapter_list_delete,
                chapter_create: stores.chapter_create,
                chapter_update: stores.chapter_update,
                chapter_list_delete: stores.chapter_list_delete,
                chapter_create: stores.chapter_create,
                chapter_update: stores.chapter_update,
                episode_list_delete: stores.episode_list_delete,
                episode_create: stores.episode_create,
                episode_update: stores.episode_update,
                session_list_delete: stores.session_list_delete,
                session_create: stores.session_create,
                session_update: stores.session_update,
                session_list_delete: stores.session_list_delete,
                session_create: stores.session_create,
                session_update: stores.session_update,
                player_list_delete: stores.player_list_delete,
                player_create: stores.player_create,
                player_update: stores.player_update,
                character_list_delete: stores.character_list_delete,
                character_create: stores.character_create,
                character_update: stores.character_update,
                npc_list_delete: stores.npc_list_delete,
                npc_create: stores.npc_create,
                npc_update: stores.npc_update,
            }
        },
    },
});

export default store;
