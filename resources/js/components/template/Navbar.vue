<template>
  <div>

    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <router-link class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none" :to="loggedIn ? '/home' : '/'">
        <span class="fs-4">Delta</span>
      </router-link>
      <ul class="nav nav-pills">
        <template v-if="!loggedIn">
          <li>
            <router-link to="/login">
              <button class='nav-link' active-link="active">
                Login
              </button>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/register">
              <button class='nav-link'>
                Register
              </button>
            </router-link>
          </li>
        </template>
        <template v-if="loggedIn">
          <li>
            <router-link to="/home">
              <button class="nav-link">Dashboard</button>
            </router-link>
          </li>
          <li>
            <router-link to="/post">
              <button class="nav-link">Posts</button>
            </router-link>
          </li>
          <li>
            <router-link to="/logout">
              <button @click="logout" class="nav-link">Logout</button>
            </router-link>
          </li>
        </template>
      </ul>
    </header>

  </div>
</template>

<script>
  export default {
    name: "Navbar",
    data() {
      return {
      };
    },
    methods:{
      logout() {
        sessionStorage.clear();
        this.$store.dispatch('login')
        this.redirect();
      },
      redirect() {
        this.$router.push("/");
      },
    },
    computed: {
      loggedIn() {
        return this.$store.state.loggedIn;
      }
    },
  }
</script>

<style scoped>

</style>