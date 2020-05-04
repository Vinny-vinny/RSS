<template>
    <div>
        <job-type v-if="add_jobtype" :edit="editing"></job-type>
        <!-- Main content -->
        <section class="content" v-if="!add_jobtype">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <v-app id="inspire">
                        <v-card>
                            <v-card-title>
                                Job Types
                                <v-spacer></v-spacer>
                                <v-text-field
                                    v-model="search"
                                    append-icon="mdi-magnify"
                                    label="Search"
                                    single-line
                                    hide-details
                                ></v-text-field>
                                <v-spacer></v-spacer>
                                <v-btn small color="indigo" dark @click="add_jobtype=true">Add Job Type
                                </v-btn>
                            </v-card-title>
                            <v-data-table
                                v-model="selected"
                                :headers="headers"
                                :items="items"
                                :single-select="singleSelect"
                                :sort-by.sync="sortBy"
                                :sort-desc.sync="sortDesc"
                                :search="search"
                                item-key="name"
                                class="elevation-1"
                                :footer-props="{
                              showFirstLastPage: true,
                              firstIcon: 'mdi-arrow-collapse-left',
                              lastIcon: 'mdi-arrow-collapse-right',
                              prevIcon: 'mdi-minus',
                              nextIcon: 'mdi-plus'
                              }"
                            >
                                <template v-slot:item.actions="{ item }">
                                    <v-icon blue normal fab @click="editJobtype(item)">mdi-pencil</v-icon>
                                    <span>
                                    <v-icon red normal @click="deleteJobtype(item.id)">mdi-delete</v-icon>
                                    </span>
                                </template>
                            </v-data-table>
                        </v-card>
                    </v-app>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    import {mapGetters} from "vuex";
    import FieldDefs from "./FieldDefs";
    import datatable from "../../../mixins/datatable";
    import JobType from "./JobType";

    export default {
        mixins:[datatable],
        data(){
            return {
                add_jobtype: false,
                editing: false,
                headers: FieldDefs
            }
        },
        created(){
            this.listen();
            this.getJobtypes();
        },
        computed:{
            ...mapGetters({
                tableData:'all_jobtypes'
            })
        },
        methods:{
            getJobtypes(){
                this.$store.dispatch('my_jobtypes').then(() => {
                    this.getItems();
                    if (this.tableData.length == undefined) {
                        setTimeout(() => {
                            this.getItems();
                        }, 1000);
                    }
                })
            },
            editJobtype(type){
                this.$store.dispatch('updateJobtype',type)
                    .then(() =>{
                        this.editing=true;
                        this.add_jobtype=true;
                    })
            },
            deleteJobtype(id){
                axios.delete(`job-type/${id}`)
                    .then(res => {
                        for (let i=0;i<this.tableData.length;i++){
                            if (this.tableData[i].id == res.data){
                                this.tableData.splice(i,1);
                            }
                        }
                    })
                    .catch(error => Exception.handle(error))
            },
            listen(){
                eventBus.$on('listJobtypes',() =>{
                    this.getItems();
                    this.add_jobtype =false;
                });
                eventBus.$on('cancel',()=>{
                    this.add_jobtype = false;
                    this.editing = false;
                });
                eventBus.$on('updateJobtype',(type)=>{
                    this.add_jobtype = false;
                    this.editing = false;
                    for (let i=0;i<this.tableData.length;i++){
                        if (this.tableData[i].id == type.id){
                            this.tableData.splice(i,1);
                        }
                    }
                    this.tableData.unshift(type);
                });
            },

        },
        components:{
            JobType
        }
    }
</script>

