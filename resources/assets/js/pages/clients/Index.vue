<template>
    <application-layout>
        <h1 slot="header">Mis Clientes</h1>

        <div class="row">
            <div class="col-md-12">
                <router-link class="btn btn-primary pull-right" id="new-client" :to="{ name: 'clients.create' }">Nuevo Cliente <i class="fa fa-plus ml-1"></i></router-link>
            </div>
        </div>
        <hr>
        <h4>Ultimos clientes</h4>
       <table class="table table-striped">
           <thead>
               <tr>
                   <td>Nombre</td>
                   <td>Email</td>
                   <td>Telefono</td>
                   <td>Acción</td>
               </tr>
           </thead>
           <tbody>
               <tr v-for="client in clients" :key="client.id">
                    <td> {{client.first_name}} {{ client.last_name}} </td>
                    <td> {{ client.email }} </td>
                    <td> {{ client.phone_number }} </td>
                    <td>
                        <button class="btn btn-primary btn-xs" @click="showClient(client)"><i class="fa fa-pencil"></i></button>
                    </td>
               </tr>
           </tbody>
       </table>

    </application-layout>
</template>

<script>
    export default {
        created() {
            this.fetchClients();
        },
        data() {
            return {
                clients: []
            }
        },
        methods: {
            fetchClients() {
                axios.get('/clients')
                    .then(response => {
                        console.log(response);
                        this.clients = response.data;
                    }).catch(error => {
                        console.error(error);
                    })
            },
            showClient(client) {
                this.router.push({ name: 'clients.show', params: {id: client.id}});
            }
        }
    }
</script>

<style>
    .ml-1 {
        margin-left: 5px;
    }
    #new-client {
        font-size: .9em;
    }
</style>
