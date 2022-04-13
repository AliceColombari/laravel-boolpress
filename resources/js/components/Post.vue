<template>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ title }}</h2>
            <h4 class="card-text">{{ category?category.name:'&nbsp;'}}</h4>
            <!-- tronco il testo del contenuto del mio post ad un tot di parole -->
            <p class="card-text">{{ truncateText(content) }}</p>
            <router-link class="btn ms_btn-primary" :to="{name: 'single-post', params: {slug: slug}}">Vedi articolo completo</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Post',
    // tramite props richiamo elementi che voglio visuaizzare quando vado al click su 'vedi articolo completo'
    props: ['title', 'content', 'slug', 'category', 'tags'],

    data() {
        return {
            strTruncateLen: 50
        }
    },

    methods: {
        // funzione per troncare il contenuto testuale del mio post
        truncateText(text) {

            if (text.length > this.strTruncateLen) {
                return text.substring(0, this.strTruncateLen) + '...';
            } else {
                return text;
            }

        }
    }
}
</script>

<style>
    .ms_btn-primary {
        background-color: #0073aa;
        color: #fff;
    }
</style>