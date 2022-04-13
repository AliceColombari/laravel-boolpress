<template>
  <main>

    <h1 class="container-title text-center">Elenco dei post</h1>

    <div class="container mt-5">
      

      <div class="row">
        <div class="col-6" v-for="post in posts" :key="post.id">

          <!-- ciclo i post e li collego tramite l'utilizzo di props -  elementi che voglio visualizzare -->
            <Post
                :title='post.title'
                :content='post.content'
                :slug='post.slug'
                :category='post.category'
                :tags='post.tags'
            />

        </div>
      </div>

      <!-- btn per visualizzare post precedente e successivo -->
      <nav aria-label="Page navigation example">
        <ul class="pagination mt-3">
            <li class="page-item" :class="(currentPage == 1)?'disabled':''" ><span class="page-link" @click="getPosts(currentPage - 1)">Precedente</span></li>
            <li class="page-item" :class="(currentPage == lastPage)?'disabled':''"><span class="page-link" @click="getPosts(currentPage + 1)">Successivo</span></li>
        </ul>
    </nav>

    </div>
  </main>
</template>

<script>

import Post from '../components/Post';

export default {
  name: "Main",
  components: {
      Post
  },
  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: null
    };
  },

  methods: {
    getPosts(apiPage) {
      axios.get("/api/posts", { //localhost:8000/api/posts?page=numeroPagina
          'params': {
              'page': apiPage
          }
      })
      .then((response) => {
        this.currentPage = response.data.results.current_page;
        this.posts = response.data.results.data;
        this.lastPage = response.data.results.last_page;
      });

    },
  },

  created() {
      this.getPosts(1);
  },

};
</script>

<style>

  .container-title {
    background-color: #0073aa;
    color: #fff;
    padding: 30px;
  }

</style>