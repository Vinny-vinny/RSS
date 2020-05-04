<template>
    <div>
        <location v-if="add_location" :edit="editing"></location>
        <!-- Main content -->
        <section class="content" v-if="!add_location">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <v-app id="inspire">
                        <v-card>
                            <v-card-title>
                                Job Locations
                                <v-spacer></v-spacer>
                                <v-text-field
                                    v-model="search"
                                    append-icon="mdi-magnify"
                                    label="Search"
                                    single-line
                                    hide-details
                                ></v-text-field>
                                <v-spacer></v-spacer>
                                <v-btn small color="indigo" dark @click="add_location=true">Add Location
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
                                    <v-icon blue normal fab @click="editLocation(item)">mdi-pencil</v-icon>
                                    <span>
                                    <v-icon red normal @click="deleteLocation(item.id)">mdi-delete</v-icon>
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
    import Location from "./Location";

    export default {
        mixins:[datatable],
        data(){
            return {
                add_location: false,
                editing: false,
                headers: FieldDefs
            }
        },
        created(){
            this.listen();
            this.getLocations();
        },
        computed:{
            ...mapGetters({
                tableData:'all_locations'
            })
        },
        methods:{
            getLocations(){
                this.$store.dispatch('my_locations').then(() => {
                    this.getItems();
                    if (this.tableData.length == undefined) {
                        setTimeout(() => {
                            this.getItems();
                        }, 1000);
                    }
                })
            },
            editLocation(location){
                this.$store.dispatch('updateLocation',location)
                    .then(() =>{
                        this.editing=true;
                        this.add_location=true;
                    })
            },
            deleteLocation(id){
                axios.delete(`location/${id}`)
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
                eventBus.$on('listLocations',() =>{
                    this.getItems();
                    this.add_location =false;
                });
                eventBus.$on('cancel',()=>{
                    this.add_location = false;
                    this.editing = false;
                });
                eventBus.$on('updateLocation',(location)=>{
                    this.add_location = false;
                    this.editing = false;
                    for (let i=0;i<this.tableData.length;i++){
                        if (this.tableData[i].id == location.id){
                            this.tableData.splice(i,1);
                        }
                    }
                    this.tableData.unshift(location);
                });
            },

        },
        components:{
            Location
        }
    }
</script>

