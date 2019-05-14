
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
const CreateVolumeComponent = Vue.component('createVolume-component', require('./components/CreateVolume.vue').default);
const VolumesComponent = Vue.component('volumes-component', require('./components/Volumes.vue').default);



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
	},
	{
		path: "/createVolume",
		name: "createVolume",
		component: CreateVolumeComponent
	},
	{
		path: "/volumes",
		name: "volumes",
		component: VolumesComponent
	},

];

const router = new VueRouter({
    routes: routes
});

const app = new Vue({
    router,
    el: '#app'
});
