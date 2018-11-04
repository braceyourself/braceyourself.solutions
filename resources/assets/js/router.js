import VueRouter from 'vue-router'
import Vue from 'vue'
import routes from './routes'
import ErrorPages from './errors/index'

Vue.use(VueRouter);

const router = new VueRouter({
	routes,
	mode: 'history',

});

router.beforeEach((to, from, next) => {

	next();
});

export default router;
