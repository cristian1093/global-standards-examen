<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Schedule</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Turno</label>
                                    <input type="time" class="form-control" v-model="schedule.time" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="schedule.state" id="stateCheck">
                                        <label class="form-check-label" for="stateCheck">
                                            Activo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "CrearSchedule",
    data() {
        return {
            schedule: {
                time: "",
                state: false
            }
        };
    },
    methods: {
        async crear() {
            // Crear FormData
            const scheduleId = this.$route.params.id;
            let formData = new FormData();
            formData.append("time", this.schedule.time);
            formData.append("state", this.schedule.state ? "1" : "0"); // Convertir a 1 o 0
            formData.append("movie_id", scheduleId);

            // Enviar los datos usando Axios
            try {
                const response = await axios.post('/api/schedule/create-schedule', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                console.log(response.data); // Verificar la respuesta del servidor
                window.history.back();


            } catch (error) {
                console.error("Error al guardar el horario:", error.response.data); // Mostrar más detalles del error
            }
        }
    }
};
</script>

<style scoped>
/* Add any necessary custom styles here */
</style>
