<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{edit_user ? 'Update User' : 'New User'}}</h3>
                </div>
                <div class="box-body">
                    <form @submit.prevent="saveUser()">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="form.name" required>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" v-model="form.title" required>
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" class="form-control" v-model="form.code_no" required>
                        </div>
                        <div class="form-group">
                            <label>Join Date</label>
                            <datepicker v-model="form.join_date" required></datepicker>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" v-model="form.email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" v-model="form.password">
                        </div>

                        <button type="submit" class="btn btn-primary">{{edit_user ? 'Update' : 'Save'}}</button>
                        <button type="button" class="btn btn-outline-danger" @click="cancel">Cancel</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        props:['edit'],
        data(){
            return {
                form:{
                    name:'',
                    title:'',
                    code_no:'',
                    email:'',
                    join_date:'',
                    password:'',
                    id:''
                },
                edit_user: this.edit
            }
        },
        created(){
            this.listen();
        },
        methods:{
            saveUser(){
                this.form.join_date = moment(this.form.join_date).format('YYYY-MM-DD')
                this.edit_user ? this.update() : this.save();
            },
            save(){
                delete this.form.id;
                if (this.form.password ===''){
                    return this.$toastr.e('Password field cannot be empty.');
                }
                axios.post('users',this.form)
                    .then(res =>{
                        this.$store.state.all_my_users.unshift(res.data);
                        eventBus.$emit('listUsers',res.data)
                    })
                    .catch(error => error.response)
            },
            update(){
                axios.patch(`users/${this.form.id}`,this.form)
                    .then(res => {
                        this.edit_user = false;
                        eventBus.$emit('updateUser',res.data);
                    })
                    .catch(error => error.response)
            },
            cancel(){
                eventBus.$emit('cancel')
            },
            listen(){
                if (this.edit){
                    this.form = this.$store.state.user
                }
            },
        },
        components:{
            Datepicker
        }
    }
</script>

<style>
    .vdp-datepicker input {
        border-radius: 0;
        box-shadow: none;
        border-color: #d2d6de;
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
</style>

