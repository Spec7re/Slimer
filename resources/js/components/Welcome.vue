<template>

    <main role="main" style="margin-top: 200px;" class="text-center">
      <h1 class="cover-heading">SLIMER BLOG</h1>
      <p class="lead">Sed facilisis commodo mi, et sodales sem pulvinar eu. Phasellus placerat quam eget dictum fringilla. Maecenas mattis gravida rhoncus. Nam interdum blandit magna sed varius.
        Sed mollis sed ligula viverra facilisis. Sed lobortis pretium faucibus. Ut viverra, mauris vel malesuada consequat, justo ligula iaculis est, vitae fermentum mi nisi id velit. Phasellus et leo dolor.
      </p>
      <div class="text-center" v-if="!loggedIn">
        <p class="lead">
          <a @click="redirect" class="btn btn-lg btn-secondary">REGISTER</a>
        </p>
      </div>
    </main>

</template>

<script>
  export default {
    name: "Welcome",
    methods: {
      redirect() {
        this.$router.push("/register");
      }
    },
    computed: {
      loggedIn() {
        return this.$store.state.loggedIn;
      }
    }
  }
</script>

<style scoped>

</style>