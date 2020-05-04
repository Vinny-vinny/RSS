<template>
    <div>
        <vacancy v-if="add_vacancy" :edit="editing"></vacancy>
        <!-- Main content -->
        <section class="content" v-if="!add_vacancy">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <v-app id="inspire">
                        <v-card>
                            <v-card-title>
                                Vacancies
                                <v-spacer></v-spacer>
                                <v-text-field
                                    v-model="search"
                                    append-icon="mdi-magnify"
                                    label="Search"
                                    single-line
                                    hide-details
                                ></v-text-field>
                                <v-spacer></v-spacer>
                                <v-btn small color="indigo" dark @click="add_vacancy=true">Add Vacancy
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
                                    <v-icon blue normal fab @click="editVacancy(item)">mdi-pencil</v-icon>
                                 <v-icon red normal @click="deleteVacancy(item.id)">mdi-delete</v-icon>

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
    import Vacancy from "./Vacancy";
    import datatable from "../../../mixins/datatable";

    export default {
        mixins:[datatable],
        data(){
            return {
                add_vacancy: false,
                editing: false,
                headers: FieldDefs
            }
        },
        created(){
            this.listen();
            this.getVacancies();
        },
        computed:{
            ...mapGetters({
                tableData:'all_vacancies'
            })
        },
        methods:{
            getVacancies(){
                this.$store.dispatch('my_vacancies').then(() => {
                    this.getItems();
                    if (this.tableData.length == undefined) {
                        setTimeout(() => {
                            this.getItems();
                        }, 1000);
                    }
                })
            },
            editVacancy(vacancy){
                this.$store.dispatch('updateVacancy',vacancy)
                    .then(() =>{
                        this.editing=true;
                        this.add_vacancy=true;
                    })
            },
            deleteVacancy(id){
                axios.delete(`vacancy/${id}`)
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
                eventBus.$on('listVacancies',() =>{
                    this.getItems();
                    this.add_vacancy =false;
                });
                eventBus.$on('cancel',()=>{
                    this.add_vacancy = false;
                    this.editing = false;
                });
                eventBus.$on('updateVacancy',(vacancy)=>{
                    this.add_vacancy = false;
                    this.editing = false;
                    for (let i=0;i<this.tableData.length;i++){
                        if (this.tableData[i].id == vacancy.id){
                            this.tableData.splice(i,1);
                        }
                    }
                    this.tableData.unshift(vacancy);
                });
            },

        },
        components:{
            Vacancy
        }
    }
</script>

