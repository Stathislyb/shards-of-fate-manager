//pages
var routes = require("./router.pages.js");

const routers = [
    {
        path: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/',
        title: 'home',
        name: '/',
        component: routes.home,
    },
];
export default routers;