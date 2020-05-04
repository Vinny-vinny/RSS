<template>
<header id="header">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="#" @click="goHome()"><img src="images/front/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <router-link to="/home" class="menu-active">Home</router-link>
                    <router-link to="/login" class="ticker-btn">Login</router-link>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->
</template>

<script>
    export default {
        methods:{
            goHome(){
                this.$router.push('/home')
            }
        }
    }
</script>

<style scoped>

</style>
