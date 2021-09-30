<template>
  <div>
    <div class="container">
      <div class="text-center">
        <h1>SLIM HOME PAGE</h1>
      </div>

      <register>
      </register>
    </div>
  </div>
</template>

<script>
  import RegisterComponent from "./auth/register.vue";
  export default {
    data: function(){
    },
    components: {
      'register' : RegisterComponent,
    }
  }
</script>