
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import Vue       from 'vue';
import lineClamp from 'vue-line-clamp';
Vue.use(lineClamp, {
	importCss: true
});

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

//Instances
const InstancesComponent = Vue.component('instances-component', require('./components/Instance.vue').default);

//Networks
const NetworksComponent = Vue.component('networks-component', require('./components/Network.vue').default);

//Flavors
const FlavorsComponent = Vue.component('flavors-component', require('./components/Flavor.vue').default);

//Volumes
const CreateVolumeComponent = Vue.component('createVolume-component', require('./components/CreateVolume.vue').default);
const VolumesComponent = Vue.component('volumes-component', require('./components/Volume.vue').default);

//Images
const ImagesComponent = Vue.component('images-component', require('./components/Image.vue').default);

//Key Pairs
const KeypairsComponent = Vue.component('keypairs-component', require('./components/Keypair.vue').default);

//Security Groups
const SecurityGroupsComponent = Vue.component('security-groups-component', require('./components/SecurityGroup.vue').default);
const SGRulesComponent = Vue.component('s-g-rules-component', require('./components/SGRules.vue').default);

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
	{
		path: "/instances",
		name: "instances",
		component: InstancesComponent
	},
	{
		path: "/flavors",
		name: "flavors",
		component: FlavorsComponent
	},
	{
		path: "/images",
		name: "images",
		component: ImagesComponent
	},
	{
		path: "/keypairs",
		name: "keypairs",
		component: KeypairsComponent
	},
	{
		path: "/networks",
		name: "networks",
		component: NetworksComponent
	},
	{
		path: "/security_groups",
		name: "security-groups",
		component: SecurityGroupsComponent
	},
	{
		path: "/security_groups/{{id}}",
		name: "security_groups_rules",
		component: SGRulesComponent
	}


];

const router = new VueRouter({
    routes: routes
});

const app = new Vue({
    router,
    el: '#app',
    data: {
    	lines: 2
  	}
});
