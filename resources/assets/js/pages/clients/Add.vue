<template>
    <application-layout>
        <h1 slot="header">Nuevo Cliente</h1>
        <back-button></back-button>
        <hr>
        <form @submit.prevent="submit">
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
                <button class="btn btn-success">Agregar</button>
            </div>
        </form>
    </application-layout>
</template>

<script>
    export default {
        mounted() {
            document.title = 'Nuevo Cliente';
        },
        data() {
            return {
                client: {}
            }
        },
        methods: {
            submit() {
                axios.post('/clients', this.client).then(response => {
                    this.Alert.success('Cliente guardado!').then(() => {
                        this.$router.push({name: 'clients.index'});
                    });
                }).catch(error => error);
            }
        }
    }
</script>