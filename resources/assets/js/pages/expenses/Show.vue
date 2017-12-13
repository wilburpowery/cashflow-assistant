<template>
    <application-layout v-if="expense">
        <back-button></back-button>
        <h1 slot="header">Egreso: {{ expense.id }}</h1>
        <form class="form-horizontal" @submit.prevent="update">
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
                    <button class="btn btn-success">Actualizar <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </form>
    </application-layout>
</template>

<script>
    export default {
        created() {
            if(! this.expense) {
                this.fetchExpense();
            }
        },
        
        data() {
            return {
                expense: this.$route.params.expense
            }
        },
        
        methods: {
            fetchExpense() {
                axios.get(`/expenses/${this.$route.params.id}`)
                    .then(response => {
                        this.expense = response.data;
                    }).catch(error => {
                        this.$router.push({name: 'expenses.index'});
                    })
            },
            update() {
                axios.patch(`/expenses/${this.expense.id}`, this.expense)
                .then(response => {
                    this.Alert.success('Se ha actualizado el egreso!');
                    this.$router.push({name: 'expenses.index'});
                });
            }
        }
    }
</script>