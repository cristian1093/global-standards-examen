<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Schedule</h4></div>
                <div class="card-body">
                    <form @submit.prevent="editar">
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
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
    name: "EditarSchedule",
    data() {
        return {
            schedule: {
                id: null,
                time: "",
                state: false
            },
        };
    },
    created() {
        const scheduleId = this.$route.params.id;
        axios.get(`/api/schedule/show/${scheduleId}`)
            .then(response => {
                const scheduleData = response.data;
                this.schedule.id = scheduleData.id;
                this.schedule.time = scheduleData.time;
                this.schedule.state = scheduleData.state;
            })
            .catch(error => {
                console.error('Error al obtener los datos del schedule:', error);
            });
    },
    methods: {
        async editar() {
            let formData = new FormData();
            formData.append("time", this.schedule.time);
            formData.append("state", this.schedule.state ? "1" : "0");

            try {
                const response = await axios.post(`/api/schedule/update/${this.schedule.id}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT'
                    }
                });
                console.log(response.data);
                window.history.back();
            } catch (error) {
                console.error("Error al guardar los cambios:", error.response.data);
            }
        },
    },
};
</script>

<style scoped>
/* Add any necessary custom styles here */
</style>
