<template>
    <div id="home">

        <div id="landing">
            <div id="image"></div>

            <div id="text">
                <span>
                    Imagine.
                </span>
                <span>
                    Build.
                </span>
                <span>
                    Enjoy.
                </span>
            </div>

        </div>




        <div id="contact-form">
            <div id="contact-form-text">Contact</div>
            <form @submit.prevent="" id="contact-form-input">
                <label>Email <span style="color:red">*</span>
                    <input type="text" v-model="contactForm.email"/>
                </label>
                <label>Name
                    <input type="text" v-model="contactForm.name" />
                </label>
                <label>Message
                    <input type="text" v-model="contactForm.message" />
                </label>
                <button class="btn btn-primary form-control" @click="submitContactForm">Send</button>
                <span>required<span class="ml-1" style="color:red">*</span></span>
            </form>
        </div>


    </div>
</template>

<script>
	export default {
		components: {
			//
		},
		name: "Home",
		data() {
			return {
				contactForm: {},
			};
		},

		beforeCreate() {},
		created() {
			//
		},

		beforeMount() {},
		mounted() {
			//
		},
		beforeUpdate() {},
		updated() {},
		activated() {},
		deactivated() {},
		beforeDestroy() {},
		destroyed() {},
		methods: {
            submitContactForm(){
                this.$store.dispatch("store", {resource:"contact", data:this.contactForm}).then(res=>{
                    this.flash("Thanks!! I'll be in touch with you soon.");
                }).catch(err=>{

                })
            },
		},
		computed: {
			//
		},

		props: {},
		watch: {},

	};
</script>
<style scoped lang="scss">
    @import "../../sass/variables";

    .logo {

        display: inline-block;
        font-size: 30px;

        span {
            left: 50%;
            position: absolute;
            /*position: absolute;*/

            $nth1-2_leftPosition: 63px;
            &:nth-child(1), &:nth-child(2) {
                font-size: 40px;
                left: $nth1-2_leftPosition;
            }

            &:nth-child(2) {
                left: $nth1-2_leftPosition+ 100px;
            }

            &:last-child {
                font-size: 100px;
                font-variant-caps: petite-caps;
            }
        }
    }

    #landing {
        width: 100%;
        background: #ffffff70;
        display: flex;
        flex-direction: row;
        justify-content: center;
        padding: 30px;
        min-height: 400px;

        #image {
            margin-right: 5px;
            width: 500px;
            background: aliceblue;
            border-right: 1px solid $color-secondary-dark;
            padding-right: 10px;
            z-index: 1;

        }

        #text {
            display: flex;
            flex-direction: column;
            margin-left: 5px;
            span {
                color: $color-secondary-dark;
                font-size: 65px;
                font-variant-caps: petite-caps;
                position: relative;

            }
        }
    }

    #contact-form {
        width: 100%;
        /*height: auto;*/
        background: $color-primary-dark;
        background: #4b636e;
        display: flex;
        justify-content: space-evenly;
        color: $color-secondary-light;
        padding: 30px;

        div{
            min-width: 350px;
        }

        #contact-form-input {
            width: 50vw;
            display: inherit;
            flex-direction: column;
            padding-left: 55px;
            label {
                width: 100%;
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

        @media (max-width:600px) {
            flex-direction: column;
        }
    }

</style>
