export default {
	set_main_min_height({commit}) {
		let footer_heights_array =  _.split($("#footer").css("height") + $("#bottom").css("height"),'px');
		let doc_height = $(document).height();
		let window_height = $(window).height();
		let nav_height = $("nav").height();
		let footer_height = _.reduce(footer_heights_array, (sum, n) =>{
			return _.toInteger(sum) + _.toInteger(n);
		});

		let router_view_height = window_height - footer_height - nav_height - 5;

		$("#router-view").css("min-height", router_view_height);
	},

	store({commit}, {resource, data}){
        axios.post(`/${resource}`, data).then(res => {
			console.log(res.data);
		}).catch(err =>{
		    let data = err.response.data;
		    console.log(data);
		});
	},



};
