import AdminLayout from "./components/layout/AdminLayout";

window.axios = require("axios");
window.Vue = require("vue");


import Vue from "vue";
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);


import vuetify from "./vuetify";
import router from "./router";


import ExampleComponent from "./components/ExampleComponent";
import AppLayout from "./components/layout/AppLayout";
import AuthLayout from "./components/layout/AuthLayout";


import { i18n } from './i18n'
import { Trans } from './plugins/Translation'

Vue.prototype.$i18nRoute = Trans.i18nRoute.bind(Trans)

const app = new Vue({
    i18n,
    router,
    vuetify,
    el: "#app",
    components: {
        ExampleComponent,
        AppLayout,
        AuthLayout,
        AdminLayout
    }
});
