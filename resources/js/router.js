import Vue from "vue";
import VueRouter from "vue-router";
import AdminLayout from "./components/layout/AdminLayout";
import AuthLayout from "./components/layout/AuthLayout";
import ExampleComponent from "./components/ExampleComponent";


Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: AdminLayout,
        name:"admin"
    },
    {
        path: "/test",
        component: ExampleComponent,
        name:"test"
    },
    {
        path: "/login",
        component: AuthLayout,
        name:"login",
        meta: {
            layout: "auth"
        }
    },

]

export default new VueRouter({mode: 'history',
    publicPath: "/", routes})
