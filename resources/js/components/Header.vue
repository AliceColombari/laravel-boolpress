<template>
  <!-- <div>Io sono l'header</div> -->

  <nav class="navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand" href="#">Bollpress</a>
   

   
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <!-- <a class="nav-link" href="/">Home</a> -->
                <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" href="/chi-siamo">Chi siamo</a> -->
                 <router-link class="nav-link" :to="{name: 'about'}">Chi siamo</router-link>
            </li>
        
            <li class="nav-item">
                <!-- <a class="nav-link" href="/contatti">Contatti</a> -->
                 <router-link class="nav-link" :to="{name: 'contact'}">Contatti</router-link>
            </li>

            <li class="nav-item">
                <!-- <a class="nav-link" href="/contatti">Contatti</a> -->
                 <router-link class="nav-link" :to="{name: 'posts'}">Posts</router-link>
            </li>
        </ul>

        <ul class="ms-auto navbar-nav">
            <li class="nav-item">
                <!-- <a class="nav-link" href="/contatti">Contatti</a> -->
                 <a class="nav-link" href="/admin">Accesso Admin</a>
            </li>
        </ul>
        
   
    </nav>

</template>

<script>
export default {
    name: 'Header'
}
</script>

<style>
    .router-link-exact-active {
        text-transform: uppercase;
    }
</style>