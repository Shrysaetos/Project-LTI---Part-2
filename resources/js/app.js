
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Vuex from 'vuex';
Vue.use(Vuex);

import Toasted from 'vue-toasted';

Vue.use(Toasted, {
    position: 'top-right',
    duration: 5000,
    type: 'info',
});

const LoginComponent = Vue.component('login-component', require('./components/Login.vue').default);


const routes = [

	{
		path: '/',
		redirect: {
			name: "login"
		}
	},
	{
		path: "/login",
		name: "login",
		component: LoginComponent
	}

];

const router = new VueRouter({
    routes: routes
});

const app = new Vue({
    router,
    el: '#app'
});
