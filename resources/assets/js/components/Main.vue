<template>
    <div>
        <!--<navbar></navbar>-->
        <!--<logo></logo>-->
        <router-view id="router-view"/>
        <bottom></bottom>
    </div>
</template>

<style scoped>
    #router-view {
        margin-top: 60px;
        /*padding: 30px 0 0;*/
        min-height: 85vh;
    }
</style>

<script>

	export default {
		components: {
			'navbar': require('./partials/Nav'),
			'bottom': require('./partials/Footer'),
			'logo': require('./partials/Logo'),
		},
		// name: "Main",
		// data() {
		// 	return {
		// 		//
		// 	};
		// },
		//
		// beforeCreate() {},
		// created() {
		// 	//
		// },
		//
		// beforeMount() {},
		// mounted() {
		// 	//
		// },
		// beforeUpdate() {},
		// updated() {},
		// activated() {},
		// deactivated() {},
		// beforeDestroy() {},
		// destroyed() {},
		// methods: {
		// 	//
		// },
		// computed: {
		// 	//
		// },
		//
		// props: {},
		// watch: {},

	};
</script>

