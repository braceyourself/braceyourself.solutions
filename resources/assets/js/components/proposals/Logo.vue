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
		name: 'logo',
	};
</script>
<style scoped lang="scss">
    $primary: #2196f3;
    $primary_light: #6ec6ff;
    $primary_dark: #0069c0;

    $secondary: #757575;
    $secondary_light: #a4a4a4;
    $secondary_dark: #494949;

    .flex-center {
        flex-direction: column;
    }

    .header {
        top: -67px;
        position: relative;
        height: 36px;
        color: ghostwhite;

        span {
            position: relative;
            font-size: 40px;

        }
    }
</style>