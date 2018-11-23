export default {

	toggleContactForm(state){
		state.contact_form.show = !state.contact_form.show;
	},

	updateContactForm(state, data){
		state.contact_form = data;
	}

}