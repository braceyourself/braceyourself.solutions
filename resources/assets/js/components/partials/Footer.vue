<template>
    <div class="noprint">
        <div id="footer">
            <div class="column left">
                <a href="http://ethan.braceyourself.solutions/resume">resume</a>
                <a href="http://ethan.braceyourself.solutions/blog">blog</a>
            </div>
            <span class="vr"></span>
            <div class="column right">
                <router-link to="login">login</router-link>
                <a class="no-select" @click="$store.commit('toggleContactForm')">contact me</a>
            </div>
        </div>

        <div id="bottom">

        </div>

        <div v-if="$store.state.contact_form.show" id="contact-form">

            <form @submit.prevent="submitContactForm" id="contact-form-input">
                <a>
                    <i class="material-icons" @click="$store.commit('toggleContactForm')">close</i>
                </a>
                <label>Email
                    <input @input="inputChanged('email')" type="text" v-model="contact_form.email"/>
                </label>
                <label>Name
                    <input @input="inputChanged('name')" type="text" v-model="contact_form.name"/>
                </label>
                <label>Message
                    <textarea @input="inputChanged('message')" class="form-control"
                              v-model="contact_form.message"></textarea>
                </label>
                <div v-if="contact_form_has_errors">
                    <div v-for="error in contact_form.errors" class="text-center">
                        {{error.val[0]}}
                    </div>

                </div>
                <button class="btn btn-primary form-control">Send</button>
            </form>
        </div>

    </div>
</template>

<style scoped lang="scss">
    @import "../../../sass/variables";
    /*@import "~material-design-icons";*/
    /*position: fixed;*/
    /*bottom: 0px;*/
    /*display: flex;*/
    /*flex-direction: column;*/
    a:hover {
        cursor: pointer !important;
        text-decoration: underline !important;
    }

    #footer {

        /*position: absolute;*/
        width: 100%;
        height: auto;
        padding: 15px;
        background: $color-secondary-dark;
        display: flex;
        flex-direction: row;
        justify-content: center;

        .column {
            a {
                display: block;
                color: white;
            }
            &.left {
                text-align: right;
            }
            &.right {
                text-align: left;
            }
        }

        .vr {
            border: 1px solid $color-secondary-light;
            width: 1px;
            margin: 5px;
            padding: 15px 0;

        }

    }

    #bottom {
        background-color: black;
    }

    #contact-form {
        z-index:2;
        position: fixed;
        bottom: 0;
        width: 100%;
        /*height: auto;*/
        background: $color-primary-dark;
        background: #4b636e;
        display: flex;
        justify-content: space-evenly;
        color: $color-secondary-light;
        padding: 30px;

        div {
            min-width: 350px;
        }

        i {
            position: absolute;
            right: 10px;
            top: 5px;
            font-size: 41px;
        }

        input, textarea {
            border: none;
            border-bottom: 1px solid white;
            border-radius: 0;
            background-color: inherit;
            color: white;
        }
        button {
            border-radius: 0;
        }

        #contact-form-input {
            width: 50vw;
            display: inherit;
            flex-direction: column;
            padding-left: 55px;
            label {
                width: 100%;
            }

            @media(max-width: $medium-screen) {
                width: 75vw;
            }
        }

        #contact-form-text {
            width: 50vw;
            display: inherit;
            flex-direction: column;

            text-align: right;
            padding-right: 55px;
            border-right: 1px solid aliceblue;
        }

        @media (max-width: 600px) {
            flex-direction: column;
        }
    }
</style>

<script>
	export default {
		name: "Footer",
		data() {
			return {};
		},

		beforeCreate() {},
		created() {
			//
		},

		beforeMount() {},
		mounted() {

			this.$store.dispatch('set_main_min_height');
			$("#contact-form-input *").on('change', () => {
				console.log('form data changed');
			});

		},
		beforeUpdate() {},
		updated() {},
		activated() {},
		deactivated() {},
		beforeDestroy() {},
		destroyed() {},
		methods: {
			inputChanged(key) {
				console.log(key);
				this.contact_form.errors = _.remove(this.contact_form.errors, error => {
					return error.key != key;
				});

			},
			submitContactForm() {
				this.$store.dispatch("store", {resource: "contact", data: this.contact_form}).then(res => {
					this.flash("Thanks!! I'll be in touch with you soon.");
					this.contact_form.show = false;
				}).catch(err => {
					let contact_form = this.contact_form;
					contact_form.errors = [];
					_.forEach(err.errors, (val, key) => {
						contact_form.errors.push({key, val});
					});
					contact_form.has_errors = true;

					this.$store.commit('updateContactForm', contact_form);

				});
			},
		},
		computed: {
			contact_form_has_errors() {

				return this.contact_form.errors.length > 0;
			},

			contact_form() {
				return this.$store.state.contact_form;
			},
		},

		props: {},
		components: {},
		watch: {},

	}
</script>

