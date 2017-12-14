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
        <div class="row" v-for="payment in payments">
            <div class="col-md-3"> {{ payment.client.first_name}} {{ payment.client.last_name }}</div>
            <div class="col-md-3">{{ formatDate(payment.created_at)</div>
                <div class="col-md-3" v-text="payment.description"></div>
                <div class="col-md-3">
                    {{ payment.total | toMoney}}
                </div>
            </div>
        </application-layout>
    </template>
    
    <script>
        export default {
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
        }
    </script>