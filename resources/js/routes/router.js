import Vue from 'vue';
import VueRouter from "vue-router";
import Login from "../components/auth/Login";
import Register from "../components/auth/Register";
import Users from "../components/users/Index";
import Vacancy from "../components/front/vacancy/Index";
import Category from "../components/admin/categories/Index";
import Location from "../components/admin/locations/Index";
import JobType from "../components/admin/jobtypes/Index";
import JobVacancy from "../components/admin/vacancies/Index";
import ViewVacancy from "../components/front/single/Index";


Vue.use(VueRouter);
function guard(to, from, next) {
    if (User.loggedIn()) {
        next();
    } else {
        next('/login');
    }
}
const routes = [
    {path:'/login',component: Login},
    {path:'/signup',component: Register},
    {path:'/users',component: Users, beforeEnter: guard},
    {path:'/home',component:Vacancy},
    {path:'/categories',component:Category,beforeEnter: guard},
    {path:'/locations',component:Location,beforeEnter: guard},
    {path:'/job-types',component:JobType,beforeEnter: guard},
    {path:'/job-vacancy',component:JobVacancy,beforeEnter: guard},
    {path:'/view-vacancy',component:ViewVacancy},
];

export default new VueRouter({
    routes,
    mode: 'history'
});
