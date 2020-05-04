<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{edit_jobtype ? 'Update Job Type' : 'New Job Type'}}</h3>
                </div>
                <div class="box-body">
                    <form @submit.prevent="saveJobtype()">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="form.name" required placeholder="Enter Job Type">
                        </div>

                        <button type="submit" class="btn btn-primary">{{edit_jobtype ? 'Update' : 'Save'}}</button>
                        <button type="button" class="btn btn-outline-danger" @click="cancel">Cancel</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        props:['edit'],
        data(){
            return {
                form:{
                    name:'',
                    id:''
                },
                edit_jobtype: this.edit
            }
        },
        created(){
            this.listen();
        },
        methods:{
            saveJobtype(){
                this.edit_jobtype ? this.update() : this.save();
            },
            save(){
                delete this.form.id;
                axios.post('job-type',this.form)
                    .then(res =>{
                        this.$store.state.all_my_jobtypes.unshift(res.data);
                        eventBus.$emit('listJobtypes',res.data)
                    })
                    .catch(error => error.response)
            },
            update(){
                axios.patch(`job-type/${this.form.id}`,this.form)
                    .then(res => {
                        this.edit_jobtype = false;
                        eventBus.$emit('updateJobtype',res.data);
                    })
                    .catch(error => error.response)
            },
            cancel(){
                eventBus.$emit('cancel')
            },
            listen(){
                if (this.edit){
                    this.form = this.$store.state.jobtype
                }
            },
        },
    }
</script>


