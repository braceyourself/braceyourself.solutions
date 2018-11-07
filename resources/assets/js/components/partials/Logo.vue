<template>
    <div class="header flex-center">
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
			//
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

<style scoped lang="scss">

    .header {
        top: -67px;
        position: relative;
        height: 36px;
        color: ghostwhite;

        span {
            position: relative;
            font-size: 40px;

        }
        #logo1 {
            top: 99px;
            left: -72px;
        }
        #logo2 {
            top: 35px;
            left: 63px;
        }
        #logo3 {
            font-size: 27px;
            top: 1px;
            font-variant-caps: all-petite-caps;
            left: 83px;

        }
        #logo-bar {
            border: 1px solid black;
            width: 402px;
            top: -25px;
        }
    }

</style>