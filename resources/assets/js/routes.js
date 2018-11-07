import errors from './errors/index';
import _ from 'lodash';




let routes = [
	{
		path: '/',
		component: require('./components/Home'),
	},
	{
		path: '/drwindows',
		component: require('./components/proposals/drwindows'),
	},
	{
		path:'*',
		name: 'Page Not Found',
		component: require('./errors/NotFound'),
	},
];

let pages = ['about', 'contact'];
_.forEach(pages, p =>{
	let component = null;
	let path = `/${p}`;

	try{
		component = require(`./components/${_.upperFirst(p)}`);
	}catch (e) {
        component = require('./errors/NotFound')
	}


    routes.push({
        path,
		component,

	});
});

export default routes;