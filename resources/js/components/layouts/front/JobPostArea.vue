<template>
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <div class="single-post d-flex flex-row" v-for="vacancy in all_vacancies">
                        <div class="details">
                            <div class="title d-flex flex-row justify-content-between">
                                <div class="titles">
                                    <a href="#"><h4>{{vacancy.title}}</h4></a>
                                </div>
                                <ul class="btns">
                                    <li><a href="#"><span class="lnr lnr-heart"></span></a></li>
                                    <li><a href="#" @click="viewDetails(vacancy)">Apply</a></li>
                                </ul>
                            </div>
                            <p>
                                {{vacancy.description | str_limit(150)}}
                            </p>
                            <h5>Job Nature: {{vacancy.job_nature}}</h5>
                            <button class="btn btn-primary btn-sm" @click="viewDetails(vacancy)"><i class="fa fa-eye"></i> View Datails</button>
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
    import {mapGetters} from "vuex";
    import SideBar from "./SideBar";

    export default {
       created() {
           this.getDetails();
       },
        computed:{
           ...mapGetters([
               'all_jobtypes',
               'all_vacancies'
           ]),
        },
        methods:{
           getDetails(){
               this.$store.dispatch('my_jobtypes');
               this.$store.dispatch('my_vacancies');
           },
            JobtypeCount(type_id){
                let count = 0;
                for (let i =0;i<this.all_vacancies.length;i++){
                    if (this.all_vacancies[i]['job_type_id'] ===type_id){
                      count++;
                    }
                }
                return count;
            },
            viewDetails(vacancy){
               this.$store.dispatch('updateVacancy',vacancy)
                .then(() =>{
                    this.$router.push('/view-vacancy')
                })
            }
        },
        components:{
           SideBar
        }
    }
</script>

<style scoped>

</style>
