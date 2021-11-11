<template>

  <form @submit.prevent="createPost" class="col-8  shadow p-3 mb-5 bg-white rounded p-4 m-auto mt-lg-5">
    <div class="text-center">
      <h1 class="mt-3 mb-3">Create new post</h1>
    </div>
    <div class="mb-4">
      <input class="form-control form-control-lg" v-model="title" type="text" name="title" placeholder="Title" aria-label=".form-control-lg example">
    </div>
    <div class="mb-4">
      <textarea class="form-control form-control-lg" v-model="body" placeholder="Content" name="body" cols="50" rows="10" aria-label=".form-control-lg example"></textarea>
    </div>
    <div class="text-center">
      <button class="btn btn-primary pl-5 pr-5 mt-2">Create post</button>
    </div>
  </form>

</template>

<script>
import axios from "axios";

export default {
  name: "PostForm",
  data() {
    return {
      title: "",
      body: "",
    };
  },
  methods: {
    createPost() {
      // Send a POST request
      axios({
        method: 'POST',
        url: '/api/post',
        data: {
          title: this.title,
          body: this.body,
        }
      }).then( (response) => {
        let responseData = response.data;
        if ( "error" === responseData.status ){
          alert(responseData.message);
        } else if ("success" === responseData.status) {
          alert(responseData.message)
          this.$router.push('/post')
        }
      });
      this.clearForm();
    },

    clearForm() {
      this.title = '';
      this.body = '';
    }
  }
}
</script>

<style scoped>

</style>