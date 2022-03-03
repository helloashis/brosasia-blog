require('./bootstrap');
window.Vue = require('vue').default;
// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)


import Index from './components/frontend/Index.vue';
import Posts from './components/frontend/Posts.vue';
import About from './components/frontend/About.vue';
import Contact from './components/frontend/Contact.vue';
import single_post from './components/frontend/single-post.vue';

//    Vue Routes
const router = new VueRouter({
    mode:'history',
    routes:[
        { path: '/', component: Index },
        { path: '/allposts', component: Posts },
        { path: '/post/details/:slug', component: single_post },
        { path: '/about', component: About },
        { path: '/contact-us', component: Contact },
    ]

});

Vue.component('index', require('./components/frontend/Index.vue').default);
Vue.component('navbar', require('./components/frontend/navbar.vue').default);
Vue.component('sub-category', require('./components/frontend/subcategory.vue').default);
Vue.component('recent-post', require('./components/frontend/recent-post.vue').default);
Vue.component('footer-section', require('./components/frontend/footer-section.vue').default);


const app = new Vue({
    el: '#app',
    router
});
