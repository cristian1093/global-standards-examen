<template>
    <div class="row">
        <div class="col-12 mb-2">
            <router-link :to="{ name: 'crearMovie' }" class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear</router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Director</th>
                            <th>Fecha de Publicación</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="movie in sortedMovies" :key="movie.id">
                            <td>{{ movie.id }}</td>
                            <td>{{ movie.name }}</td>
                            <td>{{ movie.description }}</td>
                            <td>{{ movie.director }}</td>
                            <td>{{ movie.publication_date }}</td>
                            <td>{{ movie.state ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                                <img :src="movie.image" alt="Imagen de la película" style="width: 100px; height: auto;">
                            </td>
                            <td>
                                <router-link :to="{ name: 'editarMovie', params: { id: movie.id } }" class="btn btn-info"><i class="fas fa-edit"></i> Editar</router-link>
                                <router-link :to="{ name: 'editarMovieSchedule', params: { id: movie.id } }" class="btn btn-warning"><i class="fas fa-align-justify"></i> </router-link>
                                <button type="button" @click="borrarMovie(movie.id)" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Movies",
    data() {
        return {
            movies: []
        };
    },
    computed: {
        sortedMovies() {
            // Ordenar películas por ID ascendente
            return this.movies.sort((a, b) => a.id - b.id);
        }
    },
    async mounted() {
        await this.mostrarMovies();
    },
    methods: {
        async mostrarMovies() {
            try {
                const response = await this.axios.get('/api/movie/');
                this.movies = response.data;
            } catch (error) {
                console.error('Error fetching movies:', error);
                this.movies = [];
            }
        },
        async borrarMovie(id) {
            if (confirm("¿Confirma eliminar el registro?")) {
                try {
                    await this.axios.delete(`/api/movie/delete/${id}`);
                    await this.mostrarMovies(); // Actualizar lista después de eliminar
                } catch (error) {
                    console.error('Error deleting movie:', error);
                }
            }
        }
    }
};
</script>

