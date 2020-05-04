<template>

    <div :class="{wrapper:nextPath,wrappercustom:!nextPath}">
    <app-top-nav v-if="nextPath"></app-top-nav>
    <front-header v-if="frontPath || singlePath"></front-header>
    <front-top-header v-if="frontPath || singlePath"></front-top-header>
    <front-banner v-if="frontPath"></front-banner>
    <front-single-banner v-if="singlePath"></front-single-banner>
    <front-features v-if="frontPath"></front-features>
    <front-featured-jobs v-if="frontPath"></front-featured-jobs>
    <front-jobpost v-if="frontPath"></front-jobpost>
    <app-sidebar v-if="nextPath"></app-sidebar>
    <div :class="{'content-wrapper':nextPath,wrapperlogin:!nextPath}">
        <router-view></router-view>
    </div>
<app-footer v-if="nextPath"></app-footer>
<front-footer v-if="frontPath || singlePath"></front-footer>

</div>
</template>
<script>
    export default {
        computed:{
            nextPath(){
              return !(this.$store.state.path_to =='/login' || this.$store.state.path_to=='/signup' || this.$store.state.path_to=='/home' || this.$store.state.path_to=='/view-vacancy');
            },
            frontPath(){
                return this.$store.state.path_to =='/home';
            },
            singlePath(){
                return this.$store.state.path_to =='/view-vacancy';
            }

        },
        created(){
            if(this.$store.state.path_to==='/'){
                this.$router.push('/home')
            }
        }
    }
</script>

<style>
    .wrapperlogin{
        /*margin-right: 10%;*/
        /*margin-left: 10%;*/
        /*height: 100vh;*/
        /*background: darkgray;*/
        /*margin-bottom: 20%;*/

    }
    .wrappercustom{

    }
    .sidebar-mini{
        margin-top: 0 !important;
    }
</style>
