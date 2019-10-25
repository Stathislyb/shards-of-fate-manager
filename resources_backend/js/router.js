//pages
var routes = require("./router.pages.js");

//sub menus
var sub_menus = require("./router.submenus.js");

const routers = [
    {
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/',
        title: 'otinanai',
        name: '/',
        component: routes.index,
        meta: {
            submenu: null,  //<--something like "demo_sub_menu" will go here
        }
    },
    { // add "import chapter_list_delete from './pages/chapter_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_list',
        title: 'otinanai',
        name: 'chapter_list_delete',
        component: routes.chapter_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_create from './pages/chapter_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_create',
        title: 'otinanai',
        name: 'chapter_create',
        component: routes.chapter_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_update from './pages/chapter_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_update/:id',
        title: 'otinanai',
        name: 'chapter_update',
        component: routes.chapter_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_list_delete from './pages/chapter_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_list',
        title: 'otinanai',
        name: 'chapter_list_delete',
        component: routes.chapter_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_create from './pages/chapter_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_create',
        title: 'otinanai',
        name: 'chapter_create',
        component: routes.chapter_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_update from './pages/chapter_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_update/:id',
        title: 'otinanai',
        name: 'chapter_update',
        component: routes.chapter_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_list_delete from './pages/chapter_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_list',
        title: 'otinanai',
        name: 'chapter_list_delete',
        component: routes.chapter_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_create from './pages/chapter_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_create',
        title: 'otinanai',
        name: 'chapter_create',
        component: routes.chapter_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import chapter_update from './pages/chapter_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_update/:id',
        title: 'otinanai',
        name: 'chapter_update',
        component: routes.chapter_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import episode_list_delete from './pages/episode_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/episode_list',
        title: 'otinanai',
        name: 'episode_list_delete',
        component: routes.episode_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import episode_create from './pages/episode_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/episode_create',
        title: 'otinanai',
        name: 'episode_create',
        component: routes.episode_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import episode_update from './pages/episode_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/episode_update/:id',
        title: 'otinanai',
        name: 'episode_update',
        component: routes.episode_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import session_list_delete from './pages/session_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/session_list',
        title: 'otinanai',
        name: 'session_list_delete',
        component: routes.session_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import session_create from './pages/session_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/session_create',
        title: 'otinanai',
        name: 'session_create',
        component: routes.session_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import session_update from './pages/session_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/session_update/:id',
        title: 'otinanai',
        name: 'session_update',
        component: routes.session_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import session_list_delete from './pages/session_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/session_list',
        title: 'otinanai',
        name: 'session_list_delete',
        component: routes.session_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import session_create from './pages/session_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/session_create',
        title: 'otinanai',
        name: 'session_create',
        component: routes.session_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import session_update from './pages/session_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/session_update/:id',
        title: 'otinanai',
        name: 'session_update',
        component: routes.session_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import player_list_delete from './pages/player_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/player_list',
        title: 'otinanai',
        name: 'player_list_delete',
        component: routes.player_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import player_create from './pages/player_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/player_create',
        title: 'otinanai',
        name: 'player_create',
        component: routes.player_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import player_update from './pages/player_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/player_update/:id',
        title: 'otinanai',
        name: 'player_update',
        component: routes.player_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import character_list_delete from './pages/character_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/character_list',
        title: 'otinanai',
        name: 'character_list_delete',
        component: routes.character_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import character_create from './pages/character_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/character_create',
        title: 'otinanai',
        name: 'character_create',
        component: routes.character_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import character_update from './pages/character_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/character_update/:id',
        title: 'otinanai',
        name: 'character_update',
        component: routes.character_update,
        meta: {
            submenu: null,
        }
    },
    { // add "import npc_list_delete from './pages/npc_list_delete.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/npc_list',
        title: 'otinanai',
        name: 'npc_list_delete',
        component: routes.npc_list_delete,
        meta: {
            submenu: null,
        }
    },
    { // add "import npc_create from './pages/npc_create.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/npc_create',
        title: 'otinanai',
        name: 'npc_create',
        component: routes.npc_create,
        meta: {
            submenu: null,
        }
    },
    { // add "import npc_update from './pages/npc_update.vue';" at the top
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/npc_update/:id',
        title: 'otinanai',
        name: 'npc_update',
        component: routes.npc_update,
        meta: {
            submenu: null,
        }
    },
];
export default routers;