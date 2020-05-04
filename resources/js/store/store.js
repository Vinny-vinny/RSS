import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        path_to: '/',
        user: {},
        all_my_users: {},
        category: {},
        all_my_categories: {},
        location: {},
        all_my_locations: {},
        jobtype: {},
        all_my_jobtypes: {},
        vacancy: {},
        all_my_vacancies: {},
        loading: false,
    },

    mutations: {
        pathTo(state, to) {
            state.path_to = to;
        },
          my_users(state, data) {
            state.all_my_users = data;
        },
        updateUser(state,user){
            state.user = user;
        },
        my_categories(state, data) {
            state.all_my_categories = data;
        },
        updateCategory(state,category){
            state.category = category;
        },
        my_locations(state, data) {
            state.all_my_locations = data;
        },
        updateLocation(state,location){
            state.location = location;
        },
        my_jobtypes(state, data) {
            state.all_my_jobtypes = data;
        },
        updateJobtype(state,type){
            state.jobtype = type;
        },

        my_vacancies(state, data) {
            state.all_my_vacancies = data;
        },
        updateVacancy(state,type){
            state.vacancy = type;
        },
    },
    getters: {
        all_users(state) {
            return state.all_my_users;
        },
        all_categories(state) {
            return state.all_my_categories;
        },
        all_locations(state) {
            return state.all_my_locations;
        },
        all_jobtypes(state) {
            return state.all_my_jobtypes;
        },
        all_vacancies(state) {
            return state.all_my_vacancies;
        }
    },
    actions: {
        pathTo({commit}, to) {
            commit('pathTo', to);
        },
        updateUser({commit}, user) {
            commit('updateUser', user);
        },
        my_users({commit}) {
        axios.get('users')
            .then(res => {
                commit('my_users', res.data);
            })
    },
        updateCategory({commit}, category) {
            commit('updateCategory', category);
        },
        my_categories({commit}) {
        axios.get('category')
            .then(res => {
                commit('my_categories', res.data);
            })
        },
        updateLocation({commit}, location) {
            commit('updateLocation', location);
        },
        my_locations({commit}) {
            axios.get('location')
                .then(res => {
                    commit('my_locations', res.data);
                })
        },
        updateJobtype({commit}, type) {
            commit('updateJobtype', type);
        },
        my_jobtypes({commit}) {
            axios.get('job-type')
                .then(res => {
                    commit('my_jobtypes', res.data);
                })
        },
        updateVacancy({commit}, type) {
            commit('updateVacancy', type);
        },
        my_vacancies({commit}) {
            axios.get('vacancy')
                .then(res => {
                    commit('my_vacancies', res.data);
                })
        },
    }
})
