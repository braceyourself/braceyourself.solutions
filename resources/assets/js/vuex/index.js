import Vue from 'vue';
import Vuex from 'vuex';
import state from './state'
import mutations from './mutations'
import actions from './actions'
import getters from './getters'

Vue.use(Vuex);

const index = new Vuex.Store({
	state, mutations, actions, getters,

});


export default index;