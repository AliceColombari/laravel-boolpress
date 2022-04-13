<template>
  <nav class="navbar navbar-expand navbar-dark bg-dark ms_navbar">
    <a class="navbar-brand" href="#">Boolpress</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-for="menuItem in menuItems" :key="menuItem.routeName">
                <!-- rendo dinamico header richiamando i nomi delle mie rotte del menu -->
                <router-link class="nav-link" :to="{name: menuItem.routeName}">{{menuItem.label}}</router-link>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="/admin">Accesso Admin</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: 'Header',
    data() {
        return {
            // rendiamo dinamico l'header e i suoi link
            menuItems: [
                {
                    routeName: 'home',
                    label: 'Home'
                },
                {
                    routeName: 'about',
                    label: 'Chi Siamo'
                },
                {
                    routeName: 'contact',
                    label: 'Contatti'
                },
                {
                    routeName: 'blog',
                    label: 'Blog'
                },
            ]
        }
    }
}
</script>

<style>
    nav {
        color: #32373c;
    }

    .ms_navbar {
        padding: 20px;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: #fff;
    }
    
    ul.navbar-nav.ms-auto {
        background-color: #3e58e1;
        color: #fff;
    }

    /* al click il testo del link del menu si trasforma */
    .router-link-exact-active {
        font-weight: bold;
    }
</style>