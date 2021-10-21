<template>

  <div class="container">
    <main role="main">
      <div class="text-center mb-lg-2">
        <h1 class="cover-heading">Posts</h1>
        <span class="offset-11">
          <a href="/api/post-form" class="btn btn-primary pl-5 pr-5 mt-2" type="submit">Create post</a>
        </span>
          <hr>
      </div>
      <div class="row">
        <template v-for="post in posts">
          <div style="margin-top: 5px; margin-bottom: 5px;" class="card">
            <div class="card-body">
              <h3 class="card-title">{{ post.title }}</h3>
              <p class="card-text">{{ post.content }}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </template>
      </div>
    </main>
  </div>

</template>

<script>
  import axios from "axios";

  export default {
      name: "PostsIndex.vue",
      data() {
        return {
          loading: true,
          posts:[
              { "id": 1, "user_id": 2, "title": "Dolor sed", "content": "TProin sed suscipit sapien, in blandit tortor. Nulla at interdum metus. Curabitur tempor, lacus eu aliquet scelerisque, ligula mauris varius ligula, sit amet ornare erat ipsum a nibh.", "created_at": "2021-10-15T14:42:03.000000Z", "updated_at": "2021-10-15T14:42:03.000000Z" },
              { "id": 1, "user_id": 2, "title": "Sed med", "content": "Phasellus semper velit et nisi lobortis, at auctor massa euismod. Cras eget cursus tortor. Morbi sed condimentum tellus, vitae vestibulum mauris. Integer ut aliquet quam.", "created_at": "2021-10-15T14:42:03.000000Z", "updated_at": "2021-10-15T14:42:03.000000Z" },
              { "id": 1, "user_id": 2, "title": "Med sed", "content": "Praesent posuere elementum mattis. Curabitur id massa in tellus ornare pulvinar.", "created_at": "2021-10-15T14:42:03.000000Z", "updated_at": "2021-10-15T14:42:03.000000Z" },
          ]
        }
      },
    mounted () {
      axios
          .get('/api/get-posts')
          .then(response => (
              this.posts = response.data
          )).finally(() => this.loading = false)
    }
  }
</script>

<style scoped>

</style>