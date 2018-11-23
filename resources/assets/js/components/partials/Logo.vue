<template>
    <div id="logo">
        <span id="logo1">Brace</span>
        <span id="logo2">Yourself</span>
        <span id="logo3">Solutions</span>
        <span id="logo-bar"></span>
    </div>
</template>

<script>
	export default {
		name: "Logo",
		data() {
			return {
				//
			};
		},

		beforeCreate() {},
		created() {
			//
		},

		beforeMount() {},
		mounted() {
            $("span").css('font-size', this.font_size);

			setTimeout(() => {
				$("#logo3").css({
                    'left': '67px',
                    'color': 'initial',
                });
				$("#logo-bar").css({
					width: '275px',
					left: '-113px',
				});



			}, 500);

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
		computed: {
            font_size1(){

            },
			font_size2(){

			},
            length(){

            }
		},

		props: {
            size: 'medium'
        },
		components: {},
		watch: {},

	};
</script>

<style>
    #logo {
        background-color: black;
        width: 0;
        position: relative;
        margin: 0 auto;
        left:-26px;
    }

    #logo1 {
        font-size: 40px;
        position: absolute;
        left: -101px;

    }

    #logo2 {
        font-size: 40px;
        position: absolute;
    }

    #logo3 {
        color:#ffffff00;
        font-size: 20px;
        font-variant-caps: all-petite-caps;
        position: absolute;
        top: 34px;
        left: -99px;

        -webkit-transition: left 1s, color 1s;
        -moz-transition: left 1s, color 1s;
        -ms-transition: left 1s, color 1s;
        -o-transition: left 1s, color 1s;
        transition: left 1s, color 1s;

    }

    #logo-bar {
        height: 1px;
        width: 0;
        border-bottom: solid 2px black;
        position: absolute;
        left: -98px;
        top: 45px;

        -webkit-transition: left 1s, width 1s;
        -moz-transition: left 1s, width 1s;
        -ms-transition: left 1s, width 1s;
        -o-transition: left 1s, width 1s;
        transition: left 1s, width 1s;
    }
</style>
