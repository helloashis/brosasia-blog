require('./bootstrap');
window.Vue = require('vue').default;
// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)



//Vue Route

const router = new VueRouter({
    mode:'history',
    routes:[
        { path: '/admin/dashboard', component: Index },
        { path: '/about', component: About },
        { path: '/contact-us', component: Contact },
    ]

});


//Default Components
Vue.component('header-section', require('./components/backend/header.vue').default);


const adminapp = new Vue({
    el: '#adminapp',
    router
});
