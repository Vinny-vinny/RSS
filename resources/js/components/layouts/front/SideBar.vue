<template>
<div>
    <div class="single-slidebar">
        <h4>Jobs by Location</h4>
        <ul class="cat-list">
            <li v-for="location in all_locations" :key="location.id"><a class="justify-content-between d-flex" href="#"><p>{{location.name}}</p><span>{{LocationCount(location.id)}}</span></a></li>
        </ul>
    </div>
    <div class="single-slidebar">
        <h4>Jobs by Category</h4>
        <ul class="cat-list">
            <li v-for="category in all_categories" :key="category.id"><a class="justify-content-between d-flex" href="#"><p>
                {{category.name}}</p><span>{{CategoryCount(category.id)}}</span></a></li>
        </ul>
    </div>
</div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        created() {
            this.getDetails();
        },
        computed:{
            ...mapGetters([
                'all_categories',
                'all_locations',
                'all_vacancies'
            ]),

        },
        methods:{
            getDetails(){
                this.$store.dispatch('my_categories');
                this.$store.dispatch('my_locations');
                this.$store.dispatch('my_vacancies');
            },
            CategoryCount(category_id){
                let count = 0;
                for (let i =0;i<this.all_vacancies.length;i++){
                    if (this.all_vacancies[i]['category_id'] ===category_id){
                        count++;
                    }
                }
                return count;
            },
            LocationCount(location_id){
                let count = 0;
                for (let i =0;i<this.all_vacancies.length;i++){
                    if (this.all_vacancies[i]['location_id'] ===location_id){
                        count++;
                    }
                }
                return count;
            }

        }
    }
</script>

<style scoped>

</style>
