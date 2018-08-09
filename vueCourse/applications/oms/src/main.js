import Vue from 'vue'
import App from './components/App.vue'
import VueRouter from 'vue-router'
import {fbApp} from './firebaseApp'


Vue.use(VueRouter)
import store from './store'
import addOrganization from './components/addOrganization.vue'
import Dashboard from './components/Dashboard.vue'
import Organization from './components/Organization.vue'
const router = new VueRouter({
    mode:'history',
    routes:[
        {path:'/dashboard',component: Dashboard},
        {path:'/add-organization',component: addOrganization},
        {path:'/organizations',component: Organization}
    ]
})


new Vue({
    el:'#app',
    router,
    store,
    render: h=>h(App)
})