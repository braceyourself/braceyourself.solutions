<template>
    <a :href="to"><slot>{{to}}</slot></a>
</template>

<script>
	export default {
		name: "Hyperlink",
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

		props: {
            to:{
            	default:'/'
            }
        },
		components: {},
		watch: {},

	};
</script>

<style scoped>

</style>