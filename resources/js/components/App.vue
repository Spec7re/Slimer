<template>
  <div>
      <register></register>
  </div>
</template>

<script>
  import RegisterComponent from "./auth/register.vue";
  export default {
    components: {
      'register' : RegisterComponent,
    }
  }
</script>