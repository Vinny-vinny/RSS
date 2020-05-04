<template>
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <div class="single-post d-flex flex-row">
                        <div class="details">
                            <div class="title d-flex flex-row justify-content-between">
                                <div class="titles">
                                    <a href="#"><h4>{{vacancy.title}}</h4></a>
                                </div>
                                <ul class="btns">
                                    <li><a href="#"><span class="lnr lnr-heart"></span></a></li>
                                    <li><a href="#">Apply</a></li>
                                </ul>
                            </div>
                            <p>
                           {{vacancy.description}}
                            </p>
                            <h5>Job Nature: {{vacancy.job_nature}}</h5>
                            <p class="address"><span class="lnr lnr-map"></span> Date Posted: {{vacancy.posted}}</p>
                            <p class="address"><span class="lnr lnr-database"></span> Due Date: {{vacancy.due_date}}</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 sidebar">
                    <side-bar></side-bar>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
    import SideBar from "../../layouts/front/SideBar";
    export default {
        computed:{
          vacancy(){
              return this.$store.state.vacancy;
          }
        },
        components:{
            SideBar
        }
    }
</script>

<style scoped>

</style>
