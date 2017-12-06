<template>
    <application-layout>
        <h1 slot="header">Cliente: {{ client.first_name }} {{ client.last_name }}</h1>
        <back-button></back-button>
        <hr>
        <form @submit.prevent="update">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Nombre:</label>
                        <input type="text" class="form-control" v-model="client.first_name" required :disabled="! editing">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Apellido:</label>
                        <input type="text" class="form-control" v-model="client.last_name" required :disabled="! editing">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" class="form-control" v-model="client.email" required :disabled="! editing">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Numero Telefonico:</label>
                        <input type="text" class="form-control" v-model="client.phone_number" required :disabled="! editing">
                    </div>
                </div>
            </div>
            <div v-if="editing">
                <button class="btn btn-success">Actualizar</button>
                <button class="btn btn-link" @click="editing = false">Cancelar</button>
            </div>
            <div class="form-group" v-else>
                <button class="btn btn-warning" @click="editing = true">Editar</button>
            </div>
        </form>
    </application-layout>
</template>

<script>
    export default {
        props: ['id'],
        created() {
            this.fetchClient();
        },
        data () {
            return {
                client: [],
                editing: false
            }
        },
        methods: {
            fetchClient() {
                axios.get(`/clients/${this.id}`)
                    .then(response => {
                        this.client = response.data;
                    })
                    .catch(error => console.log(error));
            },
            update() {

            }
        }
    }
</script>