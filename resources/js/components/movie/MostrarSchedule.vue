<template>
    <div class="row">
        <div class="col-12 mb-2">
            <router-link :to="{ name: 'crearSchedule', params: { id: movieId } }" class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear</router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Time</th>
                            <th>State</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody v-for="movie_schedule in sortedMovieSchedules" :key="movie_schedule.id">
                        <tr v-for="schedule in movie_schedule.schedules" :key="schedule.id">
                            <td>{{ schedule.id }}</td>
                            <td>{{ schedule.time }}</td>
                            <td>{{ schedule.state ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                                <router-link :to="{ name: 'editarSchedule', params: { id: schedule.id } }" class="btn btn-info"><i class="fas fa-edit"></i> Editar</router-link>
                                <button type="button" @click="borrarSchedule(schedule.id)" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
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
    name: "MovieSchedules",
    data() {
        return {
            movie_schedules: []
        };
    },
    computed: {
        sortedMovieSchedules() {
            return this.movie_schedules.sort((a, b) => a.id - b.id);
        },
        movieId() {
            return this.$route.params.id;
        }

    },
    async mounted() {
        await this.mostrarMovies();
    },
    methods: {
        async mostrarMovies() {
            const movieId = this.$route.params.id;
            try {
                const response = await this.axios.get(`/api/movie/get-schedules/${movieId}`);
                this.movie_schedules = [response.data.movie_schedules];
            } catch (error) {
                console.error('Error fetching movie schedules:', error);
                this.movie_schedules = [];
            }
        },
        async borrarSchedule(id) {
            if (confirm("¿Confirma eliminar el registro?")) {
                try {
                    await this.axios.delete(`/api/schedule/delete/${id}`);
                    await this.mostrarSchedules(); // Actualizar lista después de eliminar
                } catch (error) {
                    console.error('Error deleting schedule:', error);
                }
            }
        }
    }
};
</script>
