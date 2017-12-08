<template>
    <application-layout>
        <h1 slot="header">Nuevo Ingreso</h1>
        <div class="row">
            <div class="col-md-12">
                <back-button></back-button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" @submit.prevent="submit">
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                            <select class="form-control" v-model="income.type">
                                <option value="" selected="selected">Seleccione --</option>
                                <option value="sales">Ventas</option>
                                <option value="commissions">Comisiones</option>
                                <option value="cash">Efectivo para cajas</option>
                                <option value="other">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Detalle</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" v-model="income.description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Monto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="income.total" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button class="btn btn-success">Agregar Ingreso <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </application-layout>
</template>

<script>
    import {Alert} from '../../utilities';
    export default {
        data() {
            return {
                income: {}
            }
        },
        
        methods: {
            submit() {
                axios.post('/incomes', this.income)
                .then(response => {
                    Alert.success('Se ha guardado el movimiento')
                    .then(() => {
                        this.income = {};
                        this.router.push({name: 'incomes.index'});
                    });
                })
            }
        }
    }
</script>