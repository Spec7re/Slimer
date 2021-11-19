<template>

  <form @submit.prevent="login" class="col-6  shadow p-3 mb-5 bg-white rounded p-4 m-auto mt-lg-5">
    <div class="text-center">
      <h1 class="mt-3 mb-3">Login</h1>
    </div>
    <div class="mb-4">
      <input class="form-control form-control-lg" v-model="email" type="text" name="email" placeholder="Email" aria-label=".form-control-lg example" required>
    </div>
    <div class="mb-4">
      <input class="form-control form-control-lg" v-model="password" type="password" name="password" placeholder="Password" aria-label=".form-control-lg example" required>
    </div>
    <div class="text-center">
      <button class="btn btn-primary pl-5 pr-5 mt-2">Login</button>
    </div>
  </form>

</template>

<script>
import axios from "axios";

export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async login() {
      // Send a POST request
      axios({
        method: 'POST',
        url: '/login',
        data: {
          email: this.email,
          password: this.password,
        }
      }).then( (response) => {
        let responseData = response.data;
        if ( "error" === responseData.status ){
          alert(responseData.message);
        } else if ("success" === responseData.status) {
          alert(responseData.message);
          this.$store.dispatch('setToken', JSON.parse(responseData.data).Bearer)
          this.$store.dispatch('login', true)
          this.redirect();
        }
      });
      this.clearForm();
    },
    redirect(){
      this.$router.push('/home');
    },
    clearForm() {
      this.email = '';
      this.password = '';
    }
  }
}
</script>

<style scoped>

</style>