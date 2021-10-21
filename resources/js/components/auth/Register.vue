<template>

    <div class="col-6 shadow p-3 mb-5 bg-white rounded p-4 m-auto mt-lg-5">
      <div class="text-center">
        <h1 class="mt-3 mb-3">Register</h1>
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="firstName" type="text" placeholder="First Name" aria-label=".form-control-lg example">
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="lastName" type="text" placeholder="Last Name" aria-label=".form-control-lg example">
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="email" type="text" placeholder="Email" aria-label=".form-control-lg example">
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="password" type="text" placeholder="Password" aria-label=".form-control-lg example">
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="confirmPassword" type="text" placeholder="Confirm Password" aria-label=".form-control-lg example">
      </div>
      <div class="text-center">
        <button class="btn btn-primary pl-5 pr-5 mt-2" @click="register">Register</button>
      </div>
    </div>

</template>

<script>

  import axios from "axios";

  export default {
      name: "register",
      data() {
        return {
          firstName: "",
          lastName: "",
          email: "",
          password: "",
          confirmPassword: "",
        };
      },
      methods: {
        register() {
          console.log('DATA SENT')
          // Send a POST request
          // axios({
          //   method: 'POST',
          //   url: '/register',
          //   data: {
          //     firstName: this.firstName,
          //     lastName: this.lastName,
          //     email: this.email,
          //     password: this.password,
          //     confirmPassword: this.confirmPassword,
          //   }
          // });
        }
      }
  }

</script>