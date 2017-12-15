<template>
    <application-layout v-if="payment">
        <h1 slot="header">Cuenta Por Cobrar: {{ payment.id }}</h1>
        
        <form @submit.prevent="update">
            <div class="form-group">
                <label>Cliente:</label>
                <input type="text" class="form-control" v-model="payment.client.name" disabled>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fecha:</label>
                    <date-picker class="form-control" v-model="payment.date" :config="datePickerConfig"></date-picker>
                </div>
            </div>
            <div class="col-md-6">
                <label>Total:</label>
                <input type="text" class="form-control" v-model="payment.total" required>
            </div>
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea rows="3" class="form-control" v-model="payment.description" required></textarea>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group pull-right">
                    <label class="mr-1">Estado?</label>
                    <v-toggle 
                    data-on="Pagado" 
                    data-off="Pendiente" 
                    data-on-style="success" 
                    data-off-style="danger"
                    :data-checked="payment.payed"
                    @changed="togglePayed"
                    >
                </v-toggle>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <button class="btn btn-primary">Agregar Cuenta <i class="fa fa-plus"></i></button>
    </div>
</form>
</application-layout>
</template>

<script>
    export default {
        created() {
            if(! this.payment) {
                this.$router.push({name: 'payments.index'});
            }
        },
        data() {
            return {
                payment: this.$route.params.payment,
                datePickerConfig: {
                    format: 'DD-MM-YYYY',
                    minDate: moment.now()
                }
            }
        },

        methods: {
            fetchPayment() {
                axios.get(`/payments/${this.$route.params.id}`)
                    .then(response => {
                        this.payment = response.data;
                    }).catch(error => {
                        this.$router.push({name: 'payments.index'});
                    })
            },
            togglePayed(value) {
                this.payment.payed = value;
            },

            update() {
                axios.patch(`/payments/${this.payment.id}`, {
                    date: this.payment.date,
                    total: this.payment.total,
                    description: this.payment.description,
                    payed: this.payment.payed
                }).then(response => {
                    this.Alert.success('Se ha actualizado la cuenta por cobrar!')
                        .then(() => {
                            this.$router.push({name: 'payments.index'});
                        })
                }).catch(error => {
                    this.Alert.error();
                })
            }
        }
    }
</script>