<template>
    <application-layout>
        <h1 slot="header">Cuentas Por Cobrar</h1>
        
        <div class="row">
            <div class="col-md-12">
                <router-link class="btn btn-primary pull-right" :to="{name: 'payments.create'}">Nueva Cuenta por cobrar <i class="fa fa-plus"></i></router-link>
            </div>
        </div>
        
        <hr>
        
        <div class="row" id="headings">
            <div class="col-md-3">Client</div>
            <div class="col-md-2">Fecha</div>
            <div class="col-md-3">Detalle</div>
            <div class="col-md-2">Monto</div>
            <div class="col-md-2">Acción</div>
        </div>
        <template v-if="payments.length">
            <div class="row list-item" v-for="payment in payments">
                <div class="col-md-3"> {{ payment.client.name}}</div>
                <div class="col-md-2">{{ formatDate(payment.created_at) }}</div>
                <div class="col-md-3" v-text="payment.description"></div>
                <div class="col-md-2">
                    {{ payment.total | toMoney}}
                </div>
                <div class="col-md-2 actions">
                    <i class="fa fa-pencil text-primary icon" @click="show(payment)"></i>
                    <i class="fa fa-trash text-danger icon icon-danger" @click="destroy(payment)"></i>
                </div>
            </div>
        </template>
        <p class="text-center" v-else>No hay cuentas registradas hoy.</p>   
    </application-layout>
</template>

<script>
    export default {
        created() {
            this.fetch();
        },
        data() {
            return {
                payments: []
            }
        },
        filters: {
            toMoney(value) {
                return window.accounting.formatMoney(value, {symbol: 'CRC', format: '%v %s'}, 2);
            },
            formatFromTime(time) {
                return window.moment(time).fromNow();
            }
        },
        
        methods: {
            fetch() {
                axios.get('/payments').then(response => {
                    this.payments = response.data;
                }).catch(error => console.log(error));
            },
            formatDate(date) {
                return moment(date).format('DD-MM-YYYY');
            },
            show(payment) {
                this.$router.push({name: 'payments.show', params: {id: payment.id, payment: payment}});
            },
            destroy(income) {
                this.Alert.warning('Estas seguro de borrar la Cuenta Por Cobrar?').then(message => {
                    axios.delete(`/payments/${income.id}`)
                    .then(response => {
                        this.Alert.success('Cuenta por Cobrar Borrada!');
                        this.payments.splice(this.payments.indexOf(income), 1);
                    }).catch(error => {
                        this.Alert.error();
                    });
                })
            }
        }
    }
</script>