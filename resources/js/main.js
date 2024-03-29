import Vue from "vue";
import Vuex from "vuex"
import VueRouter from "vue-router";

import App from "./components/App";
import Welcome from "./components/Welcome";
import Login from "./components/auth/Login";
import Register from "./components/auth/Register.vue";
import Dashboard from "./components/user/Dashboard";
import PostsIndex from "./components/post/PostsIndex";
import PostForm from "./components/post/PostForm";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        loggedIn: !! sessionStorage.getItem('token'),
        token: sessionStorage.getItem('token'),
    },
    mutations: {
        LOGIN: (state) => {
            state.loggedIn = !! sessionStorage.getItem('token');
        },
    },
    actions: {
        login: ({ commit }) => {
            commit('LOGIN')
        },
    }
})

Vue.use(VueRouter)

const routes = [
    { path: '/login', component: Login },
    { path: '/', component: Welcome },
    { path: '/register', component: Register },
    { path: '/home', component: Dashboard },
    { path: '/post', component: PostsIndex },
    { path: '/post-form', component: PostForm },
    { path: '/logout', redirect: '/' },

    { path: '*',  redirect: '/' },
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

let app = new Vue ({
    el: '#app',
    store,
    router,
    render: h => h(App)
});