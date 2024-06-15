<template>
    <main>
        <!-- Navbar superior -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://masteringjs.io/assets/images/vue/vue.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentTop" aria-controls="navbarSupportedContentTop" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContentTop">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <button class="nav-link btn btn-outline-danger" @click="cerrarSesion">Cerrar Sesión</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar y contenido -->
        <div class="sidebar-container">
            <nav class="sidebar navbar-dark bg-dark">
                <div class="container-fluid">

                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/" class="nav-link" aria-current="page">Inicio</router-link>
                        </li>

                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/movies" class="nav-link">Movies</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/schedules" class="nav-link">Schedules</router-link>
                        </li>

                    </ul>
                </div>
            </nav>
            <div class="content-container">
                <div class="container mt-5">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    methods: {
        cerrarSesion() {
            // Lógica para cerrar sesión
            console.log("Cerrar sesión...");
            // Aquí podrías implementar la lógica para cerrar sesión, por ejemplo, redirigir al usuario a la página de inicio de sesión.
        }
    }
}
</script>

<style scoped>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.sidebar-container {
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 200px;
    background-color: #333; /* Color de fondo cambiado a gris oscuro */
    color: white;
    height: 100%;
    position: fixed;
}

.sidebar .navbar-brand {
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.sidebar .navbar-nav {
    padding-left: 0;
}

.sidebar .nav-link {
    color: white;
    padding: 10px 20px;
}

.sidebar .nav-link:hover {
    background-color: #555; /* Cambio en el color de fondo al pasar el ratón */
}

.content-container {
    margin-left: 200px; /* mismo ancho que el sidebar */
    flex-grow: 1;
    padding: 20px;
}
</style>
