
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import iView from 'iview';
import VueRouter from 'vue-router';
import store from './store';
import App from './app.vue';
import Routers from './router.js';
import RegisterComponents from './plugins/registerComponents';
// import 'iview/dist/styles/iview.css';

window.Vue = require('vue');
window.iView = require('iview');

Vue.use(VueRouter);
Vue.use(iView);
Vue.use(RegisterComponents);

//
//tmp
var util = {};
util.title = function (title) {
    title = title ? title + ' - Home' : 'iView project';
    window.document.title = title;
};
//
//


//
//router

//initialize
const RouterConfig = {
    mode: 'history',
    routes: Routers
};
const router = new VueRouter(RouterConfig);

//set intial states
router.beforeEach((to, from, next) => {
    iView.LoadingBar.start();
    util.title(to.meta.title);
    next();
});

router.afterEach((to, from, next) => {
    iView.LoadingBar.finish();
    window.scrollTo(0, 0);
});


//vvv global event bus
Vue.prototype.$global_events = new Vue();
//^^^


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: { App },
    router: router,
    store,
    render: h => h(App)
});
