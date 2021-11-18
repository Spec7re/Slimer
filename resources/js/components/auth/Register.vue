<template>

    <form @submit.prevent="register" class="col-6 shadow p-3 mb-5 bg-white rounded p-4 m-auto mt-lg-5">
      <div class="text-center">
        <h1 class="mt-3 mb-3">Register</h1>
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="firstName" type="text" placeholder="First Name*" aria-label=".form-control-lg example" required>
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="lastName" type="text" placeholder="Last Name*" aria-label=".form-control-lg example" required>
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="email" type="text" placeholder="Email*" aria-label=".form-control-lg example" required>
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="password" type="password" placeholder="Password*" aria-label=".form-control-lg example" required>
      </div>
      <div class="mb-4">
        <input class="form-control form-control-lg" v-model="confirmPassword" type="password" placeholder="Confirm Password*" aria-label=".form-control-lg example" required>
      </div>
      <div class="text-center">
        <button class="btn btn-primary pl-5 pr-5 mt-2">Register</button>
      </div>
    </form>

</template>

<script>

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
        // Done with Fetch method just for example.
        async register() {
          const {firstName, lastName, email, password, confirmPassword } = this;
          const res = await fetch(
              "/register",
              {
                method: "POST",
                headers: {
                  "Content-Type": "application/json"
                },
                body: JSON.stringify({
                  firstName,
                  lastName,
                  email,
                  password,
                  confirmPassword
                })
              }
          );
          const responseData = await res.json();
          if ( "error" === responseData.status ){
            alert(responseData.message);
          } else if ("success" === responseData.status) {
            alert(responseData.message)
            await this.$router.push('/home');
            this.clearForm();
          }
        },

        clearForm() {
          this.firstName = '';
          this.lastName = '';
          this.email = '';
          this.password = '';
          this.confirmPassword = '';
        }
      }
  }

</script>