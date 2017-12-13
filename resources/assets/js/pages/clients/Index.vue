<template>
    <application-layout>
        <h1 slot="header">Clientes</h1>
        
        <div class="row">
            <div class="col-md-12">
                <router-link class="btn btn-primary pull-right" id="new-client" :to="{ name: 'clients.create' }">Nuevo Cliente <i class="fa fa-plus ml-1"></i></router-link>
            </div>
        </div>
        <hr>
        <h4>Ultimos clientes</h4>
        <div class="row" id="headings">
            <div class="col-xs-1 text-center justify-content-center">ID</div>
            <div class="col-xs-2">Nombre</div>
            <div class="col-xs-2">Apellido</div>
            <div class="col-xs-3">Correo Electronico</div>
            <div class="col-xs-2">Telefono</div>            
            <div class="col-xs-2 text-center">Acción</div>
        </div>
        
        <div class="row" v-for="client in clients" :key="client.id">
            <div class="col-md-12">
                <div class="row list-item">
                    <div class="col-xs-1 text-center justify-content-center" v-text="client.id"></div>
                    <div class="col-xs-2" v-text="client.first_name"></div>
                    <div class="col-xs-2" v-text="client.last_name"></div>
                    <div class="col-xs-3" v-text="client.email"></div>
                    <div class="col-xs-2" v-text="client.phone_number"></div>
                    <div class="col-md-2 actions text-center">
                        <i class="fa fa-pencil text-primary icon" @click="show(client)"></i>
                        <i class="fa fa-trash text-danger icon icon-danger" @click="destroy(client)"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <paginator :data-set="dataSet" @changed="fetch"></paginator>
        
    </application-layout>
</template>

<script>
    export default {
        created() {
            this.fetch();
        },
        data() {
            return {
                dataSet: false,
                clients: []
            }
        },
        methods: {
            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },
            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);
                    page = query ? query[1] : 1;
                }
                return `/clients?page=${page}`;
            },
            refresh({data}) {
                this.dataSet = data;
                this.clients = data.data;
                window.scrollTo(0,0);
            },
            show(client) {
                this.router.push({ name: 'clients.show', params: {id: client.id}});
            },
            
            destroy(client) {
                this.Alert.warning('Estas seguro de borrar el client?')
                .then(message => {
                    axios.delete(`/clients/${client.id}`)
                    .then(response => {
                        this.Alert.success('Cliente borrado');
                        this.clients.splice(this.clients.indexOf(client), 1);
                    }).catch(error => {
                        this.Alert.error();
                    })
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/variables";    
    .ml-1 {
        margin-left: 5px;
    }
    #new-client {
        font-size: .9em;
    }
    
    .justify-content-center {
        justify-content: center;
    }
    #headings div {
        background-color: $brand-success;
        color: #fff;
        min-height: 50px;
        display: flex;
        align-items: center;
    }
    
    .list-item:hover {
        background-color: #f7f6f6;
    }
    .list-item {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #e3e3e3;
        min-height: 50px;
        
        &:hover {
            cursor: pointer;
        }
        
        &:hover .actions {
            opacity: 1;
        }
        
        .actions {
            opacity: 0;
            padding: 5px 30px;
        }
    }
    
    .icon {
        font-size: 1.4em;
        margin-right: 5px;
        background-color: $brand-primary;
        padding: 7px;
        color: #fff;
        border-radius: 100%;
        font-size: 14px;
        
        &:hover {
            cursor: pointer;
        }
    }
    
    .icon-danger {
        background-color: $brand-danger;
    }
</style>
