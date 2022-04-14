<template>
  <!-- <div>{{$$route.params.slug}}</div> -->

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
          <div v-if="post">

            <!-- se post definito mi metti -->
            <h1>{{post.title}}</h1>

            <img class="img-fluid mt-3 mb-3" :src="post.cover" :alt="post.title">

            <h3 v-if="post.category">Categoria: {{post.category.name}}</h3>

            <p>{{post.content}}</p>

            
              <span class="badge ms_color" v-for="tag in post.tags" :key="tag.id">
                {{tag.name}}
              </span>
           
            
          </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
    name: 'SinglePost',
    // al metodo di creazione dell'elemento vado a fare chiamata axios che richiama funzione creata 
    // vorrei che quando apro questo componente, sia fatta richiesta axios - api di laravel
    // che mi ritorni tutte le info in merito ad un post specifico, identificato dal suo slug

    data() {
      return {
        post: null
      }
    },

    // select * from posts where slug = :slug
    mounted() {

      const slug = this.$route.params.slug;

      axios.get('/api/posts/' + slug).then(response => {

        // vedo ciò che il server mi risponde 
        // console.log(response);

        // condizioni relative alla ricerca del mio post attraverso uri
        if (response.data.success == false) {
          this.$router.push({name: 'not-found'})
        } else {
          this.post = response.data.result
        }

      });
    }
}
</script>

<style>
  ul {
    list-style: none;
  }

  .ms_color {
    background-color: #0073aa;
    margin-right: 10px;
    color: #fff;
  }
</style>