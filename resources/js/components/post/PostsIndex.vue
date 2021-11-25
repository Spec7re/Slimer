<template>

  <div class="container">
    <main role="main">
      <div class="text-center mb-lg-2">
        <h1 class="cover-heading">Posts</h1>
        <a @click="redirect" class="btn btn-primary pl-5 pr-5 mt-2 col-12" type="submit">Create post</a>
        <hr>
      </div>
      <div class="row">
        <div class="text-center" v-if="loading">
          <h1>LOADING POSTS</h1>
        </div>
        <!-- Posts -->
        <template v-for="post in posts">
          <div style="margin-top: 5px; margin-bottom: 5px;" class="card">
            <div class="card-body">
              <h3 class="card-title">{{ post.title }}</h3>
              <p class="card-text">{{ post.body }}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </template>
        <!-- Pagination -->
        <div class="text-center" v-if="allPages">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" @click="previousPage">Previous</a></li>
              <li class="page-item" v-for="page in allPages">
                <a class="page-link" @click="changePage(page)" >{{ page }}</a>
                <router-link :to="{ query: { page: page }}" class="page-link">{{ page }}</router-link>
              </li>
              <li class="page-item"><a class="page-link" @click="nextPage">Next</a></li>
            </ul>
          </nav>
        </div>

<!--        <div class="card text-center m-3">-->
<!--          <h3 class="card-header">Vue.js + Node - Server Side Pagination Example</h3>-->
<!--          <div class="card-body">-->
<!--            <div v-for="item in pageOfItems" :key="item.id">{{item.name}}</div>-->
<!--          </div>-->
<!--          <div class="card-footer pb-0 pt-3">-->
<!--            <ul v-if="pager.pages && pager.pages.length" class="pagination">-->
<!--              <li :class="{'disabled':pager.currentPage === 1}" class="page-item first-item">-->
<!--                <router-link :to="{ query: { page: 1 }}" class="page-link">First</router-link>-->
<!--              </li>-->
<!--              <li :class="{'disabled':pager.currentPage === 1}" class="page-item previous-item">-->
<!--                <router-link :to="{ query: { page: pager.currentPage - 1 }}" class="page-link">Previous</router-link>-->
<!--              </li>-->
<!--              <li v-for="page in pager.pages" :key="page" :class="{'active':pager.currentPage === page}" class="page-item number-item">-->
<!--                <router-link :to="{ query: { page: page }}" class="page-link">{{page}}</router-link>-->
<!--              </li>-->
<!--              <li :class="{'disabled':pager.currentPage === pager.totalPages}" class="page-item next-item">-->
<!--                <router-link :to="{ query: { page: pager.currentPage + 1 }}" class="page-link">Next</router-link>-->
<!--              </li>-->
<!--              <li :class="{'disabled':pager.currentPage === pager.totalPages}" class="page-item last-item">-->
<!--                <router-link :to="{ query: { page: pager.totalPages }}" class="page-link">Last</router-link>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->

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
          allPages: 0,
          currentPage: 1,
          posts:[
              {
                id: 1,
                user_id: 2,
                title: "Dolor sed",
                body: "TProin sed suscipit sapien, in blandit tortor. Nulla at interdum metus. Curabitur tempor, lacus eu aliquet scelerisque, ligula mauris varius ligula, sit amet ornare erat ipsum a nibh.", "created_at": "2021-10-15T14:42:03.000000Z", "updated_at": "2021-10-15T14:42:03.000000Z" },
              {
                id: 1,
                user_id: 2,
                title: "Sed med",
                body: "Phasellus semper velit et nisi lobortis, at auctor massa euismod. Cras eget cursus tortor. Morbi sed condimentum tellus, vitae vestibulum mauris. Integer ut aliquet quam.", "created_at": "2021-10-15T14:42:03.000000Z", "updated_at": "2021-10-15T14:42:03.000000Z" },
              {
                id: 1,
                user_id: 2,
                title: "Med sed",
                body: "Praesent posuere elementum mattis. Curabitur id massa in tellus ornare pulvinar.", "created_at": "2021-10-15T14:42:03.000000Z", "updated_at": "2021-10-15T14:42:03.000000Z"
              },
          ]
        }
      },
    methods:{
      redirect() {
        this.$router.push('/post-form');
      },
      changePage(page) {
        this.currentPage = page;
        let token = this.$store.state.token;

        const headers = {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + token
        }

        axios({
          url: "/api/get-posts?page=" + page,
          method: 'GET',
          headers: headers,
        }).then(response => (
            console.log(response),
        this.posts = response.data.data
        )).finally(() => this.loading = false)


        console.log('PAGE',this.currentPage);
      },
      previousPage() {
        this.currentPage = this.currentPage > 1  ?  this.currentPage - 1 : this.currentPage;
        console.log(this.currentPage)
      },
      nextPage() {
        this.currentPage = this.currentPage < this.allPages ?  this.currentPage + 1 : this.currentPage;
        console.log(this.currentPage);
      }
    },
    created() {
      let token = this.$store.state.token;

      const headers = {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
      }

      axios({
        url: "/api/get-posts?page="+this.currentPage,
        method: 'GET',
        headers: headers,
      }).then( response => (
          this.allPages = response.data.last_page,
          this.currentPage = response.data.current_page,
          this.posts = response.data.data
        )).finally(() => this.loading = false)
    },

    watch: {
      '$route.query.page': {
        immediate: true,
        handler(page) {
          page = parseInt(page) || 1;
          if (page !== this.currentPage) {
            axios({
              url: '/api/get-posts?page='+page,
              method: 'GET',
            }).then( response => (
                console.log(response)
                // this.posts = response.data.data
            )).finally(() => this.loading = false)
          }
        }
      }
    }

  }
</script>

<style scoped>

</style>