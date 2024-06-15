<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Movie</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="movie.name" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea2" v-model="movie.description" style="height: 100px" required></textarea>
                                    <label for="floatingTextarea2">Descripción</label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Director</label>
                                    <input type="text" class="form-control" v-model="movie.director" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Fecha de Publicación</label>
                                    <input type="date" class="form-control" v-model="movie.publication_date" required>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" class="form-control" @change="onFileChange" required>

                                    <img :src="imagePreview" v-if="imagePreview" class="img-thumbnail mt-2"  style="max-width: 200px; max-height: 200px;" alt="Vista previa de la imagen">
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
    name: "CrearMovie",
    data() {
        return {
            movie: {
                name: "",
                description: "",
                director: "",
                publication_date: "",
                state: false, // Inicializar state según tus necesidades
                image: null // Para almacenar el archivo de imagen seleccionado
            },
            imagePreview: null // Para almacenar la URL de la imagen seleccionada
        };
    },
    methods: {
        async crear() {
            // Crear FormData
            let formData = new FormData();
            formData.append("name", this.movie.name);
            formData.append("description", this.movie.description);
            formData.append("director", this.movie.director);
            formData.append("publication_date", this.movie.publication_date);
            formData.append("state", this.movie.state ? "1" : "0"); // Convertir a 1 o 0
            if (this.movie.image) {
                formData.append("image", this.movie.image);
            }

            // Enviar los datos usando Axios
            try {
                const response = await axios.post('/api/movie/create', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                console.log(response.data); // Verificar la respuesta del servidor
                this.$router.push({ name: "mostrarMovies" });
            } catch (error) {
                console.error("Error al guardar la película:", error.response.data); // Mostrar más detalles del error
            }
        },
        onFileChange(event) {
            // Capturar el archivo seleccionado
            const file = event.target.files[0];
            this.movie.image = file;

            // Crear una URL para la vista previa de la imagen
            this.imagePreview = URL.createObjectURL(file);
        }
    },
    beforeDestroy() {
        // Liberar la URL de la vista previa de la imagen cuando el componente se destruya
        if (this.imagePreview) {
            URL.revokeObjectURL(this.imagePreview);
        }
    }
};
</script>

