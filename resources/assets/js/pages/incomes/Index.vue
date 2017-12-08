<template>
  <application-layout>
      <h1 slot="header">Ingresos</h1>
      <div class="row">
        <div class="col-md-12">
          <router-link class="btn btn-primary pull-right" :to="{ name: 'income.create' }">Nuevo Ingreso <i class="fa fa-plus"></i></router-link>
        </div>
      </div>
      <h4>Ingresos recientes</h4>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Detalle</th>
            <th>Total</th>
            <th>Tiempo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="income in incomes" :key="income.id" class="income-item">
            <td v-text="income.id"></td>
            <td v-text="income.type"></td>
            <td v-text="income.description"></td>
            <td>{{ income.total | toMoney}}</td>
            <td> {{ income.created_at | formatFromTime }}</td>
            <td>
              <div class="actions">
                  <button class="btn btn-primary" @click="gotoIncome(income)">Ver</button>
                  <button class="btn btn-danger" @click="destroy(income)">Borrar</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

  </application-layout>
</template>

<script>
import {Alert} from '../../utilities';
export default {
  created() {
    this.fetchIncomes();
  },

  data() {
    return {
      incomes: []
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
    fetchIncomes() {
      axios.get('/incomes')
        .then(response => {
          this.incomes = response.data
        }).catch(error => console.log(error));
    },

    gotoIncome(income) {
      this.router.push({name: 'incomes.show', params: {id: income.id, income: income}});
    },

    destroy(income) {
      Alert.warning('Estas seguro de borrar el ingreso?')
        .then((message) => {
          axios.delete(`/incomes/${income.id}`)
            .then(response => {
              this.incomes.splice(this.incomes.indexOf(income), 1);
              Alert.success('Ingreso borrado');
            }).catch(error => {
              console.log('Error');
            })
        })
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/variables";
.table {
  margin-top: 2em;
  margin-bottom: 0;

  thead tr th {
    background-color: $brand-success;
    color: #fff;
  }
}
.income-item {
  &:hover {
    cursor: pointer;
  }

  &:hover .actions {
      opacity: 1;
  }

  .actions {
    opacity: 0;
    padding: 5px 30px;
    
    button {
      padding: 5px 20px;
    }
  }
}
</style>

