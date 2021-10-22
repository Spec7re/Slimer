import Vue from "vue";
import App from "./components/App";
import RegisterComponent from "./components/auth/Register.vue";
import PostsIndex from "./components/post/PostsIndex";
import PostForm from "./components/post/PostForm";
import Login from "./components/auth/Login";
import Dashboard from "./components/user/Dashboard";
import Welcome from "./components/Welcome";


Vue.component('welcome', Welcome);
Vue.component('register', RegisterComponent);
Vue.component('login', Login)
Vue.component('dashboard', Dashboard)
Vue.component('post-index', PostsIndex);
Vue.component('post-form', PostForm)

let app = new Vue ({
    el: '#app',
    // render: h => h(App)
});