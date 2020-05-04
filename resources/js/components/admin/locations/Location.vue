<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{edit_location ? 'Update Location' : 'New Location'}}</h3>
                </div>
                <div class="box-body">
                    <form @submit.prevent="saveLocation()">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="form.name" required placeholder="Enter city name">
                        </div>

                        <button type="submit" class="btn btn-primary">{{edit_location ? 'Update' : 'Save'}}</button>
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
                edit_location: this.edit
            }
        },
        created(){
            this.listen();
        },
        methods:{
            saveLocation(){
                this.edit_location ? this.update() : this.save();
            },
            save(){
                delete this.form.id;
                axios.post('location',this.form)
                    .then(res =>{
                        this.$store.state.all_my_locations.unshift(res.data);
                        eventBus.$emit('listLocations',res.data)
                    })
                    .catch(error => error.response)
            },
            update(){
                axios.patch(`location/${this.form.id}`,this.form)
                    .then(res => {
                        this.edit_location = false;
                        eventBus.$emit('updateLocation',res.data);
                    })
                    .catch(error => error.response)
            },
            cancel(){
                eventBus.$emit('cancel')
            },
            listen(){
                if (this.edit){
                    this.form = this.$store.state.location
                }
            },
        },
    }
</script>


