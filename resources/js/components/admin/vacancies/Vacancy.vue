<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
               <h3 class="box-title">{{edit_vacancy ? 'Update Vacancy' : 'New Vacancy'}}</h3>
                </div>
                <div class="box-body">
                    <form @submit.prevent="saveVacancy()">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" v-model="form.title" required>
                        </div>
                        <div class="form-group">
                            <label>Date Posted</label>
                            <datepicker v-model="form.date_posted" required></datepicker>
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <datepicker v-model="form.expiry_date" required></datepicker>
                        </div>
                        <div class="form-group">
                            <label>Category </label>
                            <select v-model="form.category_id" class="form-control" required>
                                <option :value="category.id" v-for="category in all_categories" :key="category.id">{{category.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Job Type</label>
                            <select v-model="form.job_type_id" class="form-control" required>
                                <option :value="job.id" v-for="job in all_jobtypes" :key="job.id">{{job.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <select v-model="form.location_id" class="form-control" required>
                                <option :value="location.id" v-for="location in all_locations" :key="location.id">{{location.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea v-model="form.description" cols="30" rows="10" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{edit_vacancy ? 'Update' : 'Save'}}</button>
                        <button type="button" class="btn btn-outline-danger" @click="cancel">Cancel</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import formatDate from "../../../mixins/datepicker";
    import {mapGetters} from "vuex";
    export default {
        mixins:[formatDate],
        props:['edit'],
        data(){
            return {
                form:{
                    title:'',
                    description:'',
                    date_posted:'',
                    expiry_date:'',
                    category_id:'',
                    job_type_id:'',
                    location_id:'',
                    id:''
                },
                edit_vacancy: this.edit
            }
        },
        created(){
            this.getDetails();
            this.listen();
        },
        computed:{
          ...mapGetters([
              'all_categories',
              'all_jobtypes',
              'all_locations'
          ])
        },
        methods:{
            getDetails(){
              this.$store.dispatch('my_categories');
              this.$store.dispatch('my_jobtypes');
              this.$store.dispatch('my_locations');
            },
            saveVacancy(){
               if (this.validateDates()===0){
                   return this.$toastr.e('Date fields are required')
               }else if (this.validateDates()===-1){
                    return this.$toastr.e('Date posted cannot be greater than due date')
                }
                this.edit_vacancy ? this.update() : this.save();
            },
            save(){
                delete this.form.id;
                axios.post('vacancy',this.form)
                    .then(res =>{
                        this.$store.state.all_my_vacancies.unshift(res.data);
                        eventBus.$emit('listVacancies',res.data)
                    })
                    .catch(error => error.response)
            },
            update(){
                axios.patch(`vacancy/${this.form.id}`,this.form)
                    .then(res => {
                        this.edit_vacancy = false;
                        eventBus.$emit('updateVacancy',res.data);
                    })
                    .catch(error => error.response)
            },
            cancel(){
                eventBus.$emit('cancel')
            },
            listen(){
                if (this.edit){
                    this.form = this.$store.state.vacancy
                }
            },
        },
        components:{
            Datepicker
        }
    }
</script>


