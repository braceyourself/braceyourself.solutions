<template>
    <div class="navbar navbar-default navbar-static-top">

        <logo style="top: -38px;"/>

        <!--<div id="nav-color"></div>-->
        <!--<div id="nav-links">-->
        <!--<div class="navbar-header ">-->
        <!--<router-link to="/" class="btn btn-primary">about</router-link>-->
        <!--<router-link to="/contact" class="btn btn-primary">contact</router-link>-->

        <!--</div>-->
        <!--</div>-->
    </div>
</template>

<script>
	export default {
		name: "Nav",
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
			//
		},
		beforeUpdate() {},
		updated() {},
		activated() {},
		deactivated() {},
		beforeDestroy() {},
		destroyed() {},
		methods: {
			logout() {
				this.$store.dispatch('logout');
			},
		},
		computed: {
			//
		},

		props: {},
		components: {
			'logo': require('./Logo'),
		},
		watch: {},

	};
</script>

<style scoped lang="scss">
    $nav-height: 30px;
    $nav-container-height: $nav-height + 25;

    @import "../../../sass/variables";

    $button-transition-speed: .3s;

    .navbar {
        padding: 0;
        width: 100%;
        background: #ef6c00;
        height: 63px;
        position: fixed;
        top: 0;
        z-index:10;
        box-shadow: 0 1px 51px -6px black;
    }

    nav {
        height: $nav-container-height;
        top: 0;
        z-index: 10;
        padding: 0;
        position: fixed;
        width: 100%;

        #nav-color {
            background: $color-primary;
            width: 100%;
            height: $nav-height;

        }

        #nav-links {
            padding: 5px 18px;
            position: relative;
            top: -$nav-height;
            background: #ffffff9e;
            justify-content: center;
            width: auto;
            margin: 0 auto;
        }

        #logo {
            position: absolute;
        }

    }

    a {
        -webkit-transition: $button-transition-speed; /* Safari */
        transition: $button-transition-speed;

        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
        position: relative;
        top: -11px;
        &:hover {
            top: 0;
        }
    }


</style>