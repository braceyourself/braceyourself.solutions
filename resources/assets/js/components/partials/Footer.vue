<template>
    <div>
        <div id="footer">
            <div class="column">
                <a href="http://ethan.braceyourself.solutions/resume">resume</a>
                <a href="http://ethan.braceyourself.solutions/blog">blog</a>
            </div>
            <span class="vr"></span>
            <div class="column">
                <router-link to="login">login</router-link>
            </div>
        </div>

        <div id="bottom">
            foot
        </div>

    </div>
</template>

<style scoped lang="scss">
    @import "../../../sass/variables";

    #footer {

        /*position: absolute;*/
        width: 100%;
        height: auto;
        padding:15px;
        background: $color-secondary-dark;
        display: flex;
        flex-direction: row;
        justify-content: center;

        .column {
            text-align: center;

            a {
                display: block;
                color: white;
            }
        }

        .vr{
            border: 1px solid $color-secondary-light;
            width:1px;
            margin: 5px;
            padding:15px 0;

        }



    }
    #bottom{
        background-color: black;
    }
</style>

<script>
	export default {
		name: "Footer",
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

			this.$store.dispatch('set_main_min_height');

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
			//
		},

		props: {},
		components: {},
		watch: {},

	};
</script>

