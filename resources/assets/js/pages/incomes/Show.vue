<template>
    <application-layout v-if="income">
        <back-button></back-button>
        <h1 slot="header">Ingreso: {{ income.id }}</h1>
        <form class="form-horizontal" @submit.prevent="update">
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
                    <button class="btn btn-success">Actualizar <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </form>
    </application-layout>
</template>

<script>
    export default {
        created() {
            if(! this.income) {
                this.fetchIncome();
            }
        },
        
        data() {
            return {
                income: this.$route.params.income
            }
        },
        
        methods: {
            fetchIncome() {
                axios.get(`/incomes/${this.$route.params.id}`)
                    .then(response => {
                        this.income = response.data;
                    }).catch(error => {
                        this.$router.push({name: 'incomes.index'});
                    })
            },
            update() {
                axios.patch(`/incomes/${this.income.id}`, this.income)
                .then(response => {
                    this.Alert.success('Se ha actualizado el ingreso!');
                    this.$router.push({name: 'incomes.index'});
                });
            }
        }
    }
</script>