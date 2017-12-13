<template>
    <application-layout>
        <h1 slot="header">Nuevo Egreso</h1>
        <div class="row">
            <div class="col-md-12">
                <back-button></back-button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-danger" v-if="errors">
                    <ul>
                        <li v-for="(value, key) in errors">
                            {{ key }}
                            <ul>
                                <li v-for="message in value" v-text="message"></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <form class="form-horizontal" @submit.prevent="submit">
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                            <select class="form-control" v-model="expense.type">
                                <option value="" selected="selected">Seleccione --</option>
                                <option value="cash-cuts">Cortes de caja</option>
                                <option value="expenses">Gastos</option>
                                <option value="payments">Pagos</option>
                                <option value="other">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Detalle</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" v-model="expense.description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Monto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="expense.total" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button class="btn btn-success">Agregar Egreso <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </application-layout>
</template>

<script>
    export default {
        data() {
            return {
                expense: {},
                errors: null
            }
        },
        
        methods: {
            submit() {
                axios.post('/expenses', this.expense)
                .then(response => {
                    this.Alert.success('Se ha guardado el movimiento')
                    .then(() => {
                        this.expense = {};
                        this.router.push({name: 'expenses.index'});
                    });
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.Alert.error();
                })
            }
        }
    }
</script>