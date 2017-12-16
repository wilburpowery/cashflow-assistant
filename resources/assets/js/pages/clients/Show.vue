<template>
    <application-layout>
        <h1 slot="header">Cliente: {{ client.first_name }} {{ client.last_name }}</h1>
        <back-button></back-button>
        <hr>
        <form @submit.prevent="update">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="last_name">Nombre:</label>
                        <input type="text" class="form-control" v-model="client.name" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" class="form-control" v-model="client.email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Numero Telefonico:</label>
                        <input type="text" class="form-control" v-model="client.phone_number" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Actualizar</button>
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
                axios.patch(`/clients/${this.client.id}`, this.client)
                    .then(response => {
                        this.Alert.success('Client Actualizado!');
                    }).catch(error => {
                        this.Alert.error();
                    })
            }
        }
    }
</script>