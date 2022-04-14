<template>
  <main>

    <h1 class="container-title text-center">Elenco dei post</h1>

    <div class="container mt-5">
      

      <div class="row">
        <div class="col-6" v-for="post in posts" :key="post.id">

          <!-- ciclo i post e li collego tramite l'utilizzo di props -  elementi che voglio visualizzare -->
          <!-- infine aggiungo collegamento props per image upload -->
            <Post
                :title='post.title'
                :content='post.content'
                :slug='post.slug'
                :category='post.category'
                :tags='post.tags'
                
                :img='post.cover'
            />

        </div>
      </div>

      <!-- btn per visualizzare post precedente e successivo -->
      <nav>
        <ul class="pagination mt-5 justify-content-center">
            <li class="page-item" :class="(currentPage == 1)?'disabled':''" ><span class="page-link" @click="getPosts(currentPage - 1)">Precedente</span></li>

            <!-- visualizzo numero di pagina -->
            <li class="page-item" @click="selectPage(page)" :class="(page == currentPage) ? 'active' : ''" v-for="page in lastPage" :key="page">
              <span class="page-link">{{page}}</span>
            </li>

            <li class="page-item" :class="(currentPage == lastPage)?'disabled':''"><span class="page-link" @click="getPosts(currentPage + 1)">Successivo</span></li>
        </ul>
    </nav>

    </div>
  </main>
</template>

<script>

import Post from '../components/Post';

export default {
  name: "Posts",
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

  // funzione per visualizzare e rendere click numeri pagina
    selectPage(selectPage){
      this.currentPage = selectPage;
      this.getPosts(this.currentPage);
    }

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

  .page-link {
    color: #0073aa;
  }

  .page-item.active .page-link {
    background-color: #0073aa;
    border-color: #dee2e6;
    font-weight: bold;
  }

</style>