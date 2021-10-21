<template>
  <div>
      <register><!-- Register component --></register>
  </div>
</template>

<script>
  import RegisterComponent from "./auth/Register.vue";
  export default {
    components: {
      'register' : RegisterComponent,
    }
  }
</script>