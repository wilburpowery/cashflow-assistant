<template>
  <application-layout>
    <h1 slot="header">Configuraciónes</h1>
    <form class="form-horizontal" @submit.prevent="addDailyBudget">
      <div class="form-group">
        <label class="col-sm-3 control-label">Balance Inicial de Hoy</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Balance del dia." v-model="daily_budget.total" required>
              <p class="bold">{{ daily_budget.total | toMoney }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-primary" :disabled="daily_budget">
            <span v-if="! daily_budget">
                Agregar Balance Inicial <i class="fa fa-plus"></i>  
            </span>
            <span v-else>
              Ya existe un balance inicial
            </span>
          </button>
        </div>
      </div>
    </form>
  </application-layout>
</template>

<script>
  export default {
    created() {
      this.fetchDailyBudget();
    },
    data() {
      return {
        daily_budget: []
      }
    },
    filters: {
      toMoney(value) {
        return window.accounting.formatMoney(value, {symbol: 'CRC', format: '%v %s'}, 2);
      }
    },
    methods: {
      fetchDailyBudget() {
        axios.get('/daily-budgets')
          .then(response => {
            this.daily_budget = response.data;
          }).catch(error => {
            this.Alert.error('Error revisando el balance inicial');
          })
      },
      addDailyBudget() {
        axios.post('/daily-budgets', {
          daily_budget: this.daily_budget
        }).then(response => {
            this.Alert.success('Se ha guardado el balance inicial para este día!');
          }).catch(error => {
            this.Alert.error();
          })
      }
    }
  }
</script>
