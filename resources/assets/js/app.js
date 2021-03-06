
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap"
import Vue from 'vue'
window.Vue = Vue;

import store from './vuex/index'
import router from './router';
import moment from 'moment'
import VueMarkdown from 'vue-markdown'



Vue.mixin({
    computed:{
		authenticated() {
			return !!this.Auth.user.id;
		},

		Auth() {
			return this.$store.getters.auth
		},

	},
	methods:{
		flash(message, type = 'info') {
            console.error("flash tool is not configured.")
		},
		moment(){
			return require('moment');
		},
	}
});


const app = new Vue({
	router,
	store,
	components:{
		'vue':require('./components/Main'),
	},
	created(){
		window.onresize = ()=>{
			this.$store.dispatch('set_main_min_height');
			console.log($(document).height());
		}
	}
}).$mount('#app');

