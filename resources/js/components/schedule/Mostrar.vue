<template>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Director</th>
                        </tr>
                    </thead>
                    <tbody v-for="movie_schedule in sortedMovieSchedules" :key="movie_schedule.id">
                        <tr v-for="schedule in movie_schedule.schedules" :key="schedule.id">
                            <td>{{ schedule.id }}</td>
                            <td>{{ movie_schedule.name }}</td>
                            <td>{{ schedule.time }}</td>
                            <td>{{ schedule ? 'Activo' : 'Inactivo' }}</td>

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
            try {
                const response = await this.axios.get(`/api/movie/get-all-schedules/`);
                this.movie_schedules = response.data.movie_schedules;
            } catch (error) {
                console.error('Error fetching movie schedules:', error);
                this.movie_schedules = [];
            }
        },
        async borrarSchedule(id) {
            if (confirm("¿Confirma eliminar el registro?")) {
                try {
                    await this.axios.delete(`/api/schedule/delete/${id}`);
                    await this.mostrarMovies(); // Recargar la data después de eliminar
                } catch (error) {
                    console.error('Error deleting schedule:', error);
                }
            }
        }
    }
};
</script>
