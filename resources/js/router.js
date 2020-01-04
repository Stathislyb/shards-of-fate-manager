//pages
var routes = require("./router.pages.js");

const routers = [
    {
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/',
        title: 'home',
        name: '/',
        component: routes.home,
    },
    {
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/focus',
        title: 'focus',
        name: '/focus',
        component: routes.focus,
    },
    {
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/players',
        title: 'players',
        name: '/players',
        component: routes.players,
    },
];
export default routers;