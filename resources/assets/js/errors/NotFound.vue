<template>
    <div class="flex-center" id="page-not-found">
        <span id="box"></span>
        <div class="title">
            404
        </div>
        <h1 style="text-decoration: underline">
            Page Not Found
        </h1>
    </div>
</template>

<script>
	export default {
		name: "NotFound",
		data() {
			return {
				//
			};
		},

		beforeCreate() {},
		created() {
			console.log('not found');
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
    #page-not-found {
        background: steelblue;
        min-height: 250px;
        color: aliceblue;
        .title {
            z-index: 1;
        }
        #box {
            height: 200px;
            width: 200px;
            background: black;
            position: relative;
            left: 120px;
            z-index: 0;
            border-radius: 50%;
        }
    }


</style>