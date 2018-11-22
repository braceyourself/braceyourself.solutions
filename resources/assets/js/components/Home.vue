<template>
    <div>
        <logo style="top:-69px"/>
        <div id="home">

            <div id="home-intro">
                <div class="animate from-left" style="text-align: right">
                    <h1>Lets create something!</h1>
                    <p>
                        BraceYourself Solutions is a web development and design company.
                        We specialize in creating web applications that help improve
                        every-day business operations.
                    </p>
                </div>
                <img class="animate fade-in from-right" v-if="image_loaded"
                     src="/storage/images/Brace.jpg" alt="me">

            </div>
            <div style="text-align: center;" class="pt-5">Please,
                <span @click="$store.commit('toggleContactForm')"
                      style="color:blue;text-decoration: underline;cursor:pointer ">Contact Us</span>
                iIf you are interested in creating something amazing.
            </div>

            <hr>
            <div class="flex-center pt-5" style="display:flex;flex-direction: column">
                <h1>The Team</h1>
                <p>Well, right now its just me and my sister in law - <a href="https://www.brightlyalex.com/">Alex.</a>
                </p>

            </div>

        </div>

    </div>
</template>

<script>

	export default {
		components: {
			'logo': require('./partials/Logo'),
		},
		name: "Home",
		data() {
			return {
				contactForm: {},
				image_loaded: false,
			};
		},

		beforeCreate() {},
		created() {
			setTimeout(() => {
				this.image_loaded = true;
			}, 1000);
		},

		beforeMount() {},
		mounted() {
			setTimeout(() => {
				$(".fade-in").css({
					opacity: "inherit",
				});

				$(".from-left").css({
					left: '0px',
					color: 'inherit',
				});

				$(".from-top").css({
					top: '0px',
					color: 'inherit',
				});

				$(".from-right").css({
					right: '0px',
					color: 'inherit',
					opacity: 'initial',
				});

			}, 1500);
		},
		beforeUpdate() {},
		updated() {},
		activated() {},
		deactivated() {},
		beforeDestroy() {},
		destroyed() {},
		methods: {
			//
		},
		computed: {},

		props: {},
		watch: {},

	};
</script>
<style scoped lang="scss">
    @import "../../sass/variables";

    #home-intro {
        padding: 0 18vw;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        min-height: 400px;
        div {
            padding: 20px;
        }

        img {
            display: block;
            max-width: 400px;
            max-height: 456px;
            width: auto;
            height: auto;

        }
        @media(max-width:$medium-screen){
            flex-direction: column;
            text-align: center;
        }
    }

    .fade-in {
        opacity: 0;
    }

    .from-top {
        color: $transparent;
        top: -200px;
        position: relative;

    }

    .from-right {
        color: $transparent;
        right: -100vw;
        position: relative;

    }

    .from-left {
        color: $transparent;
        left: -200px;
        position: relative;

    }

    .animate {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -ms-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease;

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


</style>
