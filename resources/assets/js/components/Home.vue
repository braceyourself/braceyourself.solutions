<template>
    <div>
        <!--<logo style="top:-69px" background-color="$color-primary"/>-->
        <div id="home">

            <div id="home-intro" class="bg-secondary text-shadow">
                <div id="intro-description" class="animate from-right intro">
                    <h1>Lets create something!</h1>
                    <p>
                        BraceYourself Solutions is a web development and design company.
                        We specialize in creating web applications that help improve
                        every-day business operations.
                    </p>
                </div>

                <div class="image-container">
                    <img src=""
                         alt="">
                </div>

                <!--<img class="animate fade-in from-right" v-if="image_loaded"-->
                <!--src="https://images.pexels.com/photos/908284/pexels-photo-908284.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"-->
                <!--alt="me">-->

            </div>


            <div id="projects" class="flex-center py-5 bg-secondary"
                 style="display:flex;flex-direction: column;">
                <h1 class="underline">Projects</h1>
                <p>Currently accepting projects!</p>

                <div style="text-align: center;" class="pt-5">
                    <span @click="$store.commit('toggleContactForm')"
                          class="link">Contact Us</span>
                    if you are interested in creating something amazing.
                </div>


            </div>


            <div id="team-page" class="flex-center py-5" style="display:flex;flex-direction: column">
                <div class="text-center" id="team">

                    <div class="team-card">
                        <h3 class="border-bottom">Lead Developer</h3>
                        <div class="content">
                            <div>
                                <img class="profile" src="../../images/Brace.jpg"
                                     alt="Ethan">
                            </div>
                            <div>
                                <span class="name">Ethan</span>
                                <p>
                                    Mostly-self-taught Web Developer specializing in Single-Page Web
                                    Applications using
                                    <hyperlink to="https://laravel.com">Laravel</hyperlink>
                                    and
                                    <hyperlink to="https://vuejs.org">Vue</hyperlink>
                                    .
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="team-card">
                        <h3 class="border-bottom">Lead Designer</h3>
                        <div class="content">
                            <div>
                                <img class="profile"
                                     src="https://static.wixstatic.com/media/082b7e_f186f74c51714cfa9785278f66319616~mv2_d_3585_3179_s_4_2.jpg/v1/crop/x_510,y_0,w_2566,h_3179/fill/w_339,h_420,al_c,q_80,usm_0.66_1.00_0.01/IMG_7490.webp"
                                     alt="Alex">
                            </div>
                            <div>
                                <div class="name">Alex</div>
                                <p>Alex owns and operates a Design & Photography company. Check it out!</p>

                                <a href="https://www.brightlyalex.com/">
                                    <img style="max-width:200px"
                                         src="https://static.wixstatic.com/media/082b7e_f6c887e1579f4082b627f54bf5cb7659~mv2.png/v1/crop/x_0,y_100,w_1126,h_462/fill/w_558,h_225,al_c,q_80,usm_0.66_1.00_0.01/BrightlyAlex_Logo-02.webp"
                                         alt="brightly alex">
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
                <!--<p>Well, right now its just me and my sister in law - <a href="https://www.brightlyalex.com/">Alex.</a>-->
                <!--</p>-->
                <p></p>

            </div>
        </div>

    </div>
</template>

<script>

	export default {
		components: {
			'logo': require('./partials/Logo'),
			'hyperlink': require('./partials/Hyperlink'),
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
			let home_intro = $("#home-intro");
			let team_page = $("#team-page");
			let intro_description = $("#intro-description");
			let projects_page = $("#projects");


			window.onscroll = (e) => {

				let top = $(window).scrollTop();
				let pos_x = (top + 1000) / 25;


				$(home_intro).css({
					"background-position-x": `${pos_x}%`,
				});


				// Team
				let pos_y = (top * .5) - 1000;
				$(team_page).css({
					'background-position-y': `${pos_y}px`,
				});


				// intro description
				let position = top + 75;
				let projects_from_top = $(projects_page).
				console.log(projects_from_top);


				$(intro_description).css({
					top: `${position}px`,
				});

			};

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

				$(".intro").css({
					'background-color': "rgba(72, 72, 72, 0.84)",
				});


			}, 1500);

			setTimeout(() => {
				$(intro_description).css({
					'-webkit-transition': 'none !important',
					'-moz-transition': 'none !important',
					'-o-transition': 'none !important',
					'transition': 'none !important',
				});
			}, 2000);
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

    $projects_page_image: url('https://images.pexels.com/photos/273222/pexels-photo-273222.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');

    #home {
        font-size: 20px;
        @media (max-width: $small-screen) {
            text-align: center;
            img {
                /*width:100%;*/
            }
        }

    }

    #home-intro {
        /*-webkit-transition: background-position-x 1000ms swing;*/
        /*-moz-transition: background-position-x 1000ms swing;*/
        /*-ms-transition: background-position-x 1000ms swing;*/
        /*-o-transition: background-position-x 1000ms swing;*/
        /*transition: background-position-x 1000ms swing;*/

        background: url(https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260) no-repeat center center fixed;
        background-position-y: 61%;
        background-position-x: 45%;
        padding: 20px 10vw;
        min-height: 771px;
        max-height: 800px;
        overflow: hidden;
        text-align: right;

        .intro {
            right: -100px;
            text-align: left;
            padding: 27px;
            background-color: unset;
            position: absolute;
            width: 45vw;
            z-index: 0;
            @media (max-width: $medium-screen) {
                /*left: 0;*/
                width: 100vw;
                text-align: center;

            }

        }

        @media(max-width: $medium-screen) {
            flex-direction: column;
            text-align: center;
            padding: 0 5vw;
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

    #projects {
        color: black;
        /*background-image: $projects_page_image;*/
        /*background-size: cover;*/
        /*background-blend-mode: saturation;*/

    }

    #team {
        display: flex;
        flex-direction: row;

        div {
            /*max-width: 300px;*/
        }
        .profile {
            max-width: 200px;
            /*max-height: 200px;*/
            /*width: 100%;*/
            height: 250px;
            position: relative;
            z-index: 0;
            object-fit: cover;
            box-shadow: 6px 6px 41px -11px black;
        }
        .name {
            text-decoration: underline;
            z-index: 1;
            /*text-align: right;*/
            font-size: 30px;
            /*!*text-shadow: 2px 2px 12px black;*!*/
            position: relative;
        }
        .team-card {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            h3 {
                font-size: 40px;
            }

            .content {
                display: flex;
                flex-direction: row;
                text-align: left;
                font-size: 25px;
                font-weight: 600;
                div {
                    padding: 10px;
                }
                @media (max-width: $small-screen) {
                    flex-direction: column;
                    text-align: center;
                }
            }
        }

        @media (max-width: $medium-screen) {
            flex-direction: column;
        }
    }

    #team-page {
        background: url("https://image.ibb.co/kbdZYK/B2-Desk.jpg") repeat-y center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

</style>
