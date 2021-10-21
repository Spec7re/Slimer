import Vue from "vue";
import App from "./components/App";
import RegisterComponent from "./components/auth/Register.vue";
import PostsIndex from "./components/post/PostsIndex";


Vue.component('register', RegisterComponent);
Vue.component('post-index', PostsIndex);


let app = new Vue ({
    el: '#app',
    // render: h => h(App)
});